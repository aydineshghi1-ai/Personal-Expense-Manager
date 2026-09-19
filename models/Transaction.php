<?php

class Transaction
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createTransaction($categoryId, $userId, $type, $amount, $description, $transactionDate, $receipt) {
        $sql = "INSERT INTO transactions (
                category_id,
                user_id,
                type,
                amount,
                description,
                transaction_date,
                receipt
            )
            VALUES ( :category_id, :user_id, :type, :amount, :description, :transaction_date, :receipt )";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':category_id' => $categoryId,
            ':user_id' => $userId,
            ':type' => $type,
            ':amount' => $amount,
            ':description' => $description,
            ':transaction_date' => $transactionDate,
            ':receipt' => $receipt
        ]);
    }

    public function getTransactionsByUser( $userId,  $search = '',  $type = '',  $dateFrom = '',  $dateTo = '',  $limit = 10,  $offset = 0)
    {
        $sql = "SELECT transactions.*, categories.name AS category_name
            FROM transactions
            JOIN categories
            ON transactions.category_id = categories.id
            WHERE transactions.user_id = :user_id";

        if ($search !== '') {
            $sql .= " AND categories.name LIKE :search";
        }

        if ($type !== '') {
            $sql .= " AND transactions.type = :type";
        }

        if ($dateFrom !== '') {
            $sql .= " AND transactions.transaction_date >= :dateFrom";
        }

        if ($dateTo !== '') {
            $sql .= " AND transactions.transaction_date <= :dateTo";
        }

        $sql .= " ORDER BY transactions.transaction_date DESC";
        $sql .= " LIMIT " . (int) $limit . " OFFSET " . (int) $offset;

        $stmt = $this->pdo->prepare($sql);

        $params = [
            ':user_id' => $userId
        ];

        if ($search !== '') {
            $params[':search'] = '%' . $search . '%';
        }

        if ($type !== '') {
            $params[':type'] = $type;
        }

        if ($dateFrom !== '') {
            $params[':dateFrom'] = $dateFrom;
        }

        if ($dateTo !== '') {
            $params[':dateTo'] = $dateTo;
        }

        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalTransactions($userId, $search = '', $type = '', $dateFrom = '', $dateTo = '')
    {
        $sql = "SELECT COUNT(*)
            FROM transactions
            JOIN categories
            ON transactions.category_id = categories.id
            WHERE transactions.user_id = :user_id";

        if ($search !== '') {
            $sql .= " AND categories.name LIKE :search";
        }

        if ($type !== '') {
            $sql .= " AND transactions.type = :type";
        }

        if ($dateFrom !== '') {
            $sql .= " AND transactions.transaction_date >= :dateFrom";
        }

        if ($dateTo !== '') {
            $sql .= " AND transactions.transaction_date <= :dateTo";
        }

        $stmt = $this->pdo->prepare($sql);

        $params = [
            ':user_id' => $userId
        ];

        if ($search !== '') {
            $params[':search'] = '%' . $search . '%';
        }

        if ($type !== '') {
            $params[':type'] = $type;
        }

        if ($dateFrom !== '') {
            $params[':dateFrom'] = $dateFrom;
        }

        if ($dateTo !== '') {
            $params[':dateTo'] = $dateTo;
        }

        $stmt->execute($params);

        return $stmt->fetchColumn();
    }

    public function getTransactionById($transactionId, $userId)
    {
        $sql = "SELECT transactions.*, categories.name AS category_name
                FROM transactions
                JOIN categories
                ON transactions.category_id = categories.id
                WHERE transactions.id = :id
                AND transactions.user_id = :user_id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':id' => $transactionId,
            ':user_id' => $userId
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateTransaction($transactionId, $userId, $categoryId, $type, $amount, $description, $transactionDate)
    {
        $sql = "UPDATE transactions
            SET category_id = :category_id,
                type = :type,
                amount = :amount,
                description = :description,
                transaction_date = :transaction_date
            WHERE id = :id
            AND user_id = :user_id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':category_id' => $categoryId,
            ':type' => $type,
            ':amount' => $amount,
            ':description' => $description,
            ':transaction_date' => $transactionDate,
            ':id' => $transactionId,
            ':user_id' => $userId
        ]);
    }

    public function deleteTransaction($transactionId, $userId)
    {
        $sql = "DELETE FROM transactions
            WHERE id = :id
            AND user_id = :user_id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':id' => $transactionId,
            ':user_id' => $userId
        ]);
    }

    public function getTotalIncome($userId)
    {
        $sql = "SELECT SUM(amount)
            FROM transactions
            WHERE user_id = :user_id
            AND type = 'income'";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':user_id' => $userId
        ]);

        return $stmt->fetchColumn();
    }

    public function getTotalExpense($userId)
    {
        $sql = "SELECT SUM(amount)
            FROM transactions
            WHERE user_id = :user_id
            AND type = 'expense'";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':user_id' => $userId
        ]);

        return $stmt->fetchColumn();
    }

    public function getCurrentMonthTransactions($userId)
    {
        $sql = "SELECT transactions.*, categories.name AS category_name
            FROM transactions
            JOIN categories
            ON transactions.category_id = categories.id
            WHERE transactions.user_id = :user_id
            AND MONTH(transaction_date) = MONTH(CURRENT_DATE)
            AND YEAR(transaction_date) = YEAR(CURRENT_DATE)
            ORDER BY transaction_date DESC";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':user_id' => $userId
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMonthlyReport($userId, $month, $year)
    {
        $sql  = "SELECT SUM( CASE WHEN type = 'income' THEN amount  ELSE 0   END )AS total_income, SUM( CASE WHEN type = 'expense' THEN amount  ELSE 0   END )AS total_expense
                    FROM transactions
                    WHERE user_id = :user_id
                    AND YEAR(transaction_date) = :year
                    AND MONTH(transaction_date) = :month";

        $stmt =$this->pdo->prepare($sql);
        $stmt->execute([
            ':user_id' => $userId,
            ':year' => $year,
            ':month' => $month
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
