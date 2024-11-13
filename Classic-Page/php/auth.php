<?php
    require_once 'connection.php';

    function loginUser($pdo, $email, $password) {
        // Input validation for email and password
        if (empty($email) || empty($password)) {
            throw new InvalidArgumentException('email and password are required.');
        }
        
        $stmt = $pdo->prepare(
            "SELECT * 
            FROM User
            WHERE email = :email"
            );
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user && $password == $user['Password']) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['user_id'] = $user['User_ID'];
            $_SESSION['account_type'] = $user['Type'];
            $_SESSION['phone_number'] = $user['Phone_Number'];
            return true;
        } else {
            return false;
        }
    }
    
    function logoutUser() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
    }

    function isUserAuthorizedForAccount($pdo, $user_id, $request_type = 'NULL') {
        // Ensure user_id and account_id are numeric and positive
        if (!is_numeric($user_id) || $user_id <= 0) {
            throw new InvalidArgumentException('Invalid user or account holder ID.');
        }

        if($request_type == "ADMIN"){
            $stmt = $pdo->prepare("
                SELECT COUNT(*)
                FROM user
                WHERE ID = :user_id AND TYPE = :account_type
            ");
            $stmt->execute([':user_id' => $user_id, ':account_type' => 'ADMIN']);
            return $stmt->fetchColumn() > 0;
        }
        
        return true;
    }
    
?>