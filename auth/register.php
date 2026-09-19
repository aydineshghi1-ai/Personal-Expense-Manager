<?php 
require_once "../controllers/AuthController.php";

$authController  = new AuthController();  

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    $authController->register();
};

?>

<form method="POST">

    <label for="name">Name</label>
    <input type="text" name="name" id="name">

    <label for="email">Email</label>
    <input type="email" name="email" id="email">

    <label for="password">Password</label>
    <input type="password" name="password" id="password">

    <button type="submit">Register</button>

</form>