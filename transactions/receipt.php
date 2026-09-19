<?php

require_once '../includes/functions.php';
require_once '../includes/auth.php';
require_once '../controllers/TransactionController.php';

requireLogin();

$transactionId = $_GET['id'] ?? '';

if (!filter_var($transactionId, FILTER_VALIDATE_INT) || $transactionId <= 0) {
    die('Invalid transaction ID.');
}

$transactionController = new TransactionController();

$receipt = $transactionController->showReceipt($transactionId);

$receiptPath = __DIR__ . '/../../private_receipts/' . basename($receipt);

if (!file_exists($receiptPath)) {
    die('Receipt file not found.');
}
$mimeType = mime_content_type($receiptPath);

$allowedTypes = [
    'image/jpeg',
    'image/png',
    'application/pdf'
];

if (!in_array($mimeType, $allowedTypes, true)) {
    die('Invalid receipt file type.');
}

header('Content-Type: ' . $mimeType);
header('Content-Length: ' . filesize($receiptPath));

readfile($receiptPath);
exit;

