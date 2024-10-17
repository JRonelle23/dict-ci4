<?php

namespace App\Controllers;

class ContactUsController extends BaseController
{
    public function index(): string
    {
        $data['page_title'] = 'Contact Us';
        $data['sub_header'] =  'Contact Sub HEader';
        $data['route'] =  'contactus';

        return view('pages\contact_us', $data);
    }
}
