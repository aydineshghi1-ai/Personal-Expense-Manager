<?php
require_once '../config/database.php';
require_once '../models/Transaction.php';
require_once '../includes/auth.php';
require_once '../includes/functions.php';

class ReportController
{
    private $transactionModel;

    public function __construct()
    {
        global $pdo;

        $this->transactionModel = new Transaction($pdo);
    }

    public function monthly($month, $year)
    {
        requireLogin();
        $userId = $_SESSION['user_id'];
        $report = $this->transactionModel->getMonthlyReport(
            $userId,
            $month,
            $year
        );

        $report['balance'] = $report['total_income'] - $report['total_expense'];


        return $report;
    }
}