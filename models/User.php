<?php 

class User {
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function findByEmail($email) {
        $sql = "SELECT * FROM users WHERE email= :email";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([':email' => $email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    public function createUser($name, $email, $passwordHash){
        
        $sql = "INSERT INTO users(name, email, password)
                VALUES (:name,  :email, :password)";
        
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':name' =>$name,
            ':email' => $email,
            ':password' => $passwordHash
        ]);
    }
}

