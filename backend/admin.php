<?php
include_once('database.php');

class admin
{
    public function viewAppointmentAdmin()
    {
        return $this->viewAppointmentAdminFunction();
    }
    
    public function allEventsAdmin()
    {
        return $this->allEventsAdminFunction();
    }

    public function setEventSchedules($eventTitle, $eventDate)
    {
        return $this->setEventSchedulesFunction($eventTitle, $eventDate);
    }

    public function viewAppointmentInCartAdmin()
    {
        return $this->viewAppointmentInCartAdminFunction();
    }

    public function allUsersAdmin()
    {
        return $this->allUsersAdminFunction();
    }

    public function updateUserAdmin($status, $userid)
    {
        return $this->updateUserAdminFunction($status, $userid);
    }

    public function updateApproveAppointment($appId, $gmail)
    {
        return $this->approveAppointment($appId, $gmail);
    }

    public function setAppointmentToUserAdmin($date, $message, $appId)
    {
        return $this->setAppointmentToUserAdminFunction($date, $message, $appId);
    }

    private function viewAppointmentAdminFunction()
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->viewAppointmentAdminQuery());
                $query->execute();
                $db->closeConnection();
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function viewAppointmentInCartAdminFunction()
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->viewAppointmentInCartAdminQuery());
                $query->execute();
                $db->closeConnection();
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function allUsersAdminFunction()
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->allUsersAdminQuery());
                $query->execute();
                $db->closeConnection();
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function allEventsAdminFunction()
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->allEventsAdminQuery());
                $query->execute();
                $db->closeConnection();
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function updateUserAdminFunction($status, $userid)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->updateUserAdminQuery());
                $query->execute(array($status, $userid));
                if (!$query->fetch()) {
                    $db->closeConnection();
                    return 200;
                } else {
                    $db->closeConnection();
                    return 400;
                }
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function setAppointmentToUserAdminFunction($date, $message, $appId)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->setAppointmentToUserAdminQuery());
                $query->execute(array($date, $message, $appId));
                if (!$query->fetch()) {
                    $db->closeConnection();
                    return 200;
                } else {
                    $db->closeConnection();
                    return 400;
                }
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function approveAppointment($appId, $gmail)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->approveAppointmentQuery());
                $query->execute(array($appId));

                if (!$query->fetch()) {
                    $db->closeConnection();
                    date_default_timezone_set('Asia/Manila');
                    $date = new DateTime('now');
                    $today = $date->format('Y-m-d H:i:s');
                    $email = require __DIR__ . "/mailer.php";
                    $email->setFrom('homergodinez9@gmail.com');
                    $email->addAddress($gmail);
                    //Content
                    $email->isHTML(true);
                    $email->Subject = 'Your schedule is......';
                    $email->Body = <<<END
                            Thank you for choosing Emission Smoke Test. <br><br>

                            Your schedule has been <span style="color: blue;">Approved</span>.<br><br>

                            <b>Approved Date:</b> $today<br>
                            <b>Email:</b> $gmail<br><br>

                            For futher assistance, please contact me using the number of <b>09384124071</b> or come at our location in<br>
                            <b>Poblacion Cordova Cebu</b></b><br><br>

                            Truly yours,<br>
                            Emission Smoke Test Team.<br>

                            Contact Number: 09384124071<br>
                            Messenger: https://www.facebook.com/messages/t/100001781124122
                        END;

                    $email->send();

                    return 200;
                } else {
                    $db->closeConnection();
                    return 400;
                }
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function setEventSchedulesFunction($eventTitle, $eventDate)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->setEventSchedulesFunctionQuery());
                $query->execute(array($eventTitle, $eventDate));

                if (!$query->fetch()) {
                    $db->closeConnection();
                    return 200;
                } else {
                    $db->closeConnection();
                    return 400;
                }
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function viewAppointmentAdminQuery()
    {
        return "SELECT appointId, appointmentdate as ad, fullname as fn, user_id as id, color as cl FROM `appointments` WHERE appointmentDate > 1
        UNION    
        SELECT events_id, event_date as ad, event_title as fn, NULL AS id, color as cl FROM `events`;";
    }

    private function viewAppointmentInCartAdminQuery()
    {
        return "SELECT * FROM `appointments` ORDER BY created_at DESC";
    }

    private function allUsersAdminQuery()
    {
        return "SELECT * FROM `users` WHERE role = 1 ORDER BY created DESC";
    }

    private function updateUserAdminQuery()
    {
        return "UPDATE `users` SET `status`= ? WHERE `user_id` = ?";
    }

    private function setAppointmentToUserAdminQuery()
    {
        return "UPDATE `appointments` SET `appointmentDate`= ? , `message` = ? WHERE `appointId` = ?";
    }

    private function approveAppointmentQuery()
    {
        return "UPDATE `appointments` set `status` = 1 WHERE appointId = ?";
    }

    private function setEventSchedulesFunctionQuery()
    {
        return "INSERT INTO `events`(`event_title`, `event_date`) VALUES (?,?)";
    }

    private function allEventsAdminQuery()
    {
        return "SELECT `events_id`, `event_title`, `event_date`, `color`, `created_at`, `updated_at` FROM `events`";
    }
}
