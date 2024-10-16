<?php

namespace App\Controllers;

use App\Models\JobPosts;
use CodeIgniter\RESTful\ResourceController;
use http\Env\Request;

class JobPostsController extends ResourceController
{
    public $model = null;
    public $title = 'Job Posts';
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

        return view('pages\jobPosts\index', ['data' => $data]);
    }

    public function new()
    {
        $data = [
            'title' => $this->title
        ];

        return view('pages\jobPosts\new', ['data' => $data]);
    }

    public function create()
    {
        $request = $this->request->getJSON();

        try {
            $qry = $this->model->insert($request);
            $data = [
                'test' => $request
            ];

            return $this->respond(['data' => $data]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 403);
        }
    }

    public function show($id = null)
    {
        return $this->respond(['data' => 'test']);
    }

    public function edit($id = null)
    {
        return $this->respond(['data' => 'test']);
    }

    public function update($id = null)
    {
        return $this->respond(['data' => 'test']);
    }

    public function delete($id = null)
    {
        return $this->respond(['data' => 'test']);
    }
}
