<!doctype html>
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
    <style>
        body {
            color: #797979;
            background: #f1f2f7;
            font-family: 'Open Sans', sans-serif;
            padding: 0px !important;
            margin: 0px !important;
            font-size: 13px;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: antialiased;
        }

        .profile-nav,
        .profile-info {
            margin-top: 30px;
        }

        .profile-nav .user-heading {
            background: #fbc02d;
            color: #fff;
            border-radius: 4px 4px 0 0;
            -webkit-border-radius: 4px 4px 0 0;
            padding: 30px;
            text-align: center;
        }

        .profile-nav .user-heading.round a {
            border-radius: 50%;
            -webkit-border-radius: 50%;
            border: 10px solid rgba(255, 255, 255, 0.3);
            display: inline-block;
        }

        .profile-nav .user-heading a img {
            width: 112px;
            height: 112px;
            border-radius: 50%;
            -webkit-border-radius: 50%;
        }

        .profile-nav .user-heading h1 {
            font-size: 22px;
            font-weight: 300;
            margin-bottom: 5px;
        }

        .profile-nav .user-heading p {
            font-size: 12px;
        }

        .profile-nav ul {
            margin-top: 1px;
        }

        .profile-nav ul>li {
            border-bottom: 1px solid #ebeae6;
            margin-top: 0;
            line-height: 30px;
        }

        .profile-nav ul>li:last-child {
            border-bottom: none;
        }

        .profile-nav ul>li>a {
            border-radius: 0;
            -webkit-border-radius: 0;
            color: #89817f;
            border-left: 5px solid #fff;
        }

        .profile-nav ul>li>a:hover,
        .profile-nav ul>li>a:focus,
        .profile-nav ul li.active a {
            background: #f8f7f5 !important;
            border-left: 5px solid #fbc02d;
            color: #89817f !important;
        }

        .profile-nav ul>li:last-child>a:last-child {
            border-radius: 0 0 4px 4px;
            -webkit-border-radius: 0 0 4px 4px;
        }

        .profile-nav ul>li>a>i {
            font-size: 16px;
            padding-right: 10px;
            color: #bcb3aa;
        }

        .r-activity {
            margin: 6px 0 0;
            font-size: 12px;
        }


        .p-text-area,
        .p-text-area:focus {
            border: none;
            font-weight: 300;
            box-shadow: none;
            color: #c3c3c3;
            font-size: 16px;
        }

        .profile-info .panel-footer {
            background-color: #f8f7f5;
            border-top: 1px solid #e7ebee;
        }

        .profile-info .panel-footer ul li a {
            color: #7a7a7a;
        }

        .bio-graph-heading {
            background: #fbc02d;
            color: #fff;
            text-align: center;
            font-style: italic;
            padding: 40px 110px;
            border-radius: 4px 4px 0 0;
            -webkit-border-radius: 4px 4px 0 0;
            font-size: 16px;
            font-weight: 300;
        }

        .bio-graph-info {
            color: #89817e;
        }

        .bio-graph-info h1 {
            font-size: 22px;
            font-weight: 300;
            margin: 0 0 20px;
        }

        .bio-row {
            width: 50%;
            float: left;
            margin-bottom: 10px;
            padding: 0 15px;
        }

        .bio-row p span {
            width: 100px;
            display: inline-block;
        }

        .bio-chart,
        .bio-desk {
            float: left;
        }

        .bio-chart {
            width: 40%;
        }

        .bio-desk {
            width: 60%;
        }

        .bio-desk h4 {
            font-size: 15px;
            font-weight: 400;
        }

        .bio-desk h4.terques {
            color: #4CC5CD;
        }

        .bio-desk h4.red {
            color: #e26b7f;
        }

        .bio-desk h4.green {
            color: #97be4b;
        }

        .bio-desk h4.purple {
            color: #caa3da;
        }

        .file-pos {
            margin: 6px 0 10px 0;
        }

        .profile-activity h5 {
            font-weight: 300;
            margin-top: 0;
            color: #c3c3c3;
        }

        .summary-head {
            background: #ee7272;
            color: #fff;
            text-align: center;
            border-bottom: 1px solid #ee7272;
        }

        .summary-head h4 {
            font-weight: 300;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .summary-head p {
            color: rgba(255, 255, 255, 0.6);
        }

        ul.summary-list {
            display: inline-block;
            padding-left: 0;
            width: 100%;
            margin-bottom: 0;
        }

        ul.summary-list>li {
            display: inline-block;
            width: 19.5%;
            text-align: center;
        }

        ul.summary-list>li>a>i {
            display: block;
            font-size: 18px;
            padding-bottom: 5px;
        }

        ul.summary-list>li>a {
            padding: 10px 0;
            display: inline-block;
            color: #818181;
        }

        ul.summary-list>li {
            border-right: 1px solid #eaeaea;
        }

        ul.summary-list>li:last-child {
            border-right: none;
        }

        .activity {
            width: 100%;
            float: left;
            margin-bottom: 10px;
        }

        .activity.alt {
            width: 100%;
            float: right;
            margin-bottom: 10px;
        }

        .activity span {
            float: left;
        }

        .activity.alt span {
            float: right;
        }

        .activity span,
        .activity.alt span {
            width: 45px;
            height: 45px;
            line-height: 45px;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            background: #eee;
            text-align: center;
            color: #fff;
            font-size: 16px;
        }

        .activity.terques span {
            background: #8dd7d6;
        }

        .activity.terques h4 {
            color: #8dd7d6;
        }

        .activity.purple span {
            background: #b984dc;
        }

        .activity.purple h4 {
            color: #b984dc;
        }

        .activity.blue span {
            background: #90b4e6;
        }

        .activity.blue h4 {
            color: #90b4e6;
        }

        .activity.green span {
            background: #aec785;
        }

        .activity.green h4 {
            color: #aec785;
        }

        .activity h4 {
            margin-top: 0;
            font-size: 16px;
        }

        .activity p {
            margin-bottom: 0;
            font-size: 13px;
        }

        .activity .activity-desk i,
        .activity.alt .activity-desk i {
            float: left;
            font-size: 18px;
            margin-right: 10px;
            color: #bebebe;
        }

        .activity .activity-desk {
            margin-left: 70px;
            position: relative;
        }

        .activity.alt .activity-desk {
            margin-right: 70px;
            position: relative;
        }

        .activity.alt .activity-desk .panel {
            float: right;
            position: relative;
        }

        .activity-desk .panel {
            background: #F4F4F4;
            display: inline-block;
        }


        .activity .activity-desk .arrow {
            border-right: 8px solid #F4F4F4 !important;
        }

        .activity .activity-desk .arrow {
            border-bottom: 8px solid transparent;
            border-top: 8px solid transparent;
            display: block;
            height: 0;
            left: -7px;
            position: absolute;
            top: 13px;
            width: 0;
        }

        .activity-desk .arrow-alt {
            border-left: 8px solid #F4F4F4 !important;
        }

        .activity-desk .arrow-alt {
            border-bottom: 8px solid transparent;
            border-top: 8px solid transparent;
            display: block;
            height: 0;
            right: -7px;
            position: absolute;
            top: 13px;
            width: 0;
        }

        .activity-desk .album {
            display: inline-block;
            margin-top: 10px;
        }

        .activity-desk .album a {
            margin-right: 10px;
        }

        .activity-desk .album a:last-child {
            margin-right: 0px;
        }
    </style>
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

</html>