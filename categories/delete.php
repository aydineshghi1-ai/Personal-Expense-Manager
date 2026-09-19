<?php

require_once '../controllers/CategoryController.php';

$categoryController = new CategoryController();

$categoryController->delete();
?>

<form method="POST" action="delete.php">
    <input type="hidden" name="categoryId" value="2">
    <button type="submit">Delete</button>
</form>