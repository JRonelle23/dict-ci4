<?php

namespace App\Controllers;

class AboutController extends BaseController
{
    public function index(): string
    {
        $data['page_title'] = 'About Page';
        $data['sub_header'] =  'About Sub Header';
        $data['route'] =  'about';

        return view('pages\about', $data);
    }
}
