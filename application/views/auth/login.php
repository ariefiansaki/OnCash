<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta5
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>OnCash</title>
    <!-- CSS files -->
    <link href="<?php echo base_url(); ?>assets/dist/css/tabler.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/dist/css/demo.min.css" rel="stylesheet" />
</head>

<body class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="text-center mb-4">
                <!-- <a href="." class="navbar-brand navbar-brand-autodark"><img src="<?php echo base_url(); ?>assets/static/logo.svg" height="36" alt=""></a> -->
                <h1>OnCash</h1>
            </div>
            <form class="card card-md" action="<?php echo base_url('auth/ceklogin'); ?>" method="POST" autocomplete="off">
                <div class="card-body">
                    <img src="<?php echo base_url() ?>assets/image/OnCash.png" width="500" height="250">
                    <h2 class="card-title text-center mb-4">Login to your account</h2>
                    <?= $this->session->flashdata('message') ?>
                    <br>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="email">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            Password
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
                            <span class="input-group-text">
                                <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="2" />
                                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                    </svg>
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button name="login" type="submit" class="btn btn-primary w-100">Login</button>
                    </div>
                </div>
                <!-- </form>
            <div class="text-center text-muted mt-3">
                Don't have account yet? <a href="<?php echo base_url(); ?>assets/sign-up.html" tabindex="-1">Sign up</a>
            </div> -->
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?php echo base_url(); ?>assets/dist/js/tabler.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.min.js"></script>
</body>

</html>