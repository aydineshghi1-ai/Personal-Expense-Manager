<?php

require_once '../controllers/TransactionController.php';

$transactionController = new TransactionController();

$transactionId = $_GET['id'] ?? "";

if ($transactionId === '') {
    die('Invalid transaction ID.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $transactionController->update($transactionId);
}


$transaction = $transactionController->edit($transactionId);

require_once '../views/transactions/edit.php';