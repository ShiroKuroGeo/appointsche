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
    <link rel="stylesheet" href="../../assets/assets/css/admin.css">
    <!-- <link rel="stylesheet" href="../../assets/css/backend.css?v=1.0.1"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendor/remixicon/fonts/remixicon.css">
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
                                <div class="col-12 col-xl-8">
                                    <h3 class="font-weight-bold">Welcome To Appointments</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title my-4">Appointments List</h4>
                                            <div class="d-flex justify-content-between align-items-between">
                                                <input type="search" class="form-control form-control-sm col-3" v-model="searchFromAUsers" placeholder="Search for users">
                                                <h4 class="card-title" v-if="selectedAppointments.length <= 1">
                                                    <button class="mb-2 px-4 py-2 btn btn-sm btn-info" @click="approveAll">Approve</button>
                                                </h4>
                                                <h4 class="card-title" v-if="selectedAppointments.length > 1">
                                                    <button class="mb-2 px-4 py-2 btn btn-sm btn-info" @click="approveAllIds">Approve All</button>
                                                </h4>
                                            </div>
                                            <div class="table-responsive" style="width: 100%;">
                                                <table class="table table-hover table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Number</th>
                                                            <th>Full Name</th>
                                                            <th>Email</th>
                                                            <th>Wheels</th>
                                                            <th>Series Model</th>
                                                            <th>Year Model</th>
                                                            <th>O.R Number</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="(ap, index) of searchFromAppointment">
                                                            <td><input type="checkbox" name="selected" v-model="selectedAppointments" id="selected" :value="ap.appointId" :disabled="ap.stats == 1">{{1 + index++}}</td>
                                                            <td>{{ap.fullname}}</td>
                                                            <td>{{ap.email}}</td>
                                                            <td>{{ap.wheel}}</td>
                                                            <td>{{ap.seriesModel}}</td>
                                                            <td>{{ap.yearModel}}</td>
                                                            <td>{{ap.orNumber}}</td>
                                                            <td><label :class="ap.stats == 1 ? 'badge badge-info px-5' : ap.stats == 1 ? 'badge badge-danger px-5' : 'badge badge-warning px-5'">{{ap.stats == 1 ? 'Approved' : ap.stats == 1 ? 'Decline' : 'Pending'}}</label></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-4 col-md-6" >
                                    <div class="card card-block card-stretch card-height">
                                        <div :class="ap.stats == 0 ? 'card-body rounded event-detail event-detail-danger' : 'card-body rounded event-detail event-detail-primary'">
                                            <div class="d-flex align-items-top justify-content-between">
                                                <div class="row">
                                                    <div class="form-group col-12">
                                                        <label>Select</label>
                                                        <input type="checkbox" name="selected" v-model="selectedAppointment" id="selected" :value="ap.appointId">
                                                    </div>
                                                    <h4 class="col-12 mb-2 mr-4 text-capitalize">Full Name: </h4>
                                                    <p class="col-12 mb-2 text-danger fw-light text-capitalize">Email: </p>
                                                    <div class="col-6"><span class="text-dark font-weight-500">O.R Number: <br></span><small>{{ap.orNumber}}</small></div>
                                                    <div class="col-6"><span class="text-dark font-weight-500">Wheels: <br></span><small>{{ap.wheel}}</small></div>
                                                    <div class="col-6"><span class="text-dark font-weight-500">Series Model: <br></span><small>{{ap.seriesModel}}</small></div>
                                                    <div class="col-6"><span class="text-dark font-weight-500">Year Model: <br></span><small>{{ap.yearModel}}</small></div>
                                                    <div class="col-12"><span class="text-dark font-weight-500">Request Date <br></span><small></small></div>
                                                    <div class="col-12"><button class="mb-2 btn btn-md btn-info float-right" @click="approveAppointment(ap.appointId, ap.email)">Approve</button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

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

                        <div class="col-12 d-flex justify-content-center align-items-center" v-if="searchFromAppointment == 0">
                            No Appointment yet!
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="../../assets/vue/axios.js"></script>
    <script src="../../assets/vue/app.js"></script>
    <script src="../../assets/vue/admin.js"></script>
</body>

</html>