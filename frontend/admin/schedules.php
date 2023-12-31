<!doctype html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Emission</title>
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WNGH9RL');
        window.tag_manager_event = 'dashboard-free-preview';
        window.tag_manager_product = 'Calendify';
    </script>
    <!-- <link rel="stylesheet" href="../../assets/css/backend-plugin.min.css"> -->
    <link rel="stylesheet" href="../../assets/assets/css/style2.css">
    <link rel="stylesheet" href="../../assets/assets/css/admin.css">
    <!-- <link rel="stylesheet" href="../../assets/css/backend.css?v=1.0.1"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendor/remixicon/fonts/remixicon.css">
    <link rel='stylesheet' href='../../assets/vendor/fullcalendar/core/main.css' />
    <link rel='stylesheet' href='../../assets/vendor/fullcalendar/daygrid/main.css' />
    <link rel='stylesheet' href='../../assets/vendor/fullcalendar/timegrid/main.css' />
    <link rel='stylesheet' href='../../assets/vendor/fullcalendar/list/main.css' />
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
                                    <h3 class="font-weight-bold">Welcome to Schedules</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button class="btn btn-primary btn-md my-2" data-toggle="modal" data-target="#date-event">Set Events</button>
                                            <div class="card card-block card-stretch">
                                                <div class="card-body">
                                                    <div id="calendar1" class="calendar-s col-12"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="date-event" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="popup text-left">
                                                        <h4 class="mb-3">Add Events</h4>
                                                        <div class="form">
                                                            <div class="content create-workform row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="schedule-title">Schedule Event Title</label>
                                                                        <input class="form-control" placeholder="Enter Title" type="text" v-model="eventTitle" required />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="schedule-start-date">Start Event Date</label>
                                                                        <input class="form-control" type="datetime-local" v-model="eventDate" required />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mt-4">
                                                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                                                        <button class="btn btn-primary mr-4" data-dismiss="modal">Cancel</button>
                                                                        <button class="btn btn-outline-primary" type="button" @click="setEventSchedule">Save</button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src='../../assets/vendor/fullcalendar/core/main.js'></script>
    <script src='../../assets/vendor/fullcalendar/daygrid/main.js'></script>
    <script src='../../assets/vendor/fullcalendar/timegrid/main.js'></script>
    <script src='../../assets/vendor/fullcalendar/list/main.js'></script>
    <script src='../../assets/vendor/fullcalendar/interaction/main.js'></script>
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/admin.js"></script>
    <script src="../../assets/js/app.js"></script>
    <script src="../../assets/vue/axios.js"></script>
    <script src="../../assets/vue/app.js"></script>
    <script src="../../assets/vue/admin.js"></script>
</body>

</html>