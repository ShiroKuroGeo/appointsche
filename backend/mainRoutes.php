<?php
session_start();
include("admin.php");
include("authentication.php");
include("customer.php");

$method = $_POST["Method"];
if (function_exists($method)) {
    call_user_func($method);
}

function login()
{
    $auth = new authentication();

    echo $auth->login($_POST["email"], $_POST["password"]);
}

function changePasswordUsingGmail()
{
    $auth = new authentication();

    echo $auth->changePasswordUsingGmail($_POST["email"]);
}

function changePasswordAuth()
{
    $auth = new authentication();

    echo $auth->changePasswordAuth($_POST["password"],$_POST["code"]);
}

function register()
{
    $auth = new authentication();

    echo $auth->register($_POST["fullname"], $_POST["email"], $_POST["password"]);
}

function storeVehicle()
{
    $customer = new customer();

    echo $customer->storeVehicle($_SESSION["user_id"], $_POST["Snumber"], $_POST["model"], $_POST["year"], $_POST["licPlaNum"]);
}

function allVehicle()
{
    $customer = new customer();

    echo $customer->allVehicle($_SESSION["user_id"]);
}

function totalPendingAppointments()
{
    $customer = new customer();

    echo $customer->totalPendingAppointments($_SESSION["user_id"]);
}

function viewAppointment()
{
    $customer = new customer();

    echo $customer->viewAppointment($_SESSION["user_id"]);
}

function user()
{
    $customer = new customer();

    echo $customer->user($_SESSION["user_id"]);
}

function useviewAllAppointment()
{
    $customer = new customer();

    echo $customer->useviewAllAppointment($_SESSION["user_id"]);
}

function appointmentsCard()
{
    $customer = new customer();

    echo $customer->appointmentsCard($_SESSION["user_id"]);
}

function deleteVehicle()
{
    $customer = new customer();

    echo $customer->deleteVehicle($_POST["vehicleId"]);
}

function updateVehicle()
{
    $customer = new customer();

    echo $customer->updateVehicle($_POST["vehicleId"], $_POST["updateSnumber"], $_POST["updatemodel"], $_POST["updateyear"], $_POST["updatelicPlaNum"]);
}

function sendAppointment()
{
    $customer = new customer();

    echo $customer->sendAppointment($_SESSION["user_id"], $_POST["fullname"], $_POST["email"], $_POST["ORNumber"], $_POST["wheel"], $_POST["engineNumber"], $_POST["seriesModel"], $_POST["yearModel"], $_POST['date'], $_POST['Certificate']);
}

function changePassword()
{
    $customer = new customer();

    echo $customer->changePassword($_SESSION["user_id"], $_POST["old"], $_POST["new"]);
}

function updateUser()
{
    $customer = new customer();

    $location = $_SERVER["DOCUMENT_ROOT"] . "/appointSche/Assets/images/";
    $profile = "";
    if (isset($_FILES["profile"]["name"])) {

        $finalfile = $location . $_FILES["profile"]["name"];
        if (move_uploaded_file($_FILES["profile"]["tmp_name"], $finalfile)) {
            $profile = $_FILES["profile"]["name"];
        }
    }

    echo $customer->updateUser($_SESSION["user_id"], $profile, $_POST["fullname"]);
}

function viewAppointmentAdmin()
{
    $admin = new admin();

    echo $admin->viewAppointmentAdmin();
}

function allUsersAdmin()
{
    $admin = new admin();

    echo $admin->allUsersAdmin();
}

function allEventsAdmin()
{
    $admin = new admin();

    echo $admin->allEventsAdmin();
}

function viewAppointmentInCartAdmin()
{
    $admin = new admin();

    echo $admin->viewAppointmentInCartAdmin();
}

function recentUserAdmin()
{
    $admin = new admin();

    echo $admin->recentUserAdmin();
}

function recentAppointmentAdmin()
{
    $admin = new admin();

    echo $admin->recentAppointmentAdmin();
}

function recentAppointmentActiveAdmin()
{
    $admin = new admin();

    echo $admin->recentAppointmentActiveAdmin();
}

function updateUserAdmin()
{
    $admin = new admin();

    echo $admin->updateUserAdmin($_POST['status'],$_POST['user_id']);
}

function setAppointmentToUserAdmin()
{
    $admin = new admin();

    echo $admin->setAppointmentToUserAdmin($_POST['date'],$_POST['message'],$_POST['appId']);
}

function updateApproveAppointment()
{
    $admin = new admin();

    echo $admin->updateApproveAppointment($_POST['appId'], $_POST['gmail']);
}

function setEventSchedules()
{
    $admin = new admin();

    echo $admin->setEventSchedules($_POST["eventTitle"], $_POST["eventDate"]);
}