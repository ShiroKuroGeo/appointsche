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
                    <li class="nav-item me-3 active">
                        <a class="nav-link active" href="index.php">
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
    <main class="pt-5 bg-light" id="customer-vue">
        <section class="py-lg-12">
            <div class="hero-img py-5">
                <div class="container px-4 px-lg-0 ">
                    <div class="row align-items-center">
                        <div class=" col-xl-5 col-md-12 py-6 py-xl-0">
                            <div class="mb-4 text-center text-xl-start px-md-8 px-lg-19 px-xl-0">
                                <h1 class="display-3 fw-bold mb-3 ls-sm pt-4">
                                    <span class="text-primary text-capitalize">emissions </span><span>Vehicle inspection</span>
                                </h1>
                                <p class="mb-6 lead pe-lg-6">
                                    A smog check is a vehicle emissions inspection that tests a car’s exhaust system to ensure it meets specific environmental standards. This test is required in some states, but not all. Pollution can contribute to respiratory problems and other health concerns.
                                </p>
                            </div>
                            <button type="button" class="btn btn-dark col-7" data-bs-toggle="modal" data-bs-target="#date-event">Send Appointment</button>
                        </div>
                        <div class="offset-xl-1 col-xl-6 col-md-12 d-flex justify-content-end ">
                            <div class="">
                                <img src="../assets/images/emission.jpg" width="700" class="img-fluid rounded-3 smooth-shadow-md" alt="">
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="date-event" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body col-12">
                                        <div class="modal-body">
                                            <div class="popup text-left">
                                                <h4 class="mb-3">Request Appointment</h4>
                                                <div class="form">
                                                    <div class="content create-workform row">
                                                        <div class="col-12 row">
                                                            <div class="form-group col-6">
                                                                <label class="form-label" for="schedule-title">Fullname</label>
                                                                <input class="form-control" type="text" v-model="fullname" />
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <label class="form-label" for="schedule-title">Email</label>
                                                                <input class="form-control" type="email" v-model="email" />
                                                            </div>
                                                        </div>
                                                        <div class="col-12 row">
                                                            <div class="form-group col-6">
                                                                <label class="form-label" for="schedule-title">OR Number</label>
                                                                <input class="form-control" type="text" v-model="ORNumber" />
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <label class="form-label" for="schedule-title">Certificate of Registration</label>
                                                                <input class="form-control" type="text" v-model="Certificate" />
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <label class="form-label" for="schedule-title">wheel</label>
                                                                <input class="form-control" type="text" v-model="wheel" />
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <label class="form-label" for="schedule-title">Engine Number</label>
                                                                <input class="form-control" type="text" v-model="engineNumber" />
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <label class="form-label" for="schedule-title">Series Model</label>
                                                                <input class="form-control" type="text" v-model="seriesModel" />
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <label class="form-label" for="schedule-title">Year Model</label>
                                                                <input class="form-control" type="text" v-model="yearModel" />
                                                            </div>
                                                            <div class="form-group col-6">
                                                                <label class="form-label" for="schedule-title">Year Model</label>
                                                                <input class="form-control col-12" type="datetime-local" v-model="dateAppointment" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-outline-primary" @click="sendAppointment" onclick="document.getElementById('cancel').click()">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-lg-12 my-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="d-flex">
                            <div class="icon-shape icon-sm bg-light-primary p-4 rounded-3 text-primary text-center">
                                <i class="fa fa-check-circle-o fa-2x"></i>
                            </div>
                            <div class="mb-4 ms-4">
                                <h3 class="mb-2 h4 fw-semibold text-capitalize">smog check</h3>
                                <p class="mb-0">A smog check is a vehicle emissions inspection that tests a car’s exhaust system to ensure it meets specific environmental standards.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="d-flex">
                            <div class="icon-shape icon-sm bg-light-primary p-4 rounded-3 text-primary">
                                <i class="fa fa-car fa-2x"></i>
                            </div>
                            <div class="mb-4 ms-4">
                                <h3 class="mb-2 h4 fw-semibold text-capitalize">Electric cars</h3>
                                <p class="mb-0">Electric cars are always exempt from smog tests since they do not produce tailpipe emissions.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="d-flex">
                            <div class="icon-shape icon-sm bg-light-primary p-4 rounded-3 text-primary">
                                <i class="fa fa-credit-card-alt fa-2x"></i>
                            </div>
                            <div class="mb-4 ms-4">
                                <h3 class="mb-2 h4 fw-semibold text-capitalize">price</h3>
                                <p class="mb-0">The price of a vehicle inspection can vary depending on the state and the type of inspection.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pb-lg-18">
            <div class="container px-4 px-lg-0">
                <div class="bg-light rounded-3 py-14 px-4 px-xl-0">
                    <div class="row">
                        <div class="offset-xl-2 col-xl-8 col-md-12 col-12 py-5">
                            <div class="text-center mb-8">
                                <h1 class="display-5 mb-3 fw-bold">Emission Test</h1>
                                <p class="lead px-xl-8">Let’s start by understanding the purpose of car inspections. In short, many states implemented these regulations to ensure that vehicles stay safe to drive and meet certain environmental standards. As cars age, they can develop safety hazards and become more polluting.</p>
                            </div>
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