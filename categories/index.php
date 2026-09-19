<?php

require_once '../includes/functions.php';
require_once '../includes/auth.php';
require_once '../controllers/CategoryController.php';

$categoryController = new CategoryController();

$categories = $categoryController->index();

require_once '../views/categories/index.php';