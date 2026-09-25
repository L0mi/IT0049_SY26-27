<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index(): string
    {
        $model = new CustomerModel();
        $customers = $model->findAll();

        return view('pages/customers', [
            'title' => 'Customer Accounts',
            'activePage' => 'customers',
            'customers' => $customers,
            'errors' => session()->getFlashdata('errors') ?? [],
            'success' => session()->getFlashdata('success'),
        ]);
    }

    public function create()
    {
        $data = [
            'fullName' => trim((string) $this->request->getPost('fullName')),
            'email' => strtolower(trim((string) $this->request->getPost('email'))),
            'phone' => trim((string) $this->request->getPost('phone')),
        ];

        $rules = [
            'fullName' => 'required|min_length[2]|max_length[100]',
            'email' => 'required|valid_email|max_length[100]',
            'phone' => 'permit_empty|regex_match[/^[0-9+()\s-]{7,20}$/]',
        ];

        $messages = [
            'fullName' => [
                'required' => 'Please enter the customer name.',
                'min_length' => 'The customer name must contain at least 2 characters.',
            ],
            'email' => [
                'required' => 'Please enter an email address.',
                'valid_email' => 'Please enter a valid email address.',
            ],
            'phone' => [
                'regex_match' => 'Use only numbers, spaces, parentheses, plus signs, or hyphens for the phone number.',
            ],
        ];

        if (! $this->validateData($data, $rules, $messages)) {
            return redirect()->to(site_url('customers') . '#register-customer')
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new CustomerModel();
        $model->insert([
            'full_name' => $data['fullName'],
            'email' => $data['email'],
            'phone' => $data['phone'] !== '' ? $data['phone'] : null,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('customers'))
            ->with('success', $data['fullName'] . ' was registered as a customer.');
    }
}
