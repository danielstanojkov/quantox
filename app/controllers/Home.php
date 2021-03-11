<?php 

namespace App\Controllers;

use App\Vendor\Controller;

class Home extends Controller 
{
    public function index()
    {
        echo 'test';
        return 'test';
    }

    public function about($test = '')
    {
        echo 'aboutpage' . $test;
    }
}