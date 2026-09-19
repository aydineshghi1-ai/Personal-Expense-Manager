<?php

require '../controllers/CategoryController.php';

$categoryController = new CategoryController();

$categoryController->create();

require_once '../views/categories/create.php';