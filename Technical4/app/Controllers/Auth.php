<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('user_id')) {
            return redirect()->to(site_url('customers'));
        }

        return view('pages/login', [
            'title' => 'Login',
            'activePage' => 'login',
            'error' => session()->getFlashdata('error'),
            'success' => session()->getFlashdata('success'),
            'username' => session()->getFlashdata('username') ?? '',
        ]);
    }

    public function register()
    {
        if (session()->get('user_id')) {
            return redirect()->to(site_url('customers'));
        }

        return view('pages/register', [
            'title' => 'Create Account',
            'activePage' => 'register',
            'errors' => session()->getFlashdata('errors') ?? [],
            'values' => session()->getFlashdata('values') ?? [],
        ]);
    }

    public function createAccount()
    {
        $data = [
            'username' => strtolower(trim((string) $this->request->getPost('username'))),
            'fullName' => trim((string) $this->request->getPost('fullName')),
            'password' => (string) $this->request->getPost('password'),
            'passwordConfirm' => (string) $this->request->getPost('passwordConfirm'),
        ];
        $rules = [
            'username' => 'required|regex_match[/^[a-z0-9._-]+$/]|min_length[4]|max_length[50]',
            'fullName' => 'required|min_length[2]|max_length[100]',
            'password' => 'required|min_length[8]|max_length[72]',
            'passwordConfirm' => 'required|matches[password]',
        ];
        $messages = [
            'username' => [
                'required' => 'Username is required.',
                'regex_match' => 'Use lowercase letters, numbers, dots, underscores, or dashes only.',
                'min_length' => 'Username must have at least 4 characters.',
            ],
            'fullName' => [
                'required' => 'Full name is required.',
                'min_length' => 'Full name must have at least 2 characters.',
            ],
            'password' => [
                'required' => 'Password is required.',
                'min_length' => 'Password must have at least 8 characters.',
            ],
            'passwordConfirm' => [
                'required' => 'Please confirm your password.',
                'matches' => 'The passwords do not match.',
            ],
        ];
        $values = ['username' => $data['username'], 'fullName' => $data['fullName']];

        if (! $this->validateData($data, $rules, $messages)) {
            return redirect()->to(site_url('register'))
                ->with('errors', $this->validator->getErrors())
                ->with('values', $values);
        }

        $model = new UserModel();

        if ($model->where('username', $data['username'])->first() !== null) {
            return redirect()->to(site_url('register'))
                ->with('errors', ['username' => 'That username is already in use.'])
                ->with('values', $values);
        }

        $model->insert([
            'username' => $data['username'],
            'full_name' => $data['fullName'],
            'avatar' => null,
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('login'))
            ->with('success', 'Account created. You can now log in.')
            ->with('username', $data['username']);
    }

    public function attempt()
    {
        $username = strtolower(trim((string) $this->request->getPost('username')));
        $password = (string) $this->request->getPost('password');

        if (! $this->validateData(
            ['username' => $username, 'password' => $password],
            ['username' => 'required', 'password' => 'required'],
            ['username' => ['required' => 'Username is required.'], 'password' => ['required' => 'Password is required.']]
        )) {
            return redirect()->to(site_url('login'))
                ->with('error', implode(' ', $this->validator->getErrors()))
                ->with('username', $username);
        }

        $user = (new UserModel())->where('username', $username)->first();

        if ($user === null || ! password_verify($password, $user['password'])) {
            return redirect()->to(site_url('login'))
                ->with('error', 'Invalid username or password.')
                ->with('username', $username);
        }

        session()->regenerate(true);
        session()->set([
            'user_id' => $user['id'],
            'username' => $user['username'],
            'full_name' => $user['full_name'],
        ]);

        return redirect()->to(site_url('customers'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('login'));
    }
}
