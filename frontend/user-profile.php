<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emission</title>
    <link rel="stylesheet" href="../assets/css/theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/em.css">
    <link rel='stylesheet' href='../assets/vendor/fullcalendar/core/main.css' />
    <link rel='stylesheet' href='../assets/vendor/fullcalendar/daygrid/main.css' />
    <link rel='stylesheet' href='../assets/vendor/fullcalendar/timegrid/main.css' />
    <link rel='stylesheet' href='../assets/vendor/fullcalendar/list/main.css' />
</head>

<body class="bg-white overflow-hidden">
    <nav class="navbar navbar-expand-lg navbar-dark is-navbar-dark w-100">
        <div class="container px-0">
            <a class="navbar-brand" href="./index.html"><img src="../assets/images/logo.jpg" style="width: 50px;" alt="geeks UI logo" /></a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar top-bar mt-0"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-default">
                <ul class="navbar-nav">
                    <li class="nav-item me-3">
                        <a class="nav-link" href="index.php">
                            Home
                        </a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="dashboard.php">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="schedule.php">
                            Schedule
                        </a>
                    </li>
                </ul>
                <div class="ms-auto mt-lg-0">
                    <li class="dropdown ms-2">
                        <a class="rounded-circle" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="avatar avatar-md">
                                <img alt="avatar" src="../assets/images/<?php echo $_SESSION['profile'] ?>" class="rounded-circle" />
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                            <div class="dropdown-item">
                                <a href="user-profile.php" class="d-flex">
                                    <div class="avatar avatar-md">
                                        <img alt="avatar" src="../assets/images/<?php echo $_SESSION['profile'] ?>" class="rounded-circle" />
                                    </div>
                                    <div class="ms-3 lh-1">
                                        <h5 class="mb-1 mt-2"><?php echo $_SESSION['fullname'] ?></h5>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="dropdown-item" href="../assets/vue/logout.php">
                                        <i class="fa fa-sign-in me-2"></i>Sign Out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <main class="pt-5 bg-primary-color" id="customer-vue">
        <div class="container">
            <div class="main-body" v-for="u of users">

                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img :src="'../assets/images/' + u.profile" alt="Admin" class="rounded-circle" width="150" height="150">
                                    <div class="mt-3">
                                        <h4>{{u.fullname}}</h4>
                                        <p class="text-secondary mb-1">{{u.email}}</p>
                                        <p class="text-muted mb-1">{{dateToString(u.created)}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Information</h6>
                                    <button @click="showInformation" class="btn btn-sm btn-link text-primary col-5 text-decoration-none">
                                        View Information
                                    </button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Change Password</h6>
                                    <button @click="showChangePassword" class="btn btn-sm btn-link text-primary col-5 text-decoration-none">
                                        Change Password
                                    </button>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Change Information</h6>
                                    <button @click="showChangeInformation" class="btn btn-sm btn-link text-primary col-5 text-decoration-none">
                                        Change Information
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="information" class="col-md-8">
                        <div class="card mb-3 ">
                            <div class="card-body" >
                                <h3 class="mb-6 text-capitalize text-primary fw-bold">user information</h3>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{u.fullname}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{u.email}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Type</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        Customer
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="changePassword" class="visually-hidden col-md-8">
                        <div class="card mb-3 ">
                            <div class="card-body">
                                <h3 class="mb-6 text-capitalize text-primary fw-bold">change password</h3>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="form-label" for="schedule-start-date">Old Password</label>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control col-12" type="password" id="oldPassword" placeholder="Enter Old Password" />
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">

                                        <label class="form-label" for="schedule-start-date">New Password</label>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control col-12" type="password" id="newPassword" placeholder="Enter New Password" />
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="form-label" for="schedule-start-date">Retype New Password</label>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control col-12" type="password" id="renewPassword" placeholder="Enter Confirm Password" />
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12 text-secondary">
                                        <button class="btn btn-primary btn-md px-5 float-end" type="submit" @click="changePassword">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="changeInformation" class="visually-hidden col-md-8">
                        <div class="card mb-3  text-white">
                            <div class="card-body">
                                <h3 class="mb-6 text-capitalize fw-bold">change information</h3>
                                <div class="row">
                                    <label class="form-label" for="schedule-start-date">Profile Picture</label><br>
                                    <i class="fa fa-camera-retro fa-5x" style="cursor: pointer; color: black" aria-hidden="true" onclick="document.getElementById('updateProfile').click()"></i>
                                    <input style="visibility: hidden;" type="file" name="profile" id="updateProfile" required />
                                </div>
                                <hr>
                                <div class="row">
                                    <label class="form-label" for="schedule-start-date">Fullname</label>
                                    <input class="form-control " type="text" :value="u.fullname" id="updateFullname" required />
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12 text-secondary">
                                        <button class="btn btn-outline-primary" type="submit" @click="updateUser(u.user_id)" onclick="document.getElementById('cancels').click()">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer pt-8 py-8 bg-primary-color">
        <div class="container">
            <div class="row ">
                <div class="offset-lg-2 col-lg-8 col-md-12 col-12">
                    <div class="row">
                        <div class="col-md-6 col-12 text-center text-md-start">
                            <span> <span>© <span id="copyright">
                                        <script>
                                            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                                        </script>
                                    </span> Testing. Design and Coded by </span><span class="text-primary">Emission Team</span>
                        </div>
                        <div class="col-12 col-md-6">
                            <nav class="nav nav-footer justify-content-center justify-content-md-end">
                                <a class="nav-link active ps-0 " href="#" target="_blank">Documentation</a>
                                <a class="nav-link " href="#" target="_blank">Support </a>
                                <a class="nav-link " href="#" target="_blank">Changelog</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

<script src='../assets/vendor/fullcalendar/core/main.js'></script>
<script src='../assets/vendor/fullcalendar/daygrid/main.js'></script>
<script src='../assets/vendor/fullcalendar/timegrid/main.js'></script>
<script src='../assets/vendor/fullcalendar/list/main.js'></script>
<script src='../assets/vendor/fullcalendar/interaction/main.js'></script>
<script src="../assets/js/popper.js"></script>
<script src="../assets/js/theme.js"></script>
<script src="../assets/vue/axios.js"></script>
<script src="../assets/vue/app.js"></script>
<script src="../assets/vue/customer.js"></script>

</html>
<!-- <!doctype html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profile</title>
    <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="../assets/vendor/remixicon/fonts/remixicon.css">
</head>

<body class="fixed-top-navbar" id="customer-vue">
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <div id="all" v-for="u of users">
        <div class="iq-top-navbar">
            <div class="container">
                <div class="iq-navbar-custom">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                            <i class="ri-menu-line wrapper-menu"></i>
                            <a href="index.php" class="header-logo">
                                <img src="../assets/images/logo.jpg" class="img-fluid rounded-normal light-logo" alt="logo">
                            </a>
                        </div>
                        <div class="iq-menu-horizontal">
                            <nav class="iq-sidebar-menu">
                                <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
                                    <a href="index.php" class="header-logo">
                                        <img src="../assets/images/logo.jpg" class="img-fluid rounded-normal" alt="logo">
                                    </a>
                                    <div class="iq-menu-bt-sidebar">
                                        <i class="las la-bars wrapper-menu"></i>
                                    </div>
                                </div>
                                <ul id="iq-sidebar-toggle" class="iq-menu d-flex">
                                    <li class="">
                                        <a href="index.php" class="">
                                            <i class="fa fa-tachometer" aria-hidden="true"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="schedule.php" class="">
                                            <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                            <span>Appointments</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <nav class="navbar navbar-expand-lg navbar-light p-0">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                                <i class="ri-menu-3-line"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto navbar-list align-items-center">
                                    <li class="nav-item nav-icon dropdown ml-3 p-5">

                                    </li>
                                    <li class="caption-content">
                                        <a href="#" class="search-toggle dropdown-toggle d-flex align-items-center" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="../assets/images/<?php echo $_SESSION['profile'] ?>" class="avatar-40 img-fluid rounded" alt="user">
                                            <div class="caption ml-3">
                                                <h6 class="mb-0 line-height"><?php echo $_SESSION['fullname'] ?></h6>
                                            </div>
                                        </a>
                                        <div class="iq-sub-dropdown dropdown-menu user-dropdown" aria-labelledby="dropdownMenuButton3">
                                            <div class="card m-0">
                                                <div class="card-body p-0">
                                                    <div class="py-3">
                                                        <a href="user-profile.php" class="iq-sub-card">
                                                            <div class="media align-items-center">
                                                                <h6>Account Settings</h6>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <a class="right-ic p-3 border-top btn-block position-relative text-center" href="../assets/vue/logout.php" role="button">
                                                        Logout
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-page">
            <div class="container">
                <div class="row">
                    <div class="profile-nav col-md-3">
                        <div class="panel">
                            <div class="user-heading round">
                                <a href="#">
                                    <img src="../assets/images/<?php echo $_SESSION['profile'] ?>" alt="">
                                </a>
                                <h1>{{u.fullname}}</h1>
                                <p>{{u.email}}</p>
                            </div>

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active"><a href="#"  @click="getUser(u.user_id)" data-toggle="modal" data-target="#updateModal"> <i class="fa fa-user"></i>Profile</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="profile-info col-md-9">
                        <div class="panel">
                            <div class="panel-body bio-graph-info">
                                <h1>Bio Graph</h1>
                                <div class="row">
                                    <div class="bio-row">
                                        <p><span>First Name </span>: {{u.fullname}}</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Email </span>: {{u.email}}</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Country </span>: Australia</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Birthday</span>: 13 July 1983</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Gender </span>: Male</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Date Joined</span>: {{dateToString(u.created)}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="bio-chart">
                                                <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="123" data-fgcolor="#e06b7d" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(224, 107, 125); padding: 0px; -webkit-appearance: none; background: none;"></div>
                                            </div>
                                            <div class="bio-desk">
                                                <h4 class="red">Total Vehicle</h4>
                                                <p>Started : {{theLocaleString(u.created)}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="bio-chart">
                                                <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="63" data-fgcolor="#4CC5CD" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(76, 197, 205); padding: 0px; -webkit-appearance: none; background: none;"></div>
                                            </div>
                                            <div class="bio-desk">
                                                <h4 class="terques">Total Appointments</h4>
                                                <p>Started : {{theLocaleString(u.created)}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update User Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form" v-for="u of selectedUser">
                                <div class="content create-workform row">
                                    <div class="col-md-12 row">
                                        <div class="form-group col-12">
                                            <label class="form-label" for="schedule-start-date">Profile Picture</label><br>
                                            <i class="fa fa-camera-retro fa-5x" style="cursor: pointer;" aria-hidden="true" onclick="document.getElementById('updateProfile').click()"></i>
                                            <input style="visibility: hidden;" type="file" name="profile" id="updateProfile" required />
                                        </div>
                                        <div class="form-group col-12">
                                            <label class="form-label" for="schedule-start-date">Fullname</label>
                                            <input class="form-control col-12" type="text" :value="u.fullname" id="updateFullname" required />
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                            <button class="btn btn-primary mr-4" data-dismiss="modal" id="cancels">Cancel</button>
                                            <button class="btn btn-outline-primary" type="submit" @click="updateUser(u.user_id)" onclick="document.getElementById('cancels').click()">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form">
                                <div class="content create-workform row">
                                    <div class="col-md-12 row">
                                        <div class="form-group col-12">
                                            <label class="form-label" for="schedule-start-date">Old Password</label>
                                            <input class="form-control col-12" type="password" id="oldPassword" required />
                                        </div>
                                        <div class="form-group col-12">
                                            <label class="form-label" for="schedule-start-date">New Password</label>
                                            <input class="form-control col-12" type="password" id="newPassword" required />
                                        </div>
                                        <div class="form-group col-12">
                                            <label class="form-label" for="schedule-start-date">Retype New Password</label>
                                            <input class="form-control col-12" type="password" id="renewPassword" required />
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                            <button class="btn btn-primary mr-4" data-dismiss="modal" id="cancels">Cancel</button>
                                            <button class="btn btn-outline-primary" type="submit" @click="changePassword" onclick="document.getElementById('cancels').click()">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="iq-footer">
            <div class="container-fluid container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="../backend/privacy-policy.html">Privacy Policy</a></li>
                            <li class="list-inline-item"><a href="../backend/terms-of-service.html">Terms of Use</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 text-right">
                        Copyright 2021 <a href="#">Calendify</a> All Rights Reserved.
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="../assets/js/backend-bundle.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="../assets/vue/axios.js"></script>
    <script src="../assets/vue/app.js"></script>
    <script src="../assets/vue/customer.js"></script>
</body>

</html> -->