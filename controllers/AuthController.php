<?php

require_once '../config/database.php';
require_once '../models/User.php';
require_once '../includes/functions.php';
require_once '../includes/auth.php';

class AuthController {
    private $userModel;
    
    public function __construct() {
        global $pdo;
        $this->userModel = new User($pdo);
    }

    public function register() {
        if($_SERVER['REQUEST_METHOD'] !== 'POST' ) {
            return;
        }

        $name= trim($_POST['name'] ?? '');
        $email= trim($_POST['email'] ?? '');
        $password= ($_POST['password'] ?? '');

        if ($name === '' || $email === '' || $password === '') {
            die('Invalid email.');
        }

        $existingUser = $this->userModel->findByEmail($email);

        if ($existingUser) {
            die ('Email already exists.');
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $this->userModel->createUser(
            $name,
            $email,
            $passwordHash
        );
        redirect('auth/login.php');
    }

    public function login() {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $user = $this->userModel->findByEmail($email);

        if (!$user) {
            die('Invalid email or password.');
        }

        if (!password_verify($password, $user['password'])) {
            die('Invalid email or password.');
        }

        session_regenerate_id(true);

        $_SESSION['user_id'] = $user['id'];

        redirect('../dashboard.php');
    }
};

