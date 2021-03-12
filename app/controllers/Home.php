<?php

namespace App\Controllers;

use App\Vendor\Controller;

class Home extends Controller
{
    public function index()
    {
        $data = [
            'search' => '',
            'type' => '',
            'search_err' => '',
            'type_err' => '',
        ];
        
        return $this->view('index', $data);
    }
}
