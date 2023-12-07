<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forgot Account</title>
    <link rel="stylesheet" href="assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="assets/css/backend.css?v=1.0.1">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/remixicon/fonts/remixicon.css">
</head>

<body class=" ">
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <div class="wrapper" id="authentication-vue">
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-center justify-content-center vh-100 auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-4 mx-auto bg-white rounded shadow">
                            <div class="auth-form-light text-left py-4 px-4 px-sm-5 ">
                                <div class="brand-logo">
                                    <a href="index.php">
                                        <img src="assets/images/logo.jpg" alt="logo" width="100">
                                    </a>
                                </div>
                                <h6 class="fw-light">Enter email to continue.</h6>
                                <form class="pt-3">
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="code" value="<?php echo $_GET['resetToken']?>" style="display: none;" placeholder="Enter Password" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" v-model="password" id="password" placeholder="Enter Password" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" v-model="confirmPassword" id="repassword" placeholder="Enter retype password" />
                                    </div>
                                    <div class="mt-3">
                                        <button type="button" @click="changePassword" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Forgot Password</button>
                                    </div>
                                    <div class="text-center mt-4 fw-light">
                                        Already have an account ? <a href="login.php" class="text-primary">Login</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/backend-bundle.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/vue/axios.js"></script>
    <script src="assets/vue/app.js"></script>
    <script src="assets/vue/authentication.js"></script>
</body>

</html>