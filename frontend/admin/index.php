<!doctype html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Emission</title>
    <!-- <link rel="stylesheet" href="../../assets/css/backend-plugin.min.css"> -->
    <link rel="stylesheet" href="../../assets/assets/css/style2.css">
    <link rel="stylesheet" href="../../assets/assets/css/admina.css">
    <!-- <link rel="stylesheet" href="../../assets/css/backend.css?v=1.0.1"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendor/remixicon/fonts/remixicon.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    
</head>

<body class="fixed-top-navbar top-nav">
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <div class="wrapper" id="admin-vue">
        <?php include('navbar.php'); ?>
        <div class="container-fluid page-body-wrapper">
            <?php include('sidebar.php'); ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">Welcome <?php echo $_SESSION['fullname'] ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin transparent">
                            <div class="row">
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card card-tale">
                                        <div class="card-body">
                                            <p class="mb-4">Total User Joined</p>
                                            <p class="fs-30 mb-2">{{totalUserJoined}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Total User Active</p>
                                            <p class="fs-30 mb-2">{{totalUserActive}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card card-light-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Total Appointments Pending</p>
                                            <p class="fs-30 mb-2">{{totalAppointJoined}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-4 stretch-card transparent">
                                    <div class="card card-light-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Total Appointments Scheduled</p>
                                            <p class="fs-30 mb-2">{{totalAppointActive}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 stretch-card grid-margin">
                            <div class="card p-4">
                                <canvas id="doughnutChart"></canvas>
                            </div>
                        </div>
                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">Recent Users</p>
                                    <ul class="icon-data-list">
                                        <li v-for="r of recentUsers">
                                            <div class="d-flex">
                                                <img :src="'../../assets/images/' + r.profile" alt="user">
                                                <div>
                                                    <p class="text-info mb-1">{{r.fullname}}</p>
                                                    <p class="mb-0">{{r.email}}</p>
                                                    <small>{{dateToString(r.created)}}</small>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">Recent Appointment</p>
                                    <ul class="icon-data-list">
                                        <li>
                                            <div class="d-flex">
                                                <img src="../../assets/images/logo.jpg" alt="user">
                                                <div>
                                                    <p class="text-info mb-1">Isabella Becker</p>
                                                    <p class="mb-0">Sales dashboard have been created</p>
                                                    <small>9:30 am</small>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="iq-top-navbar">
            <div class="container">
                <div class="iq-navbar-custom">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                            <i class="ri-menu-line wrapper-menu"></i>
                            <a href="index.php" class="header-logo">
                                <img src="../../assets/images/logo.jpg" class="img-fluid rounded-normal light-logo" alt="logo">
                            </a>
                        </div>
                        <div class="iq-menu-horizontal">
                            <nav class="iq-sidebar-menu">
                                <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
                                    <a href="index.php" class="header-logo">
                                        <img src="../../assets/images/logo.jpg" class="img-fluid rounded-normal" alt="logo">
                                    </a>
                                    <div class="iq-menu-bt-sidebar">
                                        <i class="las la-bars wrapper-menu"></i>
                                    </div>
                                </div>
                                <ul id="iq-sidebar-toggle" class="iq-menu d-flex">
                                    <li class="active">
                                        <a href="index.php" class="">
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="schedule.php" class="">
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
                                            <img src="../../assets/images/<?php echo $_SESSION['profile'] ?>" class="avatar-40 img-fluid rounded" alt="user">
                                            <div class="caption ml-3">
                                                <h6 class="mb-0 line-height"><?php echo $_SESSION['fullname'] ?></h6>
                                            </div>
                                        </a>
                                        <div class="iq-sub-dropdown dropdown-menu user-dropdown" aria-labelledby="dropdownMenuButton3">
                                            <a class="right-ic p-3 border-top btn-block position-relative text-center" href="../../assets/vue/logout.php" role="button">
                                                Logout
                                            </a>
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
            <div class="content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="navbar-breadcrumb">
                                    <h1 class="mb-1">My Dashboard</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-8">
                            <ul class="d-flex nav nav-pills mb-4 text-center event-tab" id="event-pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a id="view-btn" class="nav-link active show" data-toggle="pill" href="#eventU" data-extra="#search-with-button" role="tab" aria-selected="true">Users</a>
                                </li>
                                <li class="nav-item">
                                    <a id="view-btn" class="nav-link show" data-toggle="pill" href="#requested" data-extra="#search-with-button" role="tab" aria-selected="true">Appoint Request</a>
                                </li>
                                <li class="nav-item">
                                    <a id="view-schedule" class="nav-link" data-toggle="pill" href="#event2" data-extra="#view-event" role="tab" aria-selected="false">Schedule Card</a>
                                </li>
                                <li class="nav-item">
                                    <a id="view-schedule" class="nav-link" data-toggle="pill" href="#event3" data-extra="#view-event" role="tab" aria-selected="false">Events Card</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-md-4 tab-extra" id="view-event">
                            <div class="float-md-right mb-4"><a href="#event1" class="btn view-btn">View Event</a></div>
                        </div>
                    </div>
                    <div class="tab-extra active" id="search-with-button">
                        <div class="iq-search-bar d-flex flex-wrap align-items-center search-device mb-4 pr-3">
                            <input class="form-control bg-white border text search-input " type="text" v-model="searchFromAUsers" placeholder="Search Users Name or Email">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="event-content">
                            <div id="eventU" class="tab-pane active fade show">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6" v-for="u of searchFromUsers">
                                        <div class="card card-block card-stretch card-height">
                                            <div :class="u.status == 1 ? 'card-body rounded event-detail event-detail-primary' : 'card-body rounded event-detail event-detail-danger'">
                                                <div class="d-flex align-items-top justify-content-between">
                                                    <div>
                                                        <div class="">
                                                            <img :src="'../../assets/images/'+u.profile" class="rounded float-center" alt="" width="100">
                                                        </div>
                                                        <h4 class="my-2 mr-4">Full Name: {{u.fullname}}</h4>
                                                        <p class="mb-2 text-danger font-weight-500 text-capitalize">Email: {{u.email}}</p>
                                                        <p class="mb-2 text-danger font-weight-500 text-capitalize">Role: {{u.role == 1 ? 'User' : 'Admin'}}</p>
                                                        <p class="mb-2 text-danger font-weight-500 text-capitalize">Status: {{u.status == 1 ? 'Unrestrict' : 'Restrict'}}</p>
                                                        <p class="mb-2 text-danger font-weight-500 text-capitalize">User Join at <br>{{dateToString(u.created)}}</p>
                                                    </div>
                                                    <small>
                                                        <a href="#" class="search-toggle btn position-relative" id="dropdownMenuButtonSettingsUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-cog" aria-hidden="true"></i>
                                                        </a>
                                                        <div class="iq-sub-dropdown dropdown-menu user-dropdown" aria-labelledby="dropdownMenuButtonSettingsUser">
                                                            <div class="card m-0">
                                                                <div class="card-body p-0">
                                                                    <div class="p-2">
                                                                        <div class="media align-items-center">
                                                                            <button class="btn btn-sm col-12" @click="selectedUser(u.user_id)" data-toggle="modal" data-target="#updateUser">Unrestrict / Restrict User</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="updateUser" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="popup text-left" v-for="u of selectedUseriD">
                                                        <h4 class="mb-3">Set Schedule</h4>
                                                        <div class="form">
                                                            <div class="content create-workform row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="schedule-start-date">
                                                                            Do you want to {{u.status == 1 ? "Restrict User" : "Unrestrict User"}} {{u.fullname}}?
                                                                        </label>
                                                                        <select name="banUser" v-model="selecteToUpdate" id="banUser" class="form-control">
                                                                            <option value="0">Select</option>
                                                                            <option :value="u.status == 1 ? 2 : 1">{{u.status == 1 ? "Restrict User" : "Unrestrict User"}}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mt-4">
                                                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                                                        <button class="btn btn-primary mr-4" data-dismiss="modal">Cancel</button>
                                                                        <button class="btn btn-outline-primary" type="button" @click="updateUserAdmin(u.user_id)">Save</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="date-event" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="popup text-left">
                                                    <h4 class="mb-3">Add Schedule</h4>
                                                    <form action="/" id="submit-schedule">
                                                        <div class="content create-workform row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="schedule-title">Schedule For</label>
                                                                    <input class="form-control" placeholder="Enter Title" type="text" name="title" id="schedule-title" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="schedule-start-date">Start Date</label>
                                                                    <input class="form-control basicFlatpickr date-input" placeholder="2020-06-20" type="text" name="title" id="schedule-start-date" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="schedule-end-date">End Date</label>
                                                                    <input class="form-control basicFlatpickr date-input" placeholder="2020-06-20" type="text" name="title" id="schedule-end-date" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input class="form-control" type="color" name="title" id="schedule-color" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 mt-4">
                                                                <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                                                    <button class="btn btn-primary mr-4" data-dismiss="modal">Cancel</button>
                                                                    <button class="btn btn-outline-primary" type="submit">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="requested" class="tab-pane fade">
                                <button class="mb-2 btn btn-md btn-info" @click="confirmselectedappointment">Approve selected</button>
                                <button class="mb-2 btn btn-md btn-info" @click="approveAll">Approve All</button>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6" v-for="ap of searchFromAppointment">
                                        <div class="card card-block card-stretch card-height">
                                            <div :class="ap.stats == 0 ? 'card-body rounded event-detail event-detail-danger' : 'card-body rounded event-detail event-detail-primary'">
                                                <div class="d-flex align-items-top justify-content-between">
                                                    <div class="row">
                                                        <div class="form-group col-12">
                                                            <input type="checkbox" name="selected" v-model="selectedAppointment" id="selected" :value="ap.appointId">
                                                            <label>Select</label>
                                                        </div>
                                                        <h4 class="col-12 mb-2 mr-4 text-capitalize">Full Name: {{ap.fullname}}</h4>
                                                        <p class="col-12 mb-2 text-danger fw-light text-capitalize">Email: {{ap.email}}</p>
                                                        <div class="col-6"><span class="text-dark font-weight-500">O.R Number: <br></span><small>{{ap.orNumber}}</small></div>
                                                        <div class="col-6"><span class="text-dark font-weight-500">Wheels: <br></span><small>{{ap.wheel}}</small></div>
                                                        <div class="col-6"><span class="text-dark font-weight-500">Series Model: <br></span><small>{{ap.seriesModel}}</small></div>
                                                        <div class="col-6"><span class="text-dark font-weight-500">Year Model: <br></span><small>{{ap.yearModel}}</small></div>
                                                        <div class="col-12"><span class="text-dark font-weight-500">Request Date <br></span><small>{{dateToString(ap.created_at)}}</small></div>
                                                        <div class="col-12"><button class="mb-2 btn btn-md btn-info float-right" @click="approveAppointment(ap.appointId, ap.email)">Approve</button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="restrictUser" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="popup text-left">
                                                        <h4 class="mb-3">Set Schedule</h4>
                                                        <form action="/" id="submit-schedule">
                                                            <div class="content create-workform row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="schedule-start-date">Restrict User</label>
                                                                        <select name="banUser" id="banUser" class="form-control">
                                                                            <option value="1">Unrestrict</option>
                                                                            <option value="2">Restrict</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mt-4">
                                                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                                                        <button class="btn btn-primary mr-4" data-dismiss="modal">Cancel</button>
                                                                        <button class="btn btn-outline-primary" type="submit">Save</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="date-event" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="popup text-left">
                                                    <h4 class="mb-3">Add Schedule</h4>
                                                    <form action="/" id="submit-schedule">
                                                        <div class="content create-workform row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="schedule-title">Schedule For</label>
                                                                    <input class="form-control" placeholder="Enter Title" type="text" name="title" id="schedule-title" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="schedule-start-date">Start Date</label>
                                                                    <input class="form-control basicFlatpickr date-input" placeholder="2020-06-20" type="text" name="title" id="schedule-start-date" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="schedule-end-date">End Date</label>
                                                                    <input class="form-control basicFlatpickr date-input" placeholder="2020-06-20" type="text" name="title" id="schedule-end-date" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input class="form-control" type="color" name="title" id="schedule-color" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 mt-4">
                                                                <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                                                    <button class="btn btn-primary mr-4" data-dismiss="modal">Cancel</button>
                                                                    <button class="btn btn-outline-primary" type="submit">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="event2" class="tab-pane fade">
                                <div class="schedule-content">
                                    <div id="schedule1" class="tab-pane fade active show">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6" v-for="app of appointments">
                                                <div class="card card-block card-stretch card-height">
                                                    <div class="card-body rounded event-detail event-detail-info">
                                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                                            <div>
                                                                <h1 class="text-info">{{getDate(app.appointmentDate)}}</h1>
                                                                <h5 class="text-info">{{theLocaleString(app.appointmentDate)}}</h5>
                                                            </div>
                                                        </div>
                                                        <h6 class="my-2 text-capitalize"><i class="fa fa-user" aria-hidden="true"></i> {{app.fullname}} <br> <i class="fa fa-envelope-o" aria-hidden="true"></i> {{app.email}}</h6>
                                                        <p class="mb-3 card-description">{{app.message}}</p>
                                                        <p class="mb-2 text-info"><i class="las la-clock mr-3"></i>{{getTheHours(app.appointmentDate)}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="event3" class="tab-pane fade">
                                <div class="schedule-content">
                                    <div id="schedule1" class="tab-pane fade active show">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6" v-for="eve of events">
                                                <div class="card card-block card-stretch card-height">
                                                    <div class="card-body rounded event-detail event-detail-info">
                                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                                            <div>
                                                                <h1 class="text-info">{{getDate(eve.event_date)}}</h1>
                                                                <h5 class="text-info">{{theLocaleString(eve.event_date)}}</h5>
                                                            </div>
                                                        </div>
                                                        <h2 class="my-2 text-capitalize font-weight-bold"></i>{{eve.event_title}}</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  -->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="popup text-left" id="popup">
                        <h4 class="mb-3">Add Action</h4>
                        <div class="content create-workform">
                            <div class="form-group">
                                <h6 class="form-label mb-3">Copy Your Link</h6>
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly value="calendly.com/rickoshea1234">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"><i class="las la-link"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <h6 class="form-label mb-3">Email Your Link</h6>
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly value="calendly.com/rickoshea1234">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon3"><i class="las la-envelope"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <h6 class="form-label mb-3">Add to Your Website</h6>
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly value="calendly.com/rickoshea1234">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon4"><i class="las la-code"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                    <button type="submit" data-dismiss="modal" class="btn btn-primary mr-4">Cancel</button>
                                    <button type="submit" data-dismiss="modal" class="btn btn-outline-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/admin.js"></script>
    <script src="../../assets/vendor/chart.js"></script>
    <script src="../../assets/vue/axios.js"></script>
    <script src="../../assets/vue/app.js"></script>
    <script src="../../assets/vue/admin.js"></script>
</body>

</html>