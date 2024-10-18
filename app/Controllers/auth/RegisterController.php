<?php

namespace App\Controllers\auth;

use App\Controllers\BaseController;
use App\Models\User;

class RegisterController extends BaseController
{
    public $user_model = null;
    public $title = 'Register';
    public function __construct()
    {
        $this->user_model = new User();
    }

    public function index()
    {
        $data = [
            'title' => $this->title
        ];

        return view('pages\auth\register', ['data' => $data, 'route' => 'register']);
    }

    public function create()
    {
        // TODO register
        $rules = [
            'email' => ['rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[users.email]'],
            'password' => ['rules' => 'required|min_length[8]|max_length[255]'],
            'confirm_password'  => [ 'label' => 'confirm password', 'rules' => 'matches[password]']
        ];


        if($this->validate($rules)){
            $data = [
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $this->user_model->save($data);
            return redirect()->to("login");
        }else{
            $data['validation'] = $this->validator;
            return view('register', $data);
        }
    }
}
