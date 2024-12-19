<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Meal Hub</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #3 for editable datatable samples" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="/getfit/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="/getfit/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/getfit/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/getfit/assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
        <link href="/getfit/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="/getfit/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="/getfit/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="/getfit/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="/getfit/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="/getfit/assets/styles/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="/getfit/assets/styles/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="/getfit/assets/styles/custom_style.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid">
        <div class="page-wrapper">
            <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                    <div class="page-header">
                        <!-- BEGIN HEADER TOP -->
                        <div class="page-header-top">
                            <div class="container">
                                <!-- BEGIN LOGO -->
                                <div class="page-logo">
                                    <a href="index.html">
                                        <img src="/getfit/assets/img/logo-default.jpg" alt="logo" class="logo-default">
                                    </a>
                                </div>
                                <!-- END LOGO -->
                                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                                <a href="javascript:;" class="menu-toggler"></a>
                                <!-- END RESPONSIVE MENU TOGGLER -->
                                <!-- BEGIN TOP NAVIGATION MENU -->
                                <div class="top-menu">
                                    <ul class="nav navbar-nav pull-right">
                                        <!-- BEGIN USER LOGIN DROPDOWN -->
                                        <li class="dropdown dropdown-user dropdown-dark">
                                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                <img alt="" class="img-circle" src="/getfit/assets/img/avatar9.jpg">
                                                <span class="username username-hide-mobile"><?php echo "Hi, " . $_SESSION["username"]."!"; ?></span>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-default">
                                                <li>
                                                    <a href="/getfit/user/logout">
                                                        <i class="icon-key"></i> Log Out </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- END USER LOGIN DROPDOWN -->       
                                    </ul>
                                </div>
                                <!-- END TOP NAVIGATION MENU -->
                            </div>
                        </div>
                        <!-- END HEADER TOP -->
                        <!-- BEGIN HEADER MENU -->
                        <div class="page-header-menu">
                            <div class="container">                              
                                <div class="hor-menu  ">
                                    <ul class="nav navbar-nav">
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                            <a href="/getfit/admin/ingredient"> Ingredients
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  ">
                                            <a href="/getfit/admin/meal"> Meals
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  ">
                                            <a href="/getfit/admin/user"> Users
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- END MEGA MENU -->
                            </div>
                        </div>
                        <!-- END HEADER MENU -->
                    </div>
                    <!-- END HEADER -->
                </div>
            </div>
            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div class="container">                                    
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <div class="page-content-inner">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                <div class="portlet light portlet-fit ">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="icon-settings font-red"></i>
                                                            <span class="caption-subject font-red sbold uppercase"><?php echo $admin_tab; ?></span>
                                                        </div>
                                                        <div class="caption pull-right">
                                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_user_modal">Add User <i class="fa fa-plus"></i></button>
                                                            <div id="add_user_modal" class="modal fade" role="dialog">
                                                              <div class="modal-dialog modal-sm">

                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h3 class="modal-title">Admin - create user</h3>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                    <div class="content">
                                                                        <!-- BEGIN REGISTRATION FORM -->
                                                                        <form class="register-form" method="post">
                                                                            <div class="form-group">
                                                                                <label class="control-label visible-ie8 visible-ie9">First Name</label>
                                                                                <div class="input-icon">
                                                                                    <i class="fa fa-font"></i>
                                                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="First Name" name="firstname" /> </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label visible-ie8 visible-ie9">Last Name</label>
                                                                                <div class="input-icon">
                                                                                    <i class="fa fa-font"></i>
                                                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="Last Name" name="lastname" /> </div>
                                                                            </div>
                                                                            
                                                                            <div class="form-group">
                                                                                <label class="control-label visible-ie8 visible-ie9">Date Of Birth</label>
                                                                                <div class="input-icon">
                                                                                    <i class="fa fa-calendar"></i>
                                                                                    <input class="form-control placeholder-no-fix" type="date" placeholder="YYYY-MM-DD" name="birthday" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])/(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])/(?:30))|(?:(?:0[13578]|1[02])-31))"/> </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="control-label visible-ie8 visible-ie9">Username</label>
                                                                                <div class="input-icon">
                                                                                    <i class="fa fa-user"></i>
                                                                                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                                                                <label class="control-label visible-ie8 visible-ie9">Email</label>
                                                                                <div class="input-icon">
                                                                                    <i class="fa fa-envelope"></i>
                                                                                    <input class="form-control placeholder-no-fix" type="text" placeholder="E-mail" name="email" /> </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                                                                <label class="control-label visible-ie8 visible-ie9">Email</label>
                                                                                <div class="input-icon">
                                                                                    <i class="fa fa-user-secret"></i>
                                                                                    <select class="form-control" name="user_type">
                                                                                        <option value="user">User</option>
                                                                                        <option value="admin">Admin</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label visible-ie8 visible-ie9">Password</label>
                                                                                <div class="input-icon">
                                                                                    <i class="fa fa-lock"></i>
                                                                                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label visible-ie8 visible-ie9">Confirm Your Password</label>
                                                                                <div class="controls">
                                                                                    <div class="input-icon">
                                                                                        <i class="fa fa-check"></i>
                                                                                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Confirm Your Password" name="rpassword" /> </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-actions">
                                                                                <button type="button" class="close_modal btn btn-danger" data-dismiss="modal">Close</button>
                                                                                <input type="hidden" name="register_flag" value="admin">                                                                 
                                                                                <button type="submit" class="btn green pull-right"> Register </button>
                                                                            </div>
                                                                        </form>
                                                                        <!-- END REGISTRATION FORM -->
                                                                    </div>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                    
                                                                  </div>
                                                                </div>

                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>