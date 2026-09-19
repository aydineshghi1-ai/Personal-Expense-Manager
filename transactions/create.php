<?php

require_once '../controllers/TransactionController.php';

$transactionController = new TransactionController();

$transactionController->create();

require_once '../views/transactions/create.php';