<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
<!-- BEGIN: Head -->

<!-- Mirrored from midone.left4code.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 Dec 2020 04:07:34 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8"/><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <link href="dist/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>{{ env('APP_NAME') }} - {{ env('APP_NAME') }}</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ url('') }}/dist/css/app.css"/>
    <!-- END: CSS Assets-->

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <link href="{{ url("vendor/datatables/dataTables.bootstrap4.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">

    <style>
        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;

            color: #fff;
            text-align: center;
            border-radius: 25px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            top: 30px;
            left: 47.5%;
            right: 40%;
            font-size: 17px;
        }

        #snackbar.hapus_semua {
            left: 46.5%;
            right: 39.5%;
        }

        #snackbar.success {
            background-color: #00CA79;
        }

        #snackbar.warning {
            background-color: #EC971F;
        }

        #snackbar.danger {
            background-color: #AC2925;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {
                top: 0;
                opacity: 0;
            }

            to {
                top: 30px;
                opacity: 1;
            }
        }

        @keyframes fadein {
            from {
                top: 0;
                opacity: 0;
            }

            to {
                top: 30px;
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeout {
            from {
                top: 30px;
                opacity: 1;
            }

            to {
                top: 0;
                opacity: 0;
            }
        }

        @keyframes fadeout {
            from {
                top: 30px;
                opacity: 1;
            }

            to {
                top: 0;
                opacity: 0;
            }
        }
    </style>

    <style>
        ._3emE9--dark-theme .-S-tR--ff-downloader {
            background: rgba(30, 30, 30, .93);
            border: 1px solid rgba(82, 82, 82, .54);
            box-shadow: 0 4px 7px rgba(30, 30, 30, .55);
            color: #fff
        }

        ._3emE9--dark-theme .-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn {
            background: #3d4b52
        }

        ._3emE9--dark-theme .-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn:hover {
            background: #131415
        }

        ._3emE9--dark-theme .-S-tR--ff-downloader ._10vpG--footer {
            background: rgba(30, 30, 30, .93)
        }

        ._2mDEx--white-theme .-S-tR--ff-downloader {
            background: #fff;
            border: 1px solid rgba(82, 82, 82, .54);
            box-shadow: 0 4px 7px rgba(30, 30, 30, .55);
            color: #314c75
        }

        ._2mDEx--white-theme .-S-tR--ff-downloader ._6_Mtt--header {
            font-weight: 700
        }

        ._2mDEx--white-theme .-S-tR--ff-downloader ._2dFLA--container ._2bWNS--notice {
            border: 0;
            color: rgba(0, 0, 0, .88)
        }

        ._2mDEx--white-theme .-S-tR--ff-downloader ._10vpG--footer {
            background: #fff
        }

        .-S-tR--ff-downloader {
            display: block;
            overflow: hidden;
            position: fixed;
            bottom: 20px;
            right: 7.1%;
            width: 330px;
            height: 180px;
            background: rgba(30, 30, 30, .93);
            border-radius: 2px;
            color: #fff;
            z-index: 99999999;
            border: 1px solid rgba(82, 82, 82, .54);
            box-shadow: 0 4px 7px rgba(30, 30, 30, .55);
            transition: .5s
        }

        .-S-tR--ff-downloader._3M7UQ--minimize {
            height: 62px
        }

        .-S-tR--ff-downloader._3M7UQ--minimize .nxuu4--file-info,
        .-S-tR--ff-downloader._3M7UQ--minimize ._6_Mtt--header {
            display: none
        }

        .-S-tR--ff-downloader ._6_Mtt--header {
            padding: 10px;
            font-size: 17px;
            font-family: sans-serif
        }

        .-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn {
            float: right;
            background: #f1ecec;
            height: 20px;
            width: 20px;
            text-align: center;
            padding: 2px;
            margin-top: -10px;
            cursor: pointer
        }

        .-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn:hover {
            background: #e2dede
        }

        .-S-tR--ff-downloader ._13XQ2--error {
            color: red;
            padding: 10px;
            font-size: 12px;
            line-height: 19px
        }

        .-S-tR--ff-downloader ._2dFLA--container {
            position: relative;
            height: 100%
        }

        .-S-tR--ff-downloader ._2dFLA--container .nxuu4--file-info {
            padding: 6px 15px 0;
            font-family: sans-serif
        }

        .-S-tR--ff-downloader ._2dFLA--container .nxuu4--file-info div {
            margin-bottom: 5px;
            width: 100%;
            overflow: hidden
        }

        .-S-tR--ff-downloader ._2dFLA--container ._2bWNS--notice {
            margin-top: 21px;
            font-size: 11px
        }

        .-S-tR--ff-downloader ._10vpG--footer {
            width: 100%;
            bottom: 0;
            position: absolute;
            font-weight: 700
        }

        .-S-tR--ff-downloader ._10vpG--footer ._2V73d--loader {
            animation: n0BD1--rotation 3.5s linear forwards;
            position: absolute;
            top: -120px;
            left: calc(50% - 35px);
            border-radius: 50%;
            border: 5px solid #fff;
            border-top-color: #a29bfe;
            height: 70px;
            width: 70px;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .-S-tR--ff-downloader ._10vpG--footer ._24wjw--loading-bar {
            width: 100%;
            height: 18px;
            background: #dfe6e9;
            border-radius: 5px
        }

        .-S-tR--ff-downloader ._10vpG--footer ._24wjw--loading-bar ._1FVu9--progress-bar {
            height: 100%;
            background: #8bc34a;
            border-radius: 5px
        }

        .-S-tR--ff-downloader ._10vpG--footer ._2KztS--status {
            margin-top: 10px
        }

        .-S-tR--ff-downloader ._10vpG--footer ._2KztS--status ._1XilH--state {
            float: left;
            font-size: .9em;
            letter-spacing: 1pt;
            text-transform: uppercase;
            width: 100px;
            height: 20px;
            position: relative
        }

        .-S-tR--ff-downloader ._10vpG--footer ._2KztS--status ._1jiaj--percentage {
            float: right
        }
    </style>

    <link href="{{ url("css/style2.css") }}" rel="stylesheet">
</head>
<!-- END: Head -->
<body class="app">
<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="#" class="flex mr-auto">
            <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{ url('') }}/dist/images/logo.svg">
        </a>
        <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2"
                                                            class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>


    <ul class="border-t border-theme-24 py-5 hidden">
        <li>
            <a href="index.html" class="menu menu--active">
                <div class="menu__icon"><i data-feather="database"></i></div>
                <div class="menu__title"> Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="menu side-menu side-menu--open">
                <div class="menu__icon"><i data-feather="box"></i></div>
                <div class="menu__title"> Menu Layout <i data-feather="chevron-down" class="menu__sub-icon"></i></div>
            </a>
            <ul class="side-menu__sub-open" style="display: block;">
                <li>
                    <a href="index.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Side Menu</div>
                    </a>
                </li>
                <li>
                    <a href="simple-menu-light-dashboard.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Simple Menu</div>
                    </a>
                </li>
                <li>
                    <a href="top-menu-light-dashboard.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Top Menu</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="side-menu-light-inbox.html" class="menu">
                <div class="menu__icon"><i data-feather="inbox"></i></div>
                <div class="menu__title"> Inbox</div>
            </a>
        </li>
        <li>
            <a href="side-menu-light-file-manager.html" class="menu">
                <div class="menu__icon"><i data-feather="hard-drive"></i></div>
                <div class="menu__title"> File Manager</div>
            </a>
        </li>
        <li>
            <a href="side-menu-light-point-of-sale.html" class="menu">
                <div class="menu__icon"><i data-feather="credit-card"></i></div>
                <div class="menu__title"> Point of Sale</div>
            </a>
        </li>
        <li>
            <a href="side-menu-light-chat.html" class="menu">
                <div class="menu__icon"><i data-feather="message-square"></i></div>
                <div class="menu__title"> Chat</div>
            </a>
        </li>
        <li>
            <a href="side-menu-light-post.html" class="menu">
                <div class="menu__icon"><i data-feather="file-text"></i></div>
                <div class="menu__title"> Post</div>
            </a>
        </li>
        <li class="menu__devider my-6"></li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"><i data-feather="edit"></i></div>
                <div class="menu__title"> Crud <i data-feather="chevron-down" class="menu__sub-icon"></i></div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-light-crud-data-list.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Data List</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-crud-form.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Form</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"><i data-feather="users"></i></div>
                <div class="menu__title"> Users <i data-feather="chevron-down" class="menu__sub-icon"></i></div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-light-users-layout-1.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Layout 1</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-users-layout-2.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Layout 2</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-users-layout-3.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Layout 3</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"><i data-feather="trello"></i></div>
                <div class="menu__title"> Profile <i data-feather="chevron-down" class="menu__sub-icon"></i></div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-light-profile-overview-1.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Overview 1</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-profile-overview-2.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Overview 2</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-profile-overview-3.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Overview 3</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"><i data-feather="layout"></i></div>
                <div class="menu__title"> Pages <i data-feather="chevron-down" class="menu__sub-icon"></i></div>
            </a>
            <ul class="">
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Wizards <i data-feather="chevron-down" class="menu__sub-icon"></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-wizard-layout-1.html" class="menu">
                                <div class="menu__icon"><i data-feather="zap"></i></div>
                                <div class="menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-wizard-layout-2.html" class="menu">
                                <div class="menu__icon"><i data-feather="zap"></i></div>
                                <div class="menu__title">Layout 2</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-wizard-layout-3.html" class="menu">
                                <div class="menu__icon"><i data-feather="zap"></i></div>
                                <div class="menu__title">Layout 3</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Blog <i data-feather="chevron-down" class="menu__sub-icon"></i></div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-blog-layout-1.html" class="menu">
                                <div class="menu__icon"><i data-feather="zap"></i></div>
                                <div class="menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-blog-layout-2.html" class="menu">
                                <div class="menu__icon"><i data-feather="zap"></i></div>
                                <div class="menu__title">Layout 2</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-blog-layout-3.html" class="menu">
                                <div class="menu__icon"><i data-feather="zap"></i></div>
                                <div class="menu__title">Layout 3</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Pricing <i data-feather="chevron-down" class="menu__sub-icon"></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-pricing-layout-1.html" class="menu">
                                <div class="menu__icon"><i data-feather="zap"></i></div>
                                <div class="menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-pricing-layout-2.html" class="menu">
                                <div class="menu__icon"><i data-feather="zap"></i></div>
                                <div class="menu__title">Layout 2</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Invoice <i data-feather="chevron-down" class="menu__sub-icon"></i>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-invoice-layout-1.html" class="menu">
                                <div class="menu__icon"><i data-feather="zap"></i></div>
                                <div class="menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-invoice-layout-2.html" class="menu">
                                <div class="menu__icon"><i data-feather="zap"></i></div>
                                <div class="menu__title">Layout 2</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> FAQ <i data-feather="chevron-down" class="menu__sub-icon"></i></div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-faq-layout-1.html" class="menu">
                                <div class="menu__icon"><i data-feather="zap"></i></div>
                                <div class="menu__title">Layout 1</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-faq-layout-2.html" class="menu">
                                <div class="menu__icon"><i data-feather="zap"></i></div>
                                <div class="menu__title">Layout 2</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-faq-layout-3.html" class="menu">
                                <div class="menu__icon"><i data-feather="zap"></i></div>
                                <div class="menu__title">Layout 3</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="login-light-login.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Login</div>
                    </a>
                </li>
                <li>
                    <a href="login-light-register.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Register</div>
                    </a>
                </li>
                <li>
                    <a href="main-light-error-page.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Error Page</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-update-profile.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Update profile</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-change-password.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Change Password</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu__devider my-6"></li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"><i data-feather="inbox"></i></div>
                <div class="menu__title"> Components <i data-feather="chevron-down" class="menu__sub-icon"></i></div>
            </a>
            <ul class="">
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Table <i data-feather="chevron-down" class="menu__sub-icon"></i></div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-regular-table.html" class="menu">
                                <div class="menu__icon"><i data-feather="zap"></i></div>
                                <div class="menu__title">Regular Table</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-tabulator.html" class="menu">
                                <div class="menu__icon"><i data-feather="zap"></i></div>
                                <div class="menu__title">Tabulator</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="side-menu-light-accordion.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Accordion</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-button.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Button</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-modal.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Modal</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-alert.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Alert</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-progress-bar.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Progress Bar</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-tooltip.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Tooltip</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-dropdown.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Dropdown</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-toast.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Toast</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-typography.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Typography</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-icon.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Icon</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-loading-icon.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Loading Icon</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"><i data-feather="sidebar"></i></div>
                <div class="menu__title"> Forms <i data-feather="chevron-down" class="menu__sub-icon"></i></div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-light-regular-form.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Regular Form</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-datepicker.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Datepicker</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-tail-select.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Tail Select</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-file-upload.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> File Upload</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-wysiwyg-editor.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Wysiwyg Editor</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-validation.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Validation</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu">
                <div class="menu__icon"><i data-feather="hard-drive"></i></div>
                <div class="menu__title"> Widgets <i data-feather="chevron-down" class="menu__sub-icon"></i></div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-light-chart.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Chart</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-slider.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Slider</div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-image-zoom.html" class="menu">
                        <div class="menu__icon"><i data-feather="activity"></i></div>
                        <div class="menu__title"> Image Zoom</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!-- END: Mobile Menu -->
<div class="flex">
    <!-- BEGIN: Side Menu -->
    <nav class="side-nav">
        <a href="#" class="intro-x flex items-center pl-5 pt-4">
            <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{ url('') }}/dist/images/logo.svg">
            <span class="hidden xl:block text-white text-lg ml-3"> {{ auth()->user()->level }} </span>
        </a>
        <div class="side-nav__devider my-6"></div>
        <ul>
            <li>
                <a href="{{ url('dashboard') }}"
                   @if(Route::current()->action['as'] == 'dashboard') class='side-menu side-menu--active'
                   @else class='side-menu'
                    @endif>
                    <div class="side-menu__icon"><i data-feather="home"></i></div>
                    <div class="side-menu__title"> Dashboard</div>
                </a>
            </li>

{{--            @if(in_array(auth()->user()->level, ['Admin', 'Karyawan']))--}}
{{--                <li>--}}
{{--                    <a @if(Route::current()->action['as'] == 'pemasok.index') class='side-menu side-menu--active'--}}
{{--                       @else class='side-menu'--}}
{{--                       @endif href="{{ route('pemasok.index') }}">--}}
{{--                        <div class="side-menu__icon"><i data-feather="database"></i></div>--}}
{{--                        <div class="side-menu__title"> Pemasok</div>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endif--}}

{{--            @if(in_array(auth()->user()->level, ['Admin', 'Karyawan']))--}}
{{--                <li>--}}
{{--                    <a @if(Route::current()->action['as'] == 'pembelian.index') class='side-menu side-menu--active'--}}
{{--                       @else class='side-menu'--}}
{{--                       @endif href="{{ route('pembelian.index') }}">--}}
{{--                        <div class="side-menu__icon"><i data-feather="database"></i></div>--}}
{{--                        <div class="side-menu__title"> Pembelian</div>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endif--}}


            @if(in_array(auth()->user()->level, ['Admin', 'Karyawan', '']))
                <li>
                    <a @if(Route::current()->action['as'] == 'kategori.index') class='side-menu side-menu--active'
                       @else class='side-menu'
                       @endif href="{{ route('kategori.index') }}">
                        <div class="side-menu__icon"><i data-feather="database"></i></div>
                        <div class="side-menu__title"> Kategori</div>
                    </a>
                </li>
            @endif
            
            @if(in_array(auth()->user()->level, ['Admin', 'Pemilik', 'Admin']))
                <li>
                    <a @if(Route::current()->action['as'] == 'meja.index') class='side-menu side-menu--active'
                       @else class='side-menu'
                       @endif href="{{ route('meja.index') }}">
                        <div class="side-menu__icon"><i data-feather="database"></i></div>
                        <div class="side-menu__title"> Meja</div>
                    </a>
                </li>
            @endif
            
            @if(in_array(auth()->user()->level, ['Admin', 'Pemilik', 'Karyawan']))
                <li>
                    <a @if(Route::current()->action['as'] == 'barang.index') class='side-menu side-menu--active'
                       @else class='side-menu'
                       @endif href="{{ route('barang.index') }}">
                        <div class="side-menu__icon"><i data-feather="database"></i></div>
                        <div class="side-menu__title"> Barang</div>
                    </a>
                </li>
            @endif

            @if(in_array(auth()->user()->level, ['', 'Karyawan']))
                <li>
                    <a @if(Route::current()->action['as'] == 'pemesanan.index') class='side-menu side-menu--active'
                       @else class='side-menu'
                       @endif href="{{ route('pemesanan.index') }}">
                        <div class="side-menu__icon"><i data-feather="database"></i></div>
                        <div class="side-menu__title"> Pemesanan</div>
                    </a>
                </li>
            @endif


           @if(in_array(auth()->user()->level, ['', 'Karyawan']))
                <li>
                    <a @if(Route::current()->action['as'] == 'produk.index') class='side-menu side-menu--active'
                       @else class='side-menu'
                       @endif href="{{ route('produk.index') }}">
                        <div class="side-menu__icon"><i data-feather="database"></i></div>
                        <div class="side-menu__title"> Produk</div>
                    </a>
                </li>
            @endif

            @if(in_array(auth()->user()->level, ['', 'Pemilik']))
                <li>
                    <a @if(Route::current()->action['as'] == 'user.index') class='side-menu side-menu--active'
                       @else class='side-menu'
                       @endif href="{{ route('user.index') }}">
                        <div class="side-menu__icon"><i data-feather="database"></i></div>
                        <div class="side-menu__title"> User</div>
                    </a>
                </li>
            @endif
            
            @if(in_array(auth()->user()->level, ['Admin', 'Pemilik', 'Karyawan']))
                <li>
                    <a @if(Route::current()->action['as'] == 'pemesanan.laporan.index') class='side-menu side-menu--active'
                       @else class='side-menu'
                       @endif href="{{ route('pemesanan.laporan.index') }}">
                        <div class="side-menu__icon"><i data-feather="database"></i></div>
                        <div class="side-menu__title"> Laporan Pemesanan</div>
                    </a>
                </li>
            @endif

        </ul>
    </nav>
    <!-- END: Side Menu -->
    <!-- BEGIN: Content -->
    <div class="content">
        <!-- BEGIN: Top Bar -->
        <div class="top-bar">
            <!-- BEGIN: Breadcrumb -->
        @yield('breadcrumb')

        <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <div class="intro-x relative mr-3 sm:mr-6">
                <a class="notification sm:hidden" href="#"> <i data-feather="search"
                                                               class="notification__icon dark:text-gray-300"></i> </a>

            </div>
            <!-- END: Search -->
            <!-- BEGIN: Notifikasi -->
            <div class="intro-x dropdown mr-auto sm:mr-6">
                <div class="dropdown-toggle notification notification--bullet cursor-pointer"><i data-feather="bell"
                                                                                                 class="notification__icon dark:text-gray-300"></i>
                </div>
                <div class="notification-content pt-2 dropdown-box">
                    <div class="notification-content__box dropdown-box__content box dark:bg-dark-6">
                        <div class="notification-content__title">Notifikasi</div>

                        @forelse($notifs as $item)
                            <div class="cursor-pointer relative flex items-center ">
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="{{ url('pemesanan') }}" class="font-medium truncate mr-5">{{ $item->alamat_pengiriman }}</a>
                                        <div
                                            class="text-xs text-gray-500 ml-auto whitespace-nowrap">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600 mt-0.5">{{ $item->catatan ?? "-" }}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <strong>Belum Ada Notifikasi</strong>
                        @endforelse
                    </div>


                </div>
            </div>
            <!-- END: Notifications -->
            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                    <img alt="Midone Tailwind HTML Admin Template" src="{{ url('') }}/dist/images/profile-13.jpg">
                </div>
                <div class="dropdown-box w-56">
                    <div class="dropdown-box__content box bg-theme-38 dark:bg-dark-6 text-white">
                        <div class="p-4 border-b border-theme-40 dark:border-dark-3">
                            <div class="font-medium">Denzel Washington</div>
                            <div class="text-xs text-theme-41 mt-0.5 dark:text-gray-600">Software Engineer</div>
                        </div>
                        <div class="p-2">
                            <a href="{{ route('user.profile', auth()->user()->id) }}"
                               class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>


                            <a href="#"
                               class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                            <a href="#"
                               class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                            <a href="#"
                               class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                        </div>
                        <div class="p-2 border-t border-theme-40 dark:border-dark-3">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"
                                   onclick="event.preventDefault(); if(confirm('Yakin akan logut?')) this.closest('form').submit(); ">
                                    <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Account Menu -->
        </div>
        <!-- END: Top Bar -->
        @yield('content')
    </div>
    <!-- END: Content -->
</div>

<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjDvJ3gdZ92nvKNVUGMwCHeaRRU0k92pE&amp;libraries=places"></script>
<script src="{{ url('') }}/dist/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>

{{-- dropzone --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>

<script src="{{ url('') }}/assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="{{ url('') }}/assets/js/bootstrap.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="{{ url('') }}/assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="{{ url('') }}/assets/js/custom.js"></script>

<script src="{{ url('monster-admin-lite/assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ url('lumino/js/bootstrap.min.js') }}"></script>
<script src="{{ url('lumino/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ url('lumino/js/custom.js') }}"></script>

{{-- datatable --}}
<script src="{{ url("vendor/datatables/jquery.dataTables.js") }}"></script>
<script src="{{ url("vendor/datatables/dataTables.bootstrap4.js") }}"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

{{-- ckeditor --}}
{{-- < src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></> --}}
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

{{-- flatpickr --}}
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>

<script>
    $(document).ready(function () {
        $(document).ready(function() {
            $('#uang_pelanggan').keyup(function() {
                let total = parseInt($('#total').val());
                let uang_pelanggan = parseInt($('#uang_pelanggan').val());
                
                $('#kembalian').val(uang_pelanggan - total);
            })
        })
        
        
        
        
        
        $('#harga, #jumlah').keyup(function () {
            let harga = parseInt($('#harga_beli').val()) ? parseInt($('#harga_beli').val()) : parseInt($('#harga_jual').val());
            let jumlah = parseInt($('#jumlah').val());
            let total = harga * jumlah;

            $('#total').val(total)
        });

        $('#produk_id').on('change', () => {
            $.ajax({
                url: "{{ url('produk/get-produk') }}",
                data: {
                    produk_id: $('#produk_id').val(),
                    _token: ""
                }, headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                success: (response) => {
                    let responseJson = JSON.parse(response);

                    $('#harga_beli').val(responseJson.harga_beli)
                    $('#harga_jual').val(responseJson.harga_jual)
                }
            })
        })

        // untuk merubah position modal
        modalId = 0;
        $(document).on('click', '.lblHapus', function () {
            modalId = $(this).data('modal-id');

            $(`#modal-${modalId} .modal-dialog`).css({
                "position": 'absolute',
                'left': event.pageX - 170,
                "top": event.pageY - 170
            });

            $(`#modal-${modalId} .btn-modal`).click((e) => {

                $(`#modal-${modalId}`).modal('hide');
            });

            $(document).on('keypress', (e) => {
                if (e.which == 13) {
                    if (modalId > 0) {

                        $(`#modal-${modalId} .btn-modal`).click();
                    }

                    modalId = 0;
                }
            });
        });


        // dropzone
        Dropzone.options.imageUpload = {
            maxFilesize: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };

        // menghilangkan alert
        $('.alert').fadeOut(5000);

        // flatpickr
        $(".flatpickr").flatpickr({
            enableTime: false,
            dateFormat: "d-M-Y",
            locale: 'id'
        });

        // flatpickr
        $(".flatpickr2").flatpickr({
            enableTime: false,
            dateFormat: "d-M-Y H:i",
            locale: 'id',
            enableTime: true
        });

        $('[data-toggle="popover"]').popover({
            html: true
        });

        $('input[type="range"]').on("change mousemove", function () {
            $(this).next().html($(this).val());
        });

        // agar filter dari datatable bisa dipake buat nyari juga
        $('#dataTable_filter input').attr('name', 'q');
        $('#dataTable_filter input').val(q);
        $('#dataTable_filter input').attr('id', 'inputSearch');
        $('#dataTable_filter input').attr('placeholder', placeholder);

        var formHtml = `<form action="${urlSearch}">`;

        $('#dataTable_filter input').wrap(formHtml);

        $(document).keydown(function (e) {
            if (e.keyCode == 13 && $("#inputSearch").is(':focus')) {
                $('#dataTable_filter form').submit();
            }
        });

        function inArray(needle, haystack) {
            var length = haystack.length;
            for (var i = 0; i < length; i++) {
                if (typeof haystack[i] == 'object') {
                    if (arrayCompare(haystack[i], needle)) return true;
                } else {
                    if (haystack[i] == needle) return true;
                }
            }

            return false;
        }

        var selector_soal_ids = [];
        $('.mapel_detail_ids, .mode, .jenis_soal').change(function () {
            // hilangkan mapel yang tidak terkait
            $(`#modal-test-mode ul`).hide();

            $.each($(".mapel_detail_ids:checked"), (index, mapel_detail_id) => {
                const selector_soal =
                    `#modal-test-mode ul[data-mapel-detail_id='${mapel_detail_id.value}'][data-jenis='${$(".jenis_soal").val()}'][data-mode='${$(".mode").val()}']`;
                selector_soal_ids.push(selector_soal + " input[type='checkbox']");

                $(selector_soal).show();
            });
        });

        $('#mode').change(function (e) {
            if (inArray($(this).val(), ['Pilgan Normal', 'Essay Normal'])) {

                $('#modal-test-mode').modal();
            }
        });

        $('#form-test').submit(function (e) {
            // e.preventDefault()

            if (!inArray($('#soal_ids').val(), ['', '[]'])) {
                return;
            }

            var selector_soal_id_checkeds = [];
            $.each(selector_soal_ids, function (index, selector_soal_id) {
                $(`${selector_soal_id}:checked`).map(function () {
                    selector_soal_id_checkeds.push($(this).val());
                });
            })

            $('#soal_ids').val(JSON.stringify(selector_soal_id_checkeds));
        })


        // baris kode ini untuk menambahkan kelas dan juga guru ketika tombol tambah diklik (di maple create)
        $('#mapelBtnAdd').click(function () {
            const mapelFormKelasGuru = $('#mapelFormKelasGuru')
            const mapleFormKelasGuruAdd = $('#mapelFormKelasGuruAdd');

            mapelFormKelasGuru.append(mapleFormKelasGuruAdd.html());
        })


        // ini harus dibuat supaya ck editor bisa upload gambar
        CKEDITOR.config.filebrowserUploadMethod = 'form';

        // ini adalah inisialisasi setiap ck editor, dari id 0 sampai 3, jadi kalo perlu ckeditornya
        // kita tinggal pasang aja id yang tersedia dibawah ini, dan ck editor pun langsung tampil
        CKEDITOR.replace('editor-0', {
            height: 200,
            filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
        });
        CKEDITOR.replace('editor-1', {
            height: 200,
            filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
        });
        CKEDITOR.replace('editor-2', {
            height: 200,
            filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
        });
        CKEDITOR.replace('editor-3', {
            height: 200,
            filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
        });
        CKEDITOR.replace('editor-4', {
            height: 200,
            filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
        });

        function getIdOfRows(selector) {
            var ids = [];
            for (data of selector) {
                ids.push(data.dataset.id);
            }

            return ids;
        }

        // ini adalah baris kode untuk mengatur penambahan soal essay
        // jadi ketika button tambah diklik maka baris ini akan menambahkan bobot dan textbox soal
        var number = $(`form .btnHapusEditor`).length - 1;
        $('#listSoalEssayBtnAdd').on('click', function () {
            number++;

            $("#listSoalEssay").append($('#listSoalEssayToAdd').html())

            $('form #hapusEditor-x').attr('data-hapus', `hapusEditor_${number}`);
            $('form #hapusEditor-x').attr('id', '')
            $(`form .btnHapusEditor`).last().attr('data-target',
                `[data-hapus='hapusEditor_${number}'`);
            $(`form .btnHapusEditor`).last().attr('data-hapus', `hapusEditor_${number}`)

            $('form #editor-x').attr('id', `editor_${number}`);
            CKEDITOR.replace(`editor_${number}`, {
                height: 200,
                filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
            })
        })

        // ini adalah baris kode untuk mengatur kalo seandainy ada error di bagia create soalessay nya
        // bobot kita jadikan patokan karena jumlah bobot itu sama dengan jumlah soal
        @if(old('bobot') != "")
        @foreach(old('bobot') as $index => $bobot)
        CKEDITOR.replace(`editor-{{ $index }}`, {
            height: 200,
            filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
        })
        @endforeach
        @endif

        // baris kode ini untuk mengatur event ketika user mengklik tombol hapus di bagian create soal essay
        // numbernya harus kita kurangin setiap editornya berkurang
        // supaya penomoran ckeditornya tidak berantakan
        $(document).on('click', 'form .btnHapusEditor', function () {
            if (confirm("Yakin akan menghapus soal ini?")) {
                $($(this).data('target')).remove()

                number--;
            }
        })

        // dibaris ini kita mengatur datatable untuk semua halaman
        // ketika data dihalaman tersebut ditampilkan maka datatabel akan mengatur desain tablenya
        // dari mulai filter, tombol hapus semua, aktifkan, dll..
        // pengaturan ini tidak sama untuk beberapa halaman
        // sehingga kita perlu melakukan if conditional lagi
        $('#dataTable').DataTable({
            paging: true,
            pageLength: 25,
            dom: 'Blfrtip',
            "columnDefs": [{
                "orderable": false,
                "targets": columnOrders
            }],
            buttons: tampilkan_buttons === false ? (button_manual === false ? [] : button_manual) :
                [{
                    extend: 'selectAll',
                    text: 'Pilih Semua',
                    className: "btn btn-primary w-24 mr-1 mb-2 buttons-select-all btn-sm"
                },
                    {
                        extend: "selectNone",
                        text: 'Batal Pilih',
                        className: "btn btn-primary w-24 mr-1 mb-2 buttons-select-none  btn-sm"
                    },
                    {
                        text: 'Hapus',
                        className: "btn btn-primary w-24 mr-1 mb-2 btn-sm",
                        action: function (e, dt, node, config) {
                            var ids = JSON.stringify(getIdOfRows($('tr.selected')));
                            if (confirm("Yakin akan menghapus semua data yang dipilih?")) {
                                // $(`#modal-hapus-semua .modal-dialog`).css({
                                //     "position": 'absolute',
                                //     'left' : event.pageX - 170,
                                //     "top": event.pageY - 170
                                // });

                                // $('#modal-hapus-semua').modal('show');

                                location.href = `${locationHrefHapusSemua}?ids=${ids}`;
                            }
                        }
                    },
                    {
                        text: 'Tambah',
                        className: "btn btn-primary w-24 mr-1 mb-2 btn-sm",
                        action: function (e, dt, node, config) {
                            location.href = locationHrefCreate
                        }
                    },
                    // khusus halaman user
                    // @if(Route::current()->action['as'] == 'user.index') {
                    //     text: 'Aktifkan User',
                    //     className: "btn btn-primary btn-sm",
                    //     action: function (e, dt, node, config) {
                    //         var ids = JSON.stringify(getIdOfRows($('tr.selected')));
                    //         if (confirm("Yakin akan mengaktifkan semua data yang dipilih?")) {
                    //             location.href = `${locationHrefAktifkanSemua}?ids=${ids}`;
                    //         }
                    //     }
                    // },
                    // @endif
                    // @if(Route::current()->action['as'] == 'user.index' && request()->kelas_id) {
                    //     text: 'Naik Kelas',
                    //     className: "btn btn-primary btn-sm",
                    //     action: function (e, dt, node, config) {
                    //         var ids = JSON.stringify(getIdOfRows($('tr.selected')));
                    //         if (confirm(
                    //             "Yakin akan menaikkan kelas untuk siswa yang dipilih?")) {
                    //             location.href = `${locationHrefNaikKelas}?ids=${ids}`;
                    //         }
                    //     }
                    // }
                    // @endif


                    ],
                    select
    :
        true,
    })
        ;
    });
</script>

</body>

<!-- Mirrored from midone.left4code.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 Dec 2020 04:08:24 GMT -->
</html>
