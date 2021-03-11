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
