<?php
include '../../function/getData.php';
$conn = require_once("../../connection/connection.php");
session_start();

if ($_SESSION["login"] === null) {
    header("location: login.php");
}

$result = $conn->prepare("select * from admin where email=?");
$result->bindParam(1, $_SESSION['email']);
$result->execute();
$admin_profile = $result->fetchAll();

?>

<!DOCTYPE html>

<html
        lang="en"
        class="light-style layout-menu-fixed"
        dir="ltr"
        data-theme="theme-default"
        data-assets-path="../assets/"
        data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8"/>
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title></title>

    <meta name="description" content=""/>

    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico"/>

    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet"
    />

    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css"/>

    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css"/>
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="../assets/css/demo.css"/>

    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"/>

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css"/>


    <script src="../assets/vendor/js/helpers.js"></script>

    <script src="../assets/js/config.js"></script>
</head>

<body>
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme"
               style="box-shadow: none; background-color: #f5f5f9;padding-left: 30px;width: 290px">
            <div class="app-brand demo" style="background-color: #fefeff;
                                        border-radius: 0.375rem; justify-content: center; padding-right: 0;
                                        padding-left: 0;box-shadow: 0 2px 6px 0 rgb(67 89 113 / 12%);">
                <a href="index.php" class="app-brand-link">
                    <span class="app-brand-text demo menu-text fw-bolder"
                          style="text-transform: capitalize">Phone Shop</span>
                </a>
            </div>

            <div style="height: 1.625rem"></div>

            <ul class="menu-inner py-1" style="background-color: #fefeff; border-radius: 0.375rem; max-height: 160px;
                                               justify-content: center;box-shadow: 0 2px 6px 0 rgb(67 89 113 / 12%);">
                <li class="menu-item active">
                    <a href="index.php" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Admin Profile</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="products.php" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-table"></i>
                        <div data-i18n="Basic">Product</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="../../Customer/index.php" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                        <div data-i18n="Basic">Logout</div>
                    </a>
                </li>
            </ul>
        </aside>

        <div class="layout-page" style="padding-left: 18.125rem">
            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center"
                 id="layout-navbar" style="width: fit-content; margin-right: 121px">
                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href=""
                               data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="../../img/profile-picture-1.png" alt
                                         class="w-px-40 h-auto rounded-circle"/>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="../../img/profile-picture-1.png" alt
                                                         class="w-px-40 h-auto rounded-circle"/>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">Admin111</span>
                                                <small class="text-muted">Admin</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="../../Customer/index.php">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="flex-shrink-0 me-3"
                         style="display: flex;margin-bottom: 10px;margin-top: 1px;align-items: center">
                        <img src="../../img/profile-picture-1.png" alt
                             class="rounded-circle" style="height: 150px; width: 150px; border: 10px solid #f5f5f9"/>
                        <div class="card" style="height: fit-content">
                            <div class="card-body" style="display: flex; justify-content: center; align-items: center">
                                <span style="font-size: 20px">Name: <span
                                            style="font-weight: bold; font-size: 30px"><?= $admin_profile[0]['adminName'] ?></span></span>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="divider text-start">
                                <div class="divider-text" style="font-size: 20px">12-12-2022</div>
                                <div style="display: flex;align-items: center">
                                    <h4 style="margin: 0 34px 0 25px">18:00</h4>
                                    <div style="font-size: 1.375rem">Do Something</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
</body>

<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="../assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="../assets/vendor/js/menu.js"></script>

<script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

<script src="../assets/js/main.js"></script>

<script src="../assets/js/dashboards-analytics.js"></script>

</body>
</html>
