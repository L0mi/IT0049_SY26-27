<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index(): string
    {
        $model = new UserModel();
        $users = $model->findAll();

        return view('pages/users', [
            'title' => 'User Accounts',
            'activePage' => 'users',
            'users' => $users,
            'errors' => session()->getFlashdata('errors') ?? [],
            'success' => session()->getFlashdata('success'),
        ]);
    }

    public function create()
    {
        $data = [
            'username' => strtolower(trim((string) $this->request->getPost('username'))),
            'fullName' => trim((string) $this->request->getPost('fullName')),
        ];

        $rules = [
            'username' => 'required|regex_match[/^[a-z0-9._-]+$/]|min_length[4]|max_length[50]',
            'fullName' => 'required|min_length[2]|max_length[100]',
        ];

        $messages = [
            'username' => [
                'required' => 'Please enter a username.',
                'regex_match' => 'The username may contain only lowercase letters, numbers, dots, underscores, and dashes.',
                'min_length' => 'The username must contain at least 4 characters.',
            ],
            'fullName' => [
                'required' => 'Please enter the staff member\'s full name.',
                'min_length' => 'The full name must contain at least 2 characters.',
            ],
        ];

        if (! $this->validateData($data, $rules, $messages)) {
            return redirect()->to(site_url('users') . '#register-user')
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();
        if ($model->where('username', $data['username'])->first() !== null) {
            return redirect()->to(site_url('users') . '#register-user')
                ->withInput()
                ->with('errors', ['username' => 'That username is already registered.']);
        }

        $model->insert([
            'username' => $data['username'],
            'full_name' => $data['fullName'],
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('users'))
            ->with('success', $data['fullName'] . ' was registered as an authorized user.');
    }
}
