<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registration Account</title>

    <link rel="stylesheet" href="assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="assets/css/backend.css">
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
                            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                                <div class="brand-logo">
                                    <a href="index.php">
                                        <img src="assets/images/logo.jpg" alt="logo" width="100">
                                    </a>
                                </div>
                                <h4>New here?</h4>
                                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                                <form class="pt-3">
                                    <div class="form-group">
                                        <input class="form-control" v-model="fullname" type="text" placeholder="First Name" required />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" v-model="lastname" type="text" placeholder="Last Name" required />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" v-model="email" type="text" placeholder="Email" required />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="password" v-model="password" placeholder="Password" required />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="password" v-model="confirmPassword" placeholder="Confirm Password" required />
                                    </div>
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <label class="form-check-label text-muted">
                                                <input type="checkbox" v-model="checked" class="form-check-input">
                                                I agree to all Terms & Conditions
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <button type="button" @click="register" :class="checked ? 'btn btn-primary' : 'btn btn-primary disabled' ">Sign Up</button>
                                    </div>
                                    <div class="text-center mt-4 font-weight-light">
                                        Already have an account? <a href="login.php" class="text-primary">Login</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- <section class="login-content">
            <div class="container h-100">
                <div class="row justify-content-center align-items-center height-self-center">
                    <div class="col-md-5 col-sm-12 col-12 align-self-center">
                        <div class="card">
                            <div class="card-body text-center">
                                <h2>Sign Up</h2>
                                <p>Create your emission account.</p>
                                <div class="form">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="floating-input form-group">
                                                <input class="form-control" v-model="fullname" type="text" required />
                                                <label class="form-label" for="fullname">Full Name</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="floating-input form-group">
                                                <input class="form-control" v-model="lastname" type="text" required />
                                                <label class="form-label" for="lastname">Last Name</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="floating-input form-group">
                                                <input class="form-control" v-model="email" type="text" required />
                                                <label class="form-label" for="email">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="floating-input form-group">
                                                <input class="form-control" type="password" v-model="password" required />
                                                <label class="form-label" for="password">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="floating-input form-group">
                                                <input class="form-control" type="password" v-model="confirmPassword" required />
                                                <label class="form-label" for="password1">Confirm Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" @click="register" class="btn btn-primary">Sign Up</button>
                                    <p class="mt-3">
                                        Already have an Account <a href="login.php" class="text-primary">Sign In</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
    </div>
    <script src="assets/js/backend-bundle.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/vue/axios.js"></script>
    <script src="assets/vue/app.js"></script>
    <script src="assets/vue/authentication.js"></script>

</body>

</html>