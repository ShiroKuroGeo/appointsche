<?php
include_once('database.php');
class customer
{
    public function storeVehicle($user_id, $seriesNumber, $model, $year, $licPlaNum)
    {
        return $this->storeVehicleFunction($user_id, $seriesNumber, $model, $year, $licPlaNum);
    }

    public function allVehicle($user_id)
    {
        return $this->allVehicleFunction($user_id);
    }

    public function totalPendingAppointments($user_id)
    {
        return $this->totalPendingAppointmentsFunction($user_id);
    }

    public function useviewAllAppointment($user_id)
    {
        return $this->useviewAllAppointmentFunction($user_id);
    }

    public function updateUser($user_id, $profile, $fullname)
    {
        return $this->updateUserFunction($user_id, $profile, $fullname);
    }

    public function viewAppointment($user_id)
    {
        return $this->viewAppointmentFunction($user_id);
    }

    public function changePassword($user_id, $old, $new)
    {
        return $this->changePasswordFunction($user_id, $old, $new);
    }

    public function deleteVehicle($vehicleId)
    {
        return $this->deleteVehicleFunction($vehicleId);
    }

    public function updateVehicle($vehicleId, $updateSnumber, $updatemodel, $updateyear, $updatelicPlaNum)
    {
        return $this->updateVehicleFunction($vehicleId, $updateSnumber, $updatemodel, $updateyear, $updatelicPlaNum);
    }

    public function sendAppointment($user_id, $fullname, $email, $ORNumber, $wheel, $engineNumber, $seriesModel, $yearModel, $date, $cr)
    {
        return $this->sendAppointmentFunction($user_id, $fullname, $email, $ORNumber, $wheel, $engineNumber, $seriesModel, $yearModel, $date, $cr);
    }

    public function user($user_id)
    {
        return $this->userFunction($user_id);
    }

    public function appointmentsCard($user_id)
    {
        return $this->appointmentsCardFunction($user_id);
    }

    private function storeVehicleFunction($user_id, $seriesNumber, $model, $year, $licPlaNum)
    {
        try {
            $database = new database();
            if ($database->getStatus()) {
                $query = $database->getCon()->prepare($this->storeVehicleQuery());
                $query->execute(array($user_id, $seriesNumber, $model, $year, $licPlaNum));
                $database->closeConnection();
                if (!$query->fetch()) {
                    return 200;
                } else {
                    return 401;
                }
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function allVehicleFunction($user_id)
    {
        try {
            $database = new database();
            if ($database->getStatus()) {
                $query = $database->getCon()->prepare($this->allVehicleQuery());
                $query->execute(array($user_id));
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function totalPendingAppointmentsFunction($user_id)
    {
        try {
            $database = new database();
            if ($database->getStatus()) {
                $query = $database->getCon()->prepare($this->totalPendingAppointmentsQuery());
                $query->execute(array($user_id));
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function viewAppointmentFunction($user_id)
    {
        try {
            $database = new database();
            if ($database->getStatus()) {
                $query = $database->getCon()->prepare($this->viewAppointmentQuery());
                $query->execute(array($user_id));
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function userFunction($user_id)
    {
        try {
            $database = new database();
            if ($database->getStatus()) {
                $query = $database->getCon()->prepare($this->userQuery());
                $query->execute(array($user_id));
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function useviewAllAppointmentFunction($user_id)
    {
        try {
            $database = new database();
            if ($database->getStatus()) {
                $query = $database->getCon()->prepare($this->viewAllAppointmentQuery());
                $query->execute(array($user_id));
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function appointmentsCardFunction($user_id)
    {
        try {
            $database = new database();
            if ($database->getStatus()) {
                $query = $database->getCon()->prepare($this->appointmentsCardQuery());
                $query->execute(array($user_id));
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function deleteVehicleFunction($vehicleId)
    {
        try {
            $database = new database();
            if ($database->getStatus()) {
                $query = $database->getCon()->prepare($this->deleteVehicleQuery());
                $query->execute(array($vehicleId));
                $database->closeConnection();
                if (!$query->fetch()) {
                    return 200;
                } else {
                    return 401;
                }
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function updateVehicleFunction($vehicleId, $updateSnumber, $updatemodel, $updateyear, $updatelicPlaNum)
    {
        try {
            $database = new database();
            if ($database->getStatus()) {
                $query = $database->getCon()->prepare($this->updateVehicleQuery());
                $query->execute(array($updateSnumber, $updatemodel, $updateyear, $updatelicPlaNum, $vehicleId));
                $database->closeConnection();
                if (!$query->fetch()) {
                    return 200;
                } else {
                    return 401;
                }
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function sendAppointmentFunction($user_id, $fullname, $email, $ORNumber, $wheel, $engineNumber, $seriesModel, $yearModel, $date, $cr)
    {
        try {
            $database = new database();
            if ($database->getStatus()) {
                $query = $database->getCon()->prepare($this->sendAppointmentQuery());
                $query->execute(array($user_id, $fullname, $email, $ORNumber, $wheel, $engineNumber, $seriesModel, $yearModel, $date, $cr));
                $database->closeConnection();
                if (!$query->fetch()) {
                    return 200;
                } else {
                    return 401;
                }
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function updateUserFunction($user_id, $profile, $fullname)
    {
        try {
            $database = new database();
            if ($database->getStatus()) {
                $query = $database->getCon()->prepare($this->updateUserQuery());
                $query->execute(array($profile, $fullname, $user_id));
                $database->closeConnection();
                if (!$query->fetch()) {
                    return 200;
                } else {
                    return 401;
                }
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function changePasswordFunction($user_id, $old, $new)
    {
        try {
            $database = new database();
            if ($database->getStatus()) {
                $query = $database->getCon()->prepare($this->confirmPasswordQuery());
                $query->execute(array(md5($old), $user_id));
                $result = null;
                while ($row = $query->fetch()) {
                    if ($row['pass'] != null) {
                        $result = 1;
                    }else{
                        $result = 2;
                    }
                }
                if($result == 1){
                    return $this->changePasswordFunctionConfirm($user_id, $old, $new);
                }else{
                    return 500;
                }
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }
    private function changePasswordFunctionConfirm($user_id, $old, $new)
    {
        try {
            $database = new database();
            if ($database->getStatus()) {
                $query = $database->getCon()->prepare($this->changePasswordQuery());
                $query->execute(array(md5($new), $user_id, md5($old)));
                $database->closeConnection();
                if (!$query->fetch()) {
                    return 200;
                } else {
                    return 401;
                }
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function userQuery()
    {
        return "SELECT * FROM `users` WHERE `user_id` = ?";
    }

    private function storeVehicleQuery()
    {
        return "INSERT INTO `vehicle`(`user_id`, `seriesNumber`, `model`, `year`, `licPlaNum`) VALUES (?,?,?,?,?)";
    }

    private function allVehicleQuery()
    {
        return "SELECT * FROM `vehicle` WHERE `user_id` = ? ORDER BY created DESC";
    }

    private function updateVehicleQuery()
    {
        return "UPDATE `vehicle` SET `seriesNumber`= ? ,`model`= ? , `year`= ?, `licPlaNum`= ?  WHERE `vehicle_id` = ?";
    }

    private function deleteVehicleQuery()
    {
        return "DELETE FROM `vehicle` WHERE `vehicle_id` = ?";
    }

    private function sendAppointmentQuery()
    {
        return "INSERT INTO `appointments`(`user_id`, `fullname`, `email`, `orNumber`, `wheel`, `engineNumber`, `seriesModel`, `yearModel`, `appointmentDate`, `appointCR`) VALUES (?,?,?,?,?,?,?,?,?,?)";
    }
    
    private function viewAllAppointmentQuery(){
        return "SELECT * FROM `appointments` WHERE user_id = ?";
    }
    
    private function viewAppointmentQuery()
    {
        return "SELECT appointId, appointmentdate as ad, fullname as fn, user_id as id, color as cl FROM `appointments` WHERE appointmentDate > 1 AND user_id = ?
        UNION
        SELECT events_id, event_date as ad, event_title as fn, NULL AS id, color as cl FROM `events`";
    }





    private function updateUserQuery()
    {
        return "UPDATE `users` SET `profile` = ?, `fullname`= ? WHERE `user_id` = ?";
    }

    private function totalPendingAppointmentsQuery(){
        return "SELECT * FROM `appointments` WHERE `status` = 0 AND `user_id` = ?";
    }

    private function changePasswordQuery()
    {
        return "UPDATE `users` SET `password` = ? WHERE `user_id` = ? AND `password` = ?";
    }

    private function confirmPasswordQuery()
    {
        return "SELECT `password` as pass FROM `users` WHERE password = ? AND user_id = ?";
    }

    private function appointmentsCardQuery()
    {
        return "SELECT * FROM `appointments` WHERE `status` = 1 AND `user_id` = ? ORDER BY `appointmentDate` DESC LIMIT 1";
    }
}
