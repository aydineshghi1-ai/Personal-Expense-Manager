<?php
require_once '../includes/functions.php';
require_once '../includes/auth.php';
require_once '../controllers/TransactionController.php';

requireLogin();

$transactionController = new TransactionController();

$search = $_GET['search'] ?? '';
$type = $_GET['type'] ?? '';
$dateFrom = $_GET['dateFrom'] ?? '';
$dateTo = $_GET['dateTo'] ?? '';

$page = (int) ($_GET['page'] ?? 1);

if ($page < 1) {
    $page = 1;
}

$limit = 10;

$offset = ($page - 1) * $limit;

$data = $transactionController->index(
        $search,
        $type,
        $dateFrom,
        $dateTo,
        $limit,
        $offset
);

$transactions = $data['transactions'];
$totalTransactions = $data['totalTransactions'];
$totalPages = $data['totalPages'];

require_once '../views/transactions/index.php';
?>