<?php
include_once('database.php');

class authentication
{
    public function login($email, $password)
    {
        return $this->loginFunction($email, $password);
    }

    public function register($fullname, $email, $password)
    {
        return $this->registerFunction($fullname, $email, $password);
    }

    public function changePasswordUsingGmail($gmail)
    {
        return $this->changePasswordUsingGmailFunction($gmail);
    }

    public function changePasswordAuth($password, $code)
    {
        return $this->changePasswordFunction($password, $code);
    }

    private function loginFunction($email, $password)
    {
        try {
            $database = new database();
            if ($database->getStatus()) {
                $query = $database->getCon()->prepare($this->loginQuery());
                $query->execute(array($email, md5($password)));
                $role = null;
                while ($row = $query->fetch()) {
                    $role = $row['role'];
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['profile'] = $row['profile'];
                    $_SESSION['fullname'] = $row['fullname'];
                }
                return $role;
            } else {
                return 501; //Connection not connected
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function registerFunction($fullname, $email, $password)
    {
        try {
            $database = new database();
            if ($database->getStatus()) {
                $query = $database->getCon()->prepare($this->registerQuery());
                $query->execute(array($fullname, $email, md5($password)));
                $database->closeConnection();
                if (!$query->fetch()) {
                    return 200; //Successful
                } else {
                    return 401; //Error
                }
            } else {
                return 501; // Connection not Connected
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function changePasswordFunction($password, $code)
    {
        try {
            $database = new database();
            if ($database->getStatus()) {
                $query = $database->getCon()->prepare($this->changePasswordQuery());
                $query->execute(array(md5($password), $code));
                $database->closeConnection();
                if (!$query->fetch()) {
                    return 200; //Successful
                } else {
                    return 401; //Error
                }
            } else {
                return 501; // Connection not Connected
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function changePasswordUsingGmailFunction($gmail)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $stmt = $db->getCon()->prepare($this->changePasswordUsingGmailQuery());
                $reset_token = bin2hex(random_bytes(16));
                $token = hash("sha256", $reset_token);
                $stmt->execute(array($token, $gmail));
                $result = $stmt->fetch();
                $db->closeConnection();

                if (!$result) {
                    date_default_timezone_set('Asia/Manila');
                    $date = new DateTime('now');
                    $today = $date->format('Y-m-d H:i:s');

                    $email = require __DIR__ . "/mailer.php";
                    $email->setFrom("NOREPLY@example.com");
                    $email->addAddress($gmail);
                    $email->Subject = "Password Reset Emission";
                    $email->Body = <<<END
                                To reset your password, Click here <a href="http://localhost/appointsche/changepasswordusinggmail.php?resetToken=$token"><span style="color: blue;">Reset Password</span></a><br><br>

                                <b>Reset Password Date:</b>$today<br>
                                <b>Email:</b>$gmail<br><br>

                                Truly yours,<br>
                                Emission Test Forgot Password<br>
                            END;
                    $email->send();
                    return 200;
                } else {
                    return 400;
                }
            } else {
                return 400;
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function loginQuery()
    {
        return "SELECT * FROM `users` WHERE `email` = ? AND `password` = ?";
    }

    private function registerQuery()
    {
        return "INSERT INTO `users`(`fullname`, `email`, `password`) VALUES(?,?,?)";
    }

    private function changePasswordUsingGmailQuery(){
        return "UPDATE `users` SET `token` = ? WHERE `email` = ?";
    }

    private function changePasswordQuery(){
        return "UPDATE `users` SET `password` = ? WHERE `token` = ?";
    }

}
