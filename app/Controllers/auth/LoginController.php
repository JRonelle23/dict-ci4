<?php

namespace App\Controllers\auth;

use App\Controllers\BaseController;
use App\Models\User;

class LoginController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => ['Login']
        ];

        return view('pages\auth\login', ['data' => $data, 'route' => 'login']);
    }

    public function authenticate()
    {
        $session = session();
        $userModel = new User();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $userModel->where('email', $email)->first();

        if(is_null($user)) {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
        }

        $pwd_verify = password_verify($password, $user['password']);

        if(!$pwd_verify) {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
        }

        $ses_data = [
            'id' => $user['id'],
            'email' => $user['email'],
            'isLoggedIn' => TRUE
        ];

        $session->set($ses_data);
        return redirect()->to('/');


    }

    public function logout() {
        session_destroy();
        return redirect()->to('/login');
    }
}
