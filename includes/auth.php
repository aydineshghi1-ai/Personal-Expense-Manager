<?php

session_start();

function requireLogin() {
    if (!isset($_SESSION['user_id'])) {
        redirect('/auth/login.php');
    }
}