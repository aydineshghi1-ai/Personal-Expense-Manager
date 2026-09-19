<?php

class Category {
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createCategory($userId, $name, $type) 
    {
        $sql = "INSERT INTO categories (user_id, name, type)
                VALUES (:user_id, :name, :type)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':user_id' => $userId,
            ':name' => $name,
            ':type' => $type
        ]);
    }

    public function getCategoriesByUser($userId) 
    {
        $sql = "SELECT * FROM categories
                WHERE user_id= :user_id
                ORDER BY id DESC";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':user_id' => $userId
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoryById($categoryId, $userId)
    {
        $sql = "SELECT * FROM categories 
            WHERE id = :id 
            AND user_id = :user_id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':id' => $categoryId,
            ':user_id' => $userId
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateCategory($categoryId, $userId, $name, $type)
    {
        $sql = "UPDATE categories
                SET name = :name,
                    type = :type
                WHERE id = :id
                AND user_id = :user_id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':name' => $name,
            ':type' => $type,
            ':id' => $categoryId,
            ':user_id' => $userId
        ]);
    }

    public function deleteCategory($categoryId, $userId)
    {
        $sql = "DELETE FROM categories
                WHERE id = :id
                AND user_id = :user_id";
        
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ":id" => $categoryId,
            ":user_id" => $userId
        ]);
    }
}