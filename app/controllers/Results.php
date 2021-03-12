<?php

namespace App\Controllers;

use App\Vendor\Controller;

class Results extends Controller
{
    public function __construct()
    {
        $this->categoryModel = $this->model('Category');
    }

    public function index()
    {
        if (!isLoggedIn()) {
            flash('status', 'Please login to see the results', 'alert alert-warning');
            redirect('users/login');
        }

        $data = $this->categoryModel->getMainCategories();

        $data = $this->buildCategoriesArray($data);

        return $this->view('results/index', $data);
    }

    public function search()
    {
        if (!isLoggedIn()) {
            // Save search to db
            flash('status', 'Please login to see the results', 'alert alert-warning');
            redirect('users/login');
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') redirect('home');


        $data = [
            'search' => trim($_POST['search']),
            'type' => $_POST['user_type'],
            'search_err' => '',
            'type_err' => '',
        ];

        if(empty($data['search'])){
            $data['search_err'] = 'Please enter your search keywords.';
        }

        if(!in_array($_POST['user_type'], ['front','back'])){
            $data['type_err'] = 'Invalid user type error';
        }

        // Check if there are no errors
        if(empty($data['search_err']) && empty($data['type_err'])){
            


        } 
        
        return $this->view('index', $data);
    }



    public function buildCategoriesArray($data)
    {
        
        $structured_data = [];

        // This will work to 3 depth levels
        foreach ($data as $category) {
            // Setting main categories
            $tmp_arr = [
                'category' => $category,
                'total' => 0,
                'subcategories' => []
            ];

            // Setting second level categories
            foreach($this->categoryModel->getSubCategory($category->id) as $subcategory){
                $second_tmp = [
                    'category' => $subcategory,
                    // Setting 3-rd level categories
                    'subcategories' => $this->categoryModel->getSubCategory($subcategory->id)
                ];
                array_push($tmp_arr['subcategories'], $second_tmp);
            }

            // Pushing 1 category with all of its subcategories in each iterations
            array_push($structured_data, $tmp_arr);
        }

        return $structured_data;
    }
}
