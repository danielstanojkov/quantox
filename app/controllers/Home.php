<?php

namespace App\Controllers;

use App\Vendor\Controller;

class Home extends Controller
{
    public function index()
    {
        $data = [];
        return $this->view('index', $data);
    }
}
