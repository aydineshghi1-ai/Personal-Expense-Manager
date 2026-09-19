<?php

require_once '../controllers/CategoryController.php';

$categoryController = new CategoryController();

$categoryId = $_GET['id'] ?? null;

if (!$categoryId) {
    die('Category ID is required.');
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoryController->update($categoryId);
}

$category = $categoryController->edit($categoryId);

require_once '../views/categories/edit.php';