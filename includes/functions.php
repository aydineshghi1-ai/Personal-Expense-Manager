<?php 

function e($value) { 
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
};

function redirect($url) {
    header("Location: $url");
    exit;
};

function csrfToken() {
    if(!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}