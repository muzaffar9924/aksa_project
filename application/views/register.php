<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <link href="<?= base_url(); ?>assets/img/balloon.png" rel="icon">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />

    <!-- JQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden">

        <style>
            .background-radial-gradient {
                background-color: hsl(218, 41%, 15%);
                background-image: radial-gradient(650px circle at 0% 0%,
                        hsl(218, 41%, 35%) 15%,
                        hsl(218, 41%, 30%) 35%,
                        hsl(218, 41%, 20%) 75%,
                        hsl(218, 41%, 19%) 80%,
                        transparent 100%),
                    radial-gradient(1250px circle at 100% 100%,
                        hsl(218, 41%, 45%) 15%,
                        hsl(218, 41%, 30%) 35%,
                        hsl(218, 41%, 20%) 75%,
                        hsl(218, 41%, 19%) 80%,
                        transparent 100%);

                /* height: 100vh; */
            }

            #radius-shape-1 {
                height: 220px;
                width: 220px;
                top: -60px;
                left: -130px;
                background: radial-gradient(#44006b, #ad1fff);
                overflow: hidden;
            }

            #radius-shape-2 {
                border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
                bottom: -60px;
                right: -110px;
                width: 300px;
                height: 300px;
                background: radial-gradient(#44006b, #ad1fff);
                overflow: hidden;
            }

            .bg-glass {
                background-color: hsla(0, 0%, 100%, 0.9) !important;
                backdrop-filter: saturate(200%) blur(25px);
            }
        </style>

        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">

                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                       AKSA-SDS <br />
                        <span style="color: hsl(218, 81%, 75%)">Project Track</span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                        Access and Manage your Daily Task at your Fingertips.
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form id="adminForm" action="<?= base_url() . 'login/register_data' ?>" method="post">

                                <!-- flashdata -->
                                <?php if ($msg = $this->session->flashdata('user_added')) {

                                    $user_class = $this->session->flashdata('user_class')
                                ?>
                                    <div class='row'>
                                        <div class="col-md-12">
                                            <div class='alert <?= $user_class ?>'>
                                                <?= $msg; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <!-- flashdata -->
                                <h5 id="errorMsg"></h5>

                                <!-- name input -->
                                <div class="form-outline mb-4">
                                    <input type="text" name="e_name" id="name" class="form-control" />
                                    <label class="form-label" for="name">Employee Name</label>
                                </div>

                                <p class="text-danger text-start"><?php echo form_error('name'); ?></p>
                                <!-- mobile input -->
                                <div class="form-outline mb-4">
                                    <input type="text" name="mobile" id="mobile" class="form-control" />
                                    <label class="form-label" for="mobile">Employee mobile</label>
                                </div>
                                <!-- <p class="text-danger text-start" id="mobile_error"></p> -->
                                <p class="text-danger text-start"><?php echo form_error('mobile'); ?></p>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="text" name="username" id="username" class="form-control" />
                                    <label class="form-label" for="username">Username</label>
                                </div>
                                <p class="text-danger text-start"><?php echo form_error('Username'); ?></p>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" class="form-control" />
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <!-- <p class="text-danger text-start" id="password_error"></p> -->
                                <p class="text-danger text-start"><?php echo form_error('password'); ?></p>


                                <!-- Submit button -->
                                <button type="submit" class="btn btn-success btn-block mb-4" id="adminLoginButton">
                                    Sign up
                                </button>
                                <a href='<?= base_url('login') ?>' class='float-end'>Login</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
</body>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>
<script src="js/custom.js"></script>

</html>