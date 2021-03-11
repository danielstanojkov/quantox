<?php

namespace App\Controllers;

use App\Vendor\Controller;

class Home extends Controller
{
    public function index()
    {
        $data = [];
        return $this->view('test', $data);
    }

    public function about($test = '')
    {
        echo 'aboutpage' . $test;
    }
}
