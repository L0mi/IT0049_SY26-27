<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Home extends BaseController
{
    public function index(): string
    {
        $model = new TaskModel();

        return view('home', [
            'title' => 'Today\'s Tasks',
            'tasks' => $model->getTodayTasks(),
        ]);
    }
}
