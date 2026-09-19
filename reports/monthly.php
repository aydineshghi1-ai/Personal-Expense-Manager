<?php
require_once '../includes/functions.php';
require_once '../includes/auth.php';
require_once '../controllers/ReportController.php';

requireLogin();

$month = $_GET['month'] ?? '';
$year = $_GET['year'] ?? '';

$reportController = new ReportController();

$report = $reportController->monthly(
    $month,
    $year
);

require_once '../views/reports/monthly.php';