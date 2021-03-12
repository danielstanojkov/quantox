<?php

namespace App\Models;

use App\Vendor\Controller;
use App\Vendor\DB;

class User extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new DB;
    }

    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind('email', $email);
        $this->db->single();
        return $this->db->rowCount() ? true : false;
    }

    public function getAllUsers()
    {
        $this->db->query('SELECT *,`categories`.`id` AS `categoryId`,
                                        `users`.`id` AS `userId`, 
                                      `users`.`name` AS `username`,
                                 `categories`.`name` AS `categoryName`
        FROM users JOIN categories on categories.id = users.category_id');

        return $this->db->resultSet();
    }

    public function findUsersByEmailOrName($string)
    {
        $this->db->query('SELECT *,`categories`.`id` AS `categoryId`,
                                        `users`.`id` AS `userId`, 
                                      `users`.`name` AS `username`,
                                 `categories`.`name` AS `categoryName`
                          FROM users JOIN categories on categories.id = users.category_id 
                          WHERE users.email LIKE :email OR users.name LIKE :name');
        $this->db->bind('email', "%$string%");
        $this->db->bind('name', "%$string%");
        return $this->db->resultSet();
    }

    public function getUsersCountByCategoryId($category_id)
    {
        $this->db->query("SELECT * FROM users WHERE category_id = :category_id");
        $this->db->bind('category_id', $category_id);
        $this->db->resultSet();
        return $this->db->rowCount();
    }

    public function register($data)
    {

        $this->db->query("INSERT INTO users(name, email, password, category_id) VALUES(:name, :email, :password, :category_id)");
        $this->db->bind('name', $data['name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('category_id', $data['category_id']);
        return $this->db->execute();
    }

    public function login($email, $password)
    {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind('email', $email);
        $user = $this->db->single();
        return password_verify($password, $user->password) ? $user : false;
    }
}
