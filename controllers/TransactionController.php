<?php 

require_once '../config/database.php';
require_once '../models/Transaction.php';
require_once '../includes/functions.php';
require_once '../includes/auth.php';
require_once '../models/Category.php';

class TransactionController
{

    private $transactionModel;



    private $categoryModel;
    public function __construct()
    {
        global $pdo;
        $this->transactionModel = new Transaction($pdo);
        $this->categoryModel = new Category($pdo);


    }

    public function create()
    {
        requireLogin();
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            return;
        }

        $categoryId = $_POST['categoryId'] ?? '';
        $type = $_POST['type'] ?? '';
        $amount = $_POST['amount'] ?? '';
        $description = trim($_POST['description'] ?? '');
        $transactionDate = $_POST['transactionDate'] ?? '';

        // Receipt data
        $receipt = $_FILES['receipt'] ?? null;

        $fileName = null;

        if ( $categoryId === '' ||  $type === '' ||  $amount === '' ||  $transactionDate === ''
        ) {
            die("All required fields are required");
        }

        if (!filter_var($categoryId, FILTER_VALIDATE_INT) || $categoryId <= 0) {
            die('Invalid category ID.');
        }

        $date = DateTime::createFromFormat('Y-m-d', $transactionDate);

        if (!$date || $date->format('Y-m-d') !== $transactionDate) {
            die('Invalid transaction date.');
        }

        if (!is_numeric($amount) || $amount <= 0) {
            die('Invalid amount.');
        }

        if ($type !== 'income' && $type !== 'expense') {
            die('Invalid transaction type.');
        }

        $userId = $_SESSION['user_id'];


        $category = $this->categoryModel->getCategoryById(
            $categoryId,
            $userId
        );

        if (!$category) {
            die('Invalid category.');
        }

        if ($category['type'] !== $type) {
            die('Category type does not match transaction type.');
        }

        if (
            $receipt !== null &&
            $receipt['error'] !== UPLOAD_ERR_NO_FILE
        ) {
            if ($receipt['error'] !== UPLOAD_ERR_OK) {
                die('Receipt upload failed.');
            }

            $maxSize = 2 * 1024 * 1024;

            if ($receipt['size'] > $maxSize) {
                die('Receipt file is too large.');
            }

            $finfo = new finfo(FILEINFO_MIME_TYPE);

            $mimeType = $finfo->file(
                $receipt['tmp_name']
            );

            $allowedTypes = [
                'image/jpeg',
                'image/png',
                'application/pdf'
            ];

            if (!in_array($mimeType, $allowedTypes, true)) {
                die('Invalid receipt file type.');
            }

            $extensions = [
                'image/jpeg' => 'jpg',
                'image/png' => 'png',
                'application/pdf' => 'pdf'
            ];

            $extension = $extensions[$mimeType];

            $fileName = bin2hex(random_bytes(16)) . '.' . $extension;
            $uploadDir = __DIR__ . '/../../private_receipts/';
            $uploadPath = $uploadDir . $fileName;

            if (!move_uploaded_file(
                $receipt['tmp_name'],
                $uploadPath
            )) {
                die('Failed to save receipt.');
            }
        }

        $this->transactionModel->createTransaction(
            $categoryId,
            $userId,
            $type,
            $amount,
            $description,
            $transactionDate,
            $fileName
        );

        redirect('../transactions/index.php');
    }

    public function index($search = '', $type = '', $dateFrom = '', $dateTo = '', $limit = 10, $offset = 0)
    {
        requireLogin();
        $userId = $_SESSION['user_id'];

        $transactions = $this->transactionModel->getTransactionsByUser(
            $userId,
            $search,
            $type,
            $dateFrom,
            $dateTo,
            $limit,
            $offset
        );

        $totalTransactions = $this->transactionModel->getTotalTransactions(
            $userId,
            $search,
            $type,
            $dateFrom,
            $dateTo
        );

        $totalPages = (int) ceil($totalTransactions / $limit);

        return [
            'transactions' => $transactions,
            'totalTransactions' => $totalTransactions,
            'totalPages' => $totalPages
        ];
    }

    public function edit($transactionId){
        requireLogin();
        $userId = $_SESSION['user_id'];

        $transaction = $this->transactionModel->getTransactionById(
            $transactionId,
            $userId
        );

        if (!$transaction) {
            die('Transaction not found.');
        }
        return $transaction;
    }

    public function update($transactionId)
    {
        requireLogin();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        if (
            !isset($_POST['csrf_token']) ||
            !isset($_SESSION['csrf_token']) ||
            !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
        ) {
            die('Invalid CSRF token.');
        }

        if (!filter_var($transactionId, FILTER_VALIDATE_INT) || $transactionId <= 0) {
            die('Invalid transaction ID.');
        }

        $categoryId = $_POST['categoryId'] ?? '';
        $type = $_POST['type'] ?? '';
        $amount = $_POST['amount'] ?? '';
        $description = trim($_POST['description'] ?? '');
        $transactionDate = $_POST['transactionDate'] ?? '';

        if ( $categoryId === '' ||  $type === '' ||  $amount === '' ||  $transactionDate === ''
        ) {
            die('All required fields are required.');
        }

        if (!filter_var($categoryId, FILTER_VALIDATE_INT) || $categoryId <= 0) {
            die('Invalid category ID.');
        }

        $date = DateTime::createFromFormat('Y-m-d', $transactionDate);

        if (!$date || $date->format('Y-m-d') !== $transactionDate) {
            die('Invalid transaction date.');
        }

        if (!is_numeric($amount) || $amount <= 0) {
            die('Invalid amount.');
        }

        if ($type !== 'income' && $type !== 'expense') {
            die('Invalid transaction type.');
        }

        $userId = $_SESSION['user_id'];

        $category = $this->categoryModel->getCategoryById(
            $categoryId,
            $userId
        );

        if(!$category){
            die('Invalid category.');
        }

        if ($category['type'] !== $type) {
            die('Category type does not match transaction type.');
        }

        $this->transactionModel->updateTransaction(
            $transactionId,
            $userId,
            $categoryId,
            $type,
            $amount,
            $description,
            $transactionDate
        );

        redirect('../transactions/index.php');
    }

    public function delete()
    {
        requireLogin();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        if(
            !isset($_POST['csrf_token']) ||
            !isset($_SESSION['csrf_token'])||
            !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
        ){
            die('Invalid CSRF token.');
        }


        $transactionId = $_POST['transactionId'] ?? '';

        if (!filter_var($transactionId, FILTER_VALIDATE_INT) || $transactionId <= 0) {
            die('Invalid transaction ID.');
        }

        $userId = $_SESSION['user_id'];

        $this->transactionModel->deleteTransaction(
            $transactionId,
            $userId
        );

        redirect('../transactions/index.php');
    }

    public function showReceipt($transactionId){
        requireLogin();
        $userId = $_SESSION['user_id'];

        $transactionId = $this->transactionModel->getTransactionById(
            $transactionId,
            $userId
        );

        if (!$transactionId) {
            die('Invalid transaction ID.');
        }

        if(empty($transactionId["receipt"])){
            die('Receipt already exists.');
        }

        return $transactionId['receipt'];
    }

    public function getCategories()
    {
        requireLogin();

        $userId = $_SESSION['user_id'];

        return $this->categoryModel->getCategoriesByUser($userId);
    }
}