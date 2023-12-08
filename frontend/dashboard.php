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
</head>

<body class="bg-white">
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
                    <li class="nav-item me-3 active">
                        <a class="nav-link active" href="dashboard.php">
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
                        <a class="rounded-circle" href="user-profile.php" role="button" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
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
    <main class="bg-light" id="customer-vue">
        <section class="container-fluid p-4">
            <div class="row">
                <div class="col-md-12 col-xl-8 col-12">
                    <div class="row">

                        <div class="col-md-12 mb-4">
                            <!-- card -->
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0">Totals</h4>
                                </div>
                                <!-- card body -->

                                <!-- row -->
                                <div class="row">
                                    <!-- col -->
                                    <div class="col-lg-4 col-md-12 col-12">
                                        <div class="d-flex align-items-center justify-content-between p-4">
                                            <div>
                                                <h2 class="h1 fw-bold mb-0">{{scheduleInACart.length}}</h2>
                                                <p class="mb-0">Total Appointment</p>
                                            </div>
                                            <div class="ms-3">
                                                <div class="icon-shape icon-lg bg-light-primary text-primary rounded-circle">
                                                    <i class="fa fa-calendar fa-2x" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col-lg-4 col-md-12 col-12 border-start-md">
                                        <div class="d-flex align-items-center justify-content-between p-4">
                                            <div>
                                                <h2 class="h1 fw-bold mb-0">{{totalPendingAppoint}}</h2>
                                                <p class="mb-0">Total Pending Appointment</p>
                                            </div>
                                            <div class="ms-3">
                                                <div class="icon-shape icon-lg bg-light-danger text-danger rounded-circle">
                                                    <i class="fa fa-calendar-plus-o fa-2x" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <div class="col-lg-4 col-md-12 col-12 border-start-md">
                                        <div class="d-flex align-items-center justify-content-between p-4">
                                            <div>
                                                <h2 class="h1 fw-bold mb-0">{{allVehicle.length}}</h2>
                                                <p class="mb-0">Total Vehicle Registered</p>
                                            </div>
                                            <div class="ms-3">
                                                <div class="icon-shape icon-lg bg-light-success text-success rounded-circle">
                                                    <i class="fa fa-car fa-2x" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <div class="card">

                                <div class="card-header d-flex justify-content-between align-items-between">
                                    <h4 class="mb-0">Vehicles</h4>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addVehicle">Add Vehicle</button>
                                    <div class="modal fade" id="addVehicle" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addVehicleLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addVehicleLabel">Add Vehicle</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form">
                                                        <div class="content create-workform row">
                                                            <div class="col-md-12 row">
                                                                <div class="form-group col-12">
                                                                    <label class="form-label" for="schedule-start-date">Series Number</label>
                                                                    <input class="form-control col-12" type="text" v-model="Snumber" placeholder="Enter Serial Number" />
                                                                </div>
                                                                <div class="form-group col-12">
                                                                    <label class="form-label" for="schedule-start-date">Model</label>
                                                                    <input class="form-control col-12" type="text" v-model="model" placeholder="Enter A Model" />
                                                                </div>
                                                                <div class="form-group col-12">
                                                                    <label class="form-label" for="schedule-start-date">Year</label>
                                                                    <input class="form-control col-12" type="text" v-model="year" placeholder="Enter A Year" />
                                                                </div>
                                                                <div class="form-group col-12">
                                                                    <label class="form-label" for="schedule-start-date">License Plate Number</label>
                                                                    <input class="form-control col-12" type="text" v-model="licPlaNum" placeholder="Enter License Plate Number" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary px-7 btn-sm" type="submit" @click="storeVehicle" data-bs-dismiss="modal" aria-label="Close">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive" style="height: 385px; overflow-y: scroll">
                                    <table class="table mb-0 text-nowrap table-hover table-centered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Vehicle ID</th>
                                                <th>Series Number</th>
                                                <th>Model</th>
                                                <th>Year</th>
                                                <th>License Plate</th>
                                                <th>Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(v, index) of allVehicle">
                                                <td>
                                                    <h5 class="ms-5">{{ 1 + index++ }}</h5>
                                                </td>
                                                <td>{{v.seriesNumber}}</td>
                                                <td>{{v.model}}</td>
                                                <td>{{v.year}}</td>
                                                <td>{{v.licPlaNum}}</td>
                                                <td>{{theLocaleString(v.created)}}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary" @click="getAllSelectedVehicle(v.vehicle_id)" data-bs-toggle="modal" data-bs-target="#areyousureDelete">Delete</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- Modal -->
                                    <div class="modal fade" id="areyousureDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete This Vehicle</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure want to delete this vehicle?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm rounded btn-primary px-5" @click="deleteVehicle(selectedVehicleId)" data-bs-dismiss="modal" aria-label="Close">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-4 col-12">
                    <!-- card  -->
                    <div class="card mb-4 bg-primary border-primary">
                        <!-- card body  -->
                        <div class="card-body">
                            <h4 class="card-title text-white">Appointment Emission Date</h4>

                            <!-- dropdown  -->
                            <div class="d-flex justify-content-between align-items-center mt-8">
                                <div>
                                    <h1 class="display-6 text-white mb-1">{{dateToString(appointmentDateOnly)}}</h1>
                                </div>
                                <div>
                                    <i class="fe fe-flag fs-1 text-light-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="height: 436px; overflow-y: scroll">
                        <!-- Card header -->
                        <div class="card-header card-header-height d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="mb-0">Recent Appoinment </h4>
                            </div>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- List group -->
                            <ul class="list-group list-group-flush list-timeline-activity">
                                <li class="list-group-item px-0 pt-0 border-0 pb-6" v-for="(sc, index) of scheduleInACart">
                                    <div class="row position-relative">
                                        <div class="col-auto">
                                            <div class="icon-shape icon-md bg-light-primary text-primary rounded-circle">
                                                {{1+index++}}
                                            </div>
                                        </div>
                                        <div class="col ms-n3">
                                            <h4 class="mb-0 h5">{{sc.seriesModel}}</h4>
                                            <p class="mb-0 text-body">{{dateToString(sc.appointmentDate)}}</p>
                                        </div>
                                        <div class="col-auto text-muted">
                                            {{sc.status == 1 ? 'Approved' : sc.status == 0 ? 'Pending' : 'Declined'}}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer pt-8 pb-4 bg-light">
        <div class="container">
            <div class="row ">
                <div class="offset-lg-2 col-lg-8 col-md-12 col-12">
                    <div class="row">

                        <!-- Desc -->
                        <div class="col-md-6 col-12 text-center text-md-start">
                            <span> <span>© <span id="copyright">
                                        <script>
                                            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                                        </script>
                                    </span> Testing. Design and Coded by </span><span class="text-primary">Emission Team</span>
                        </div>
                        <!-- Links -->
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

<script src="../assets/js/popper.js"></script>
<script src="../assets/js/theme.js"></script>
<script src="../assets/vue/axios.js"></script>
<script src="../assets/vue/app.js"></script>
<script src="../assets/vue/customer.js"></script>

</html>