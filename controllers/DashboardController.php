<?php


require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Transaction.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/auth.php';

class DashboardController
{
    private $transactionModel;

    public function __construct()
    {
        global $pdo;

        $this->transactionModel = new Transaction($pdo);
    }

    public  function index()
    {
        $userId = $_SESSION['user_id'];
        $totalIncome = $this->transactionModel->getTotalIncome($userId);
        $totalExpense = $this->transactionModel->getTotalExpense($userId);
        $balance = $totalIncome - $totalExpense;
        $currentMonthTransactions = $this->transactionModel->getCurrentMonthTransactions($userId);
        return [
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
            'balance' => $balance,
            'currentMonthTransactions' => $currentMonthTransactions
        ];
    }

}