<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    private array $rules = [
        'username' => 'required|regex_match[/^[a-z0-9._-]+$/]|min_length[4]|max_length[50]',
        'fullName' => 'required|min_length[2]|max_length[100]',
    ];

    private array $messages = [
        'username' => [
            'required' => 'Username is required.',
            'regex_match' => 'Use lowercase letters, numbers, dots, underscores, or dashes only.',
            'min_length' => 'Username must have at least 4 characters.',
        ],
        'fullName' => [
            'required' => 'Full name is required.',
            'min_length' => 'Full name must have at least 2 characters.',
        ],
    ];

    public function index(): string
    {
        return view('pages/users', [
            'title' => 'Users',
            'activePage' => 'users',
            'users' => (new UserModel())->orderBy('id', 'DESC')->findAll(),
            'success' => session()->getFlashdata('success'),
        ]);
    }

    public function new(): string
    {
        return view('pages/user_form', $this->formData());
    }

    public function create()
    {
        $model = new UserModel();
        $data = $this->input();

        if (! $this->validUser($model, $data)) {
            return redirect()->to(site_url('users/new'))
                ->with('values', $data)
                ->with('errors', $this->validator->getErrors());
        }

        $model->insert([
            'username' => $data['username'],
            'full_name' => $data['fullName'],
            'avatar' => null,
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('users'))->with('success', 'User added successfully.');
    }

    public function edit(int $id): string
    {
        $user = (new UserModel())->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound('User not found.');
        }

        return view('pages/user_form', $this->formData($user));
    }

    public function update(int $id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound('User not found.');
        }

        $data = $this->input();

        if (! $this->validUser($model, $data, $id) || ! $this->validAvatar()) {
            return redirect()->to(site_url('users/' . $id . '/edit'))
                ->with('values', $data)
                ->with('errors', $this->validator->getErrors());
        }

        $avatar = $this->saveAvatar($user['avatar']);

        $changes = [
            'username' => $data['username'],
            'full_name' => $data['fullName'],
            'avatar' => $avatar,
        ];

        if ($data['password'] !== '') {
            $changes['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        $model->update($id, $changes);

        return redirect()->to(site_url('users'))->with('success', 'User updated successfully.');
    }

    private function input(): array
    {
        return [
            'username' => strtolower(trim((string) $this->request->getPost('username'))),
            'fullName' => trim((string) $this->request->getPost('fullName')),
            'password' => (string) $this->request->getPost('password'),
        ];
    }

    private function validUser(UserModel $model, array $data, ?int $id = null): bool
    {
        $rules = $this->rules;
        $rules['password'] = $id === null
            ? 'required|min_length[8]|max_length[72]'
            : 'permit_empty|min_length[8]|max_length[72]';
        $messages = $this->messages;
        $messages['password'] = [
            'required' => 'Password is required.',
            'min_length' => 'Password must have at least 8 characters.',
        ];

        if (! $this->validateData($data, $rules, $messages)) {
            return false;
        }

        $query = $model->where('username', $data['username']);

        if ($id !== null) {
            $query->where('id !=', $id);
        }

        if ($query->first() !== null) {
            $this->validator->setError('username', 'That username is already in use.');
            return false;
        }

        return true;
    }

    private function validAvatar(): bool
    {
        $file = $this->request->getFile('avatar');

        if ($file === null || $file->getError() === UPLOAD_ERR_NO_FILE) {
            return true;
        }

        return $this->validate([
            'avatar' => 'uploaded[avatar]|max_size[avatar,2048]|is_image[avatar]|mime_in[avatar,image/jpeg,image/png]|ext_in[avatar,jpg,jpeg,png]',
        ], [
            'avatar' => [
                'uploaded' => 'Choose an image to upload.',
                'max_size' => 'The image must be 2MB or smaller.',
                'is_image' => 'The selected file is not an image.',
                'mime_in' => 'Only JPG and PNG images are allowed.',
                'ext_in' => 'Only JPG and PNG images are allowed.',
            ],
        ]);
    }

    private function saveAvatar(?string $current): ?string
    {
        $file = $this->request->getFile('avatar');

        if ($file === null || $file->getError() === UPLOAD_ERR_NO_FILE) {
            return $current;
        }

        $folder = FCPATH . 'uploads/users';

        if (! is_dir($folder)) {
            mkdir($folder, 0755, true);
        }

        $name = bin2hex(random_bytes(12)) . '.jpg';
        service('image')
            ->withFile($file->getTempName())
            ->fit(320, 320, 'center')
            ->save($folder . DIRECTORY_SEPARATOR . $name, 85);

        if ($current && is_file($folder . DIRECTORY_SEPARATOR . $current)) {
            unlink($folder . DIRECTORY_SEPARATOR . $current);
        }

        return $name;
    }

    private function formData(?array $user = null): array
    {
        $editing = $user !== null;

        return [
            'title' => $editing ? 'Edit User' : 'New User',
            'activePage' => 'users',
            'user' => $user,
            'editing' => $editing,
            'values' => session()->getFlashdata('values') ?? [],
            'action' => $editing ? site_url('users/' . $user['id']) : site_url('users'),
            'heading' => $editing ? 'Edit user' : 'Add a user',
            'submitLabel' => $editing ? 'Save changes' : 'Add user',
            'errors' => session()->getFlashdata('errors') ?? [],
        ];
    }
}
