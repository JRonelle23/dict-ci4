<?php

namespace App\Controllers;

use App\Models\JobPosts;
use CodeIgniter\RESTful\ResourceController;

class JobPostsController extends ResourceController
{
    public $model = null;
    public $title = 'Job Posts';

    public array $rules = [
        'name' => [
            'label'  => 'Name',
            'rules'  => 'required|max_length[30]',
            'errors' => [
                'required' => 'Please enter position name',
                'max_length' => 'Position name is too long',
            ]
        ],
        'description' => [
            'label'  => 'Description',
            'rules'  => 'required|max_length[200]',
            'errors' => [
                'required' => 'Please add description',
                'max_length' => 'Description is too long',
            ]
        ],
        'salary' => [
            'label'  => 'Salary',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Salary is required'
            ]
        ],
        'date_post' => [
            'label'  => 'Date Post',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Date is required',
            ],
        ]
    ];

    public function __construct()
    {
        $this->model = new JobPosts();
    }

    public function index()
    {
        $jobs = $this->model->findAll();
        $data = [
            'title' => $this->title,
            'jobs' => $jobs
        ];

        return view('pages\jobPosts\index', ['data' => $data, 'route' => 'jobs']);
    }

    public function new()
    {
        $data = [
            'title' => $this->title
        ];

        return view('pages\jobPosts\new', ['data' => $data, 'route' => 'jobs']);
    }


    public function create()
    {
        $data = $this->request->getPost(array_keys($this->rules));

        if (!$this->validateData($data, $this->rules)) {
            return view('pages\jobPosts\new', ['data' => $data, 'route' => 'jobs']);
        }

        $validData = $this->validator->getValidated();

        try {
            $this->model->insert($validData);

            return redirect()->to("job_posting")->with('result', 'Job post has been created successfully!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);
        $data['route'] = 'jobs';

        return $this->respond(['data' => $data, 'route' => 'jobs']);
    }

    public function edit($id = null)
    {
        $data = $this->model->find($id);

        return view('pages\jobPosts\edit', ['data' => $data, 'route' => 'jobs']);

    }

    public function update($id = null)
    {
        $data = $this->request->getPost(array_keys($this->rules));

        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->withInput();
        }

        $validData = $this->validator->getValidated();

        try {
            $this->model->update($id, $validData);

            return  redirect()->to("job_posting")->with('result', 'Job post has been updated successfully!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($id = null)
    {
        $qry = $this->model->where('id', $id)->delete();

        return  redirect()->to("job_posting")->with('result', 'Job post has been deleted.');
    }
}
