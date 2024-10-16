<?php

namespace App\Controllers;

use App\Models\JobPosts;
use CodeIgniter\RESTful\ResourceController;

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
        $request = $this->request->getPost();

        try {
            $qry = $this->model->insert($request);

            return $this->respond(['data' => $qry]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);

        return $this->respond(['data' => $data]);
    }

    public function edit($id = null)
    {
        $data = $this->model->find($id);

        return $this->respond(['data' => $data]);
    }

    public function update($id = null)
    {
        $request = $this->request->getJSON();

        try {
            $qry = $this->model->update($id, (array) $request);

            return $this->respond(['data' => $qry]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete($id = null)
    {
        $qry = $this->model->where('id', $id)->delete();

        return $this->respond(['data' => $qry]);
    }
}
