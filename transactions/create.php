<?php

require_once '../controllers/TransactionController.php';

$transactionController = new TransactionController();

$transactionController->create();

$categories = $transactionController->getCategories();

require_once '../views/transactions/create.php';