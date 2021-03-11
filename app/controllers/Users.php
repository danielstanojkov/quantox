<?php

namespace App\Controllers;

use App\Vendor\Controller;

class Users extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    /*
    *
    *   REGISTER FUNCTIONALITY
    *
    */
    public function register()
    {
        // Check if the user is already logged in
        if (isLoggedIn()) redirect('home/index');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Sanitize POST 
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'email' =>  trim($_POST['email']),
                'password' =>  trim($_POST['password']),
                'confirm_password' =>  trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter an email';
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken.';
                }
            }

            // Validate name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter an name';
            }

            // Validate password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter an password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters.';
            }

            // Validate confirm password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm your password';
            } else {
                if ($data['password'] !== $data['confirm_password']) {
                    $data['confirm_password_err'] = "Passwords don't match!";
                }
            }

            // Check if validation failed
            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT); // Hash the password

                if ($this->userModel->register($data)) {
                    flash('register_success', 'You are registered and can login');
                    redirect('users/login');
                } else {
                    die('Something went wrong');
                }
            }

            return $this->view('users/register', $data);
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            return $this->view('users/register', $data);
        }
    }




    /*
    *
    *   LOGIN FUNCTIONALITY
    *
    */
    public function login()
    {
        if (isLoggedIn()) redirect('pages/index');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST 
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' =>  trim($_POST['email']),
                'password' =>  trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter an email';
            }

            if (!$this->userModel->findUserByEmail($data['email'])) {
                $data['email_err'] = 'No user found';
            }

            // Validate password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter a password';
            }

            if (empty($data['email_err']) && empty($data['password_err'])) {
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if (!$loggedInUser) {
                    $data['password_err'] = 'Wrong password';
                    return $this->view('users/login', $data);
                }

                $this->createUserSession($loggedInUser);
            }

            return $this->view('users/login', $data);
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            return $this->view('users/login', $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_email'] = $user->email;
        redirect('posts');
    }

    
    public function logout()
    {
        session_destroy();
        redirect('users/login');
    }
}
