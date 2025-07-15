<?php
// includes/db.php

class DB {
    private static $pdo = null;

    private static function connect() {
        if (self::$pdo === null) {
            try {
                self::$pdo = new PDO(
                    'mysql:host=localhost;dbname=edu_management_system;charset=utf8mb4',
                    'root',
                    '',
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false
                    ]
                );
            } catch (PDOException $e) {
                error_log(": " . $e->getMessage());
                throw new Exception(" connexion à la base de données");
            }
        }
        return self::$pdo;
    }

    public static function fetchOne($query, $params = []) {
        try {
            $stmt = self::connect()->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("fetchOne error: " . $e->getMessage());
            return false;
        }
    }

    public static function fetchAll($query, $params = []) {
        try {
            $stmt = self::connect()->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("fetchAll error: " . $e->getMessage());
            return false;
        }
    }

    public static function countRows($table, $condition = '') {
        try {
            $query = "SELECT COUNT(*) as count FROM $table";
            if ($condition) {
                $query .= " WHERE $condition";
            }
            $stmt = self::connect()->query($query);
            $result = $stmt->fetch();
            return $result['count'];
        } catch (PDOException $e) {
            error_log("countRows error: " . $e->getMessage());
            return false;
        }
    }

    public static function insert($table, $data) {
        try {
            $columns = implode(', ', array_keys($data));
            $placeholders = ':' . implode(', :', array_keys($data));
            
            $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
            $stmt = self::connect()->prepare($query);
            
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            
            $stmt->execute();
            return self::connect()->lastInsertId();
        } catch (PDOException $e) {
            error_log("insert error: " . $e->getMessage());
            return false;
        }
    }
}