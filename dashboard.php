<?php

require_once 'includes/functions.php';
require_once 'includes/auth.php';
require_once 'controllers/DashboardController.php';

requireLogin();

$dashboardController = new DashboardController();

$dashboardData = $dashboardController->index();

require_once 'views/dashboard/index.php';