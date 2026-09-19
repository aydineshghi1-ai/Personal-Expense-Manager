<?php

use function PHPSTORM_META\type;

require_once '../config/database.php';
require_once '../models/Category.php';
require_once '../includes/functions.php';
require_once '../includes/auth.php';

class CategoryController
{
    private $categoryModel;

    public function __construct()
    {
        global $pdo;

        $this->categoryModel = new Category($pdo);
    }

    public function create()
    {
        requireLogin();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        if(
            !isset($_POST["csrf_token"]) ||
            !isset($_SESSION["csrf_token"])||
            !hash_equals($_SESSION["csrf_token"], $_POST["csrf_token"])
        ){
            die("Invalid CSRF token");
        }



        $name = trim($_POST['name'] ?? '');
        $type = $_POST['type'] ?? '';

        if ($name === '' || $type === '') {
            die('All fields are required.');
        }

        if ($type !== 'income' && $type !== 'expense') {
            die('Invalid category type.');
        }


        $userId = $_SESSION['user_id'];

        $this->categoryModel->createCategory(
            $userId,
            $name,
            $type
        );
    }

    public function index()
    {
        requireLogin();
        $userId = $_SESSION["user_id"];

        $categories = $this->categoryModel->getCategoriesByUser($userId);

        return $categories;
    }

    public function edit($categoryId)
    {
        requireLogin();
        $userId = $_SESSION['user_id'];

        $category = $this->categoryModel->getCategoryById(
            $categoryId,
            $userId
        );

        if (!$category) {
            die('Category not found.');
        }

        return $category;
    }

    public function update($categoryId)
    {
        requireLogin();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        if(
            !isset($_POST["csrf_token"]) ||
            !isset($_SESSION["csrf_token"])||
            !hash_equals($_SESSION["csrf_token"], $_POST["csrf_token"])
        ){
            die("Invalid CSRF token");
        }

        if (!filter_var($categoryId, FILTER_VALIDATE_INT) || $categoryId <= 0) {
            die('Invalid category ID.');
        }

        $name = trim($_POST['name']??"");
        $type = trim($_POST['type']??"");

        if($name === "" || $type === "") {
            die("Invalid category type");
        }

        if ($type !== 'income' && $type !== 'expense') {
            die('Invalid category type.');
        }

        $userId = $_SESSION["user_id"];

        $this->categoryModel->updateCategory(
            $categoryId,
            $userId,
            $name,
            $type
        );
        redirect('../categories/index.php');
    }

    public function delete()
    {
        requireLogin();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        $categoryId = $_POST['categoryId'] ?? '';

        if(
            !isset($_POST["csrf_token"]) ||
            !isset($_SESSION["csrf_token"])||
            !hash_equals($_SESSION["csrf_token"], $_POST["csrf_token"])
        ){
            die("Invalid CSRF token");
        }

        if(!filter_var($categoryId, FILTER_VALIDATE_INT) || $categoryId <= 0) {
            die("Invalid category ID.");
        }
        
        $userId = $_SESSION["user_id"];
        
        $this->categoryModel->deleteCategory(
            $categoryId,
            $userId
        );
        
        redirect('../categories/index.php');
    }
}