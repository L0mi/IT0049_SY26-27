<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Customers extends BaseController
{
    private array $rules = [
        'fullName' => 'required|min_length[2]|max_length[100]',
        'email' => 'required|valid_email|max_length[100]',
        'phone' => 'permit_empty|regex_match[/^[0-9+()\s-]{7,20}$/]',
    ];

    private array $messages = [
        'fullName' => [
            'required' => 'Full name is required.',
            'min_length' => 'Full name must have at least 2 characters.',
        ],
        'email' => [
            'required' => 'Email is required.',
            'valid_email' => 'Enter a valid email address.',
        ],
        'phone' => [
            'regex_match' => 'Enter a valid phone number.',
        ],
    ];

    public function index(): string
    {
        return view('pages/customers', [
            'title' => 'Customers',
            'activePage' => 'customers',
            'customers' => (new CustomerModel())->orderBy('id', 'DESC')->findAll(),
            'success' => session()->getFlashdata('success'),
        ]);
    }

    public function new(): string
    {
        return view('pages/customer_form', $this->formData());
    }

    public function create()
    {
        $data = $this->input();

        if (! $this->validateData($data, $this->rules, $this->messages)) {
            return redirect()->to(site_url('customers/new'))->withInput()->with('errors', $this->validator->getErrors());
        }

        (new CustomerModel())->insert([
            'full_name' => $data['fullName'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?: null,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('customers'))->with('success', 'Customer added successfully.');
    }

    public function edit(int $id): string
    {
        $customer = (new CustomerModel())->find($id);

        if ($customer === null) {
            throw PageNotFoundException::forPageNotFound('Customer not found.');
        }

        return view('pages/customer_form', $this->formData($customer));
    }

    public function update(int $id)
    {
        $model = new CustomerModel();

        if ($model->find($id) === null) {
            throw PageNotFoundException::forPageNotFound('Customer not found.');
        }

        $data = $this->input();

        if (! $this->validateData($data, $this->rules, $this->messages)) {
            return redirect()->to(site_url('customers/' . $id . '/edit'))->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->update($id, [
            'full_name' => $data['fullName'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?: null,
        ]);

        return redirect()->to(site_url('customers'))->with('success', 'Customer updated successfully.');
    }

    private function input(): array
    {
        return [
            'fullName' => trim((string) $this->request->getPost('fullName')),
            'email' => strtolower(trim((string) $this->request->getPost('email'))),
            'phone' => trim((string) $this->request->getPost('phone')),
        ];
    }

    private function formData(?array $customer = null): array
    {
        $editing = $customer !== null;

        return [
            'title' => $editing ? 'Edit Customer' : 'New Customer',
            'activePage' => 'customers',
            'customer' => $customer,
            'action' => $editing ? site_url('customers/' . $customer['id']) : site_url('customers'),
            'heading' => $editing ? 'Edit customer' : 'Add a customer',
            'submitLabel' => $editing ? 'Save changes' : 'Add customer',
            'errors' => session()->getFlashdata('errors') ?? [],
        ];
    }
}
