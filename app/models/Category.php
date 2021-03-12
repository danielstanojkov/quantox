<?php

namespace App\Models;

use App\Vendor\Controller;
use App\Vendor\DB;

class Category extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new DB;
    }

    public function getCategoryByType($type)
    {
        $this->db->query('SELECT * FROM categories WHERE is_backend = :type');
        $this->db->bind('type', $type);
        return $this->db->resultSet();
    }

    public function getAllCategories()
    {
        $this->db->query('SELECT * FROM categories;');
        return $this->db->resultSet();
    }

    public function getMainCategories()
    {
        $this->db->query('SELECT * FROM categories WHERE subcategory_id IS NULL');
        return $this->db->resultSet();
    }

    public function getSubCategory($id)
    {
        $this->db->query('SELECT * FROM categories WHERE subcategory_id = :id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function checkIfCategoryExist($id)
    {
        $this->db->query('SELECT * FROM categories WHERE id = :id');
        $this->db->bind('id', $id);
        $this->db->single();
        return $this->db->rowCount() ? true : false;
    }
}
