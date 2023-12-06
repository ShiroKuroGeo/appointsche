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
                                    <h3 class="font-weight-bold">Welcome to Users</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body p-5">
                                    <h4 class="card-title">Users Table</h4>
                                    <p class="card-description">
                                        <input type="search" class="form-control form-control-sm col-3" v-model="searchFromAUsers" placeholder="Enter name of user">
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>User</th>
                                                    <th>First name</th>
                                                    <th>Email</th>
                                                    <th>Date Joined</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="u of searchFromUsers">
                                                    <td class="py-1"><img :src="'../../assets/images/' + u.profile" alt="image" /></td>
                                                    <td>{{u.fullname}}</td>
                                                    <td>{{u.email}}</td>
                                                    <td>{{dateToString(u.created)}}</td>
                                                    <td><label :class="u.status == 1 ? 'badge badge-primary px-5' : 'badge badge-danger px-5'">{{u.status == 1 ? 'Active' : 'Banned'}}</label></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-info" @click="selectedUser(u.user_id)" data-toggle="modal" data-target="#updateUser">Change Status</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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