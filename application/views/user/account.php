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
                                                            <span class="caption-subject font-red sbold uppercase"><?php echo $user_tab; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">                                                        
                                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                                            <thead>
                                                                <tr>
                                                                    <th> First Name </th>
                                                                    <th> Last Name </th>
                                                                    <th> Username </th>
                                                                    <th> Email </th>
                                                                    <th> Date of Birth </th>
                                                                    <th> Edit </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($account as $key => $value) :?>
                                                                    <tr class="available" user_id="<?=$value->user_id?>">
                                                                        <td firstname="<?=$value->FirstName?>"><?=$value->FirstName?></td>
                                                                        <td lastname="<?=$value->LastName?>"><?=$value->LastName?></td>
                                                                        <td username="<?=$value->username?>"><?=$value->username?></td>
                                                                        <td email="<?=$value->email?>"><?=$value->email?></td>
                                                                        <td birthday="<?=$value->DateOfBirth?>"><?=$value->DateOfBirth?></td>
                                                                        <td><a class="edit"><i class="fa fa-pencil"></i></a></td>
                                                                    </tr>
                                                                <?php endforeach;?>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="modal fade edit-user" role="dialog">
                                                      <div class="modal-dialog modal-sm">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h3 class="modal-title">Edit User</h3>
                                                          </div>
                                                          <div class="modal-body">
                                                            <div class="content">
                                                                <!-- BEGIN Edit FORM -->
                                                                <form class="edit-user-form" role="form" method="post">                                                                    
                                                                    <div class="form-group">
                                                                        <label class="control-label visible-ie8 visible-ie9">First Name</label>
                                                                        <div class="input-icon">
                                                                            <i class="fa fa-font"></i>
                                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="First Name" name="firstname"/> </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label visible-ie8 visible-ie9">Last Name</label>
                                                                        <div class="input-icon">
                                                                            <i class="fa fa-font"></i>
                                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Last Name" name="lastname"/> </div>
                                                                    </div>                                                                    
                                                                    <div class="form-group">
                                                                        <label class="control-label visible-ie8 visible-ie9">Date Of Birth</label>
                                                                        <div class="input-icon">
                                                                            <i class="fa fa-calendar"></i>
                                                                            <input class="form-control placeholder-no-fix" type="date" placeholder="YYYY-MM-DD" name="birthday"/> </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label visible-ie8 visible-ie9">Username</label>
                                                                        <div class="input-icon">
                                                                            <i class="fa fa-user"></i>
                                                                            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/> </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                                                                        <label class="control-label visible-ie8 visible-ie9">Email</label>
                                                                        <div class="input-icon">
                                                                            <i class="fa fa-envelope"></i>
                                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="E-mail" name="email"/> </div>
                                                                    </div>
                                                                    
                                                                    <div class="form-actions">
                                                                        <button type="button" class="save btn green"> Save </button>
                                                                        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                                <!-- END Edit FORM -->
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                                <!-- END EXAMPLE TABLE PORTLET-->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PAGE CONTENT INNER -->
                                </div>
                            </div>
                            <!-- END PAGE CONTENT BODY -->
                            <!-- END CONTENT BODY -->
                        </div>
                        <!-- END CONTENT -->                        
                    </div>
                    <!-- END CONTAINER -->
                </div>
            </div>

            <div class="page-wrapper-row">
                <div class="page-wrapper-bottom">
                    <!-- BEGIN FOOTER -->
                    <!-- BEGIN PRE-FOOTER -->
                    <div class="page-prefooter">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                                    <h2>About</h2>
                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam dolore. </p>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs12 footer-block">
                                    
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                                        
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                                    <h2>Contacts</h2>
                                    <address class="margin-bottom-40"> Phone: 123 456 7890
                                        <br> Email:
                                        <a href="">hannan969@outlook.com</a>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PRE-FOOTER -->
                    <!-- BEGIN INNER FOOTER -->
                    <div class="page-footer">
                        <div class="container">
                            2018 &copy; Meal Hub By Lotus                            
                        </div>
                    </div>
                    <div class="scroll-to-top">
                        <i class="icon-arrow-up"></i>
                    </div>
                    <!-- END INNER FOOTER -->
                    <!-- END FOOTER -->
                </div>
            </div>
        </div>
        
        <!-- BEGIN CORE PLUGINS -->
        <script src="/getfit/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="/getfit/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/getfit/assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
        <script src="/getfit/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="/getfit/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="/getfit/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="/getfit/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="/getfit/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="/getfit/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="/getfit/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="/getfit/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->        
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="/getfit/assets/Scripts/layout.min.js" type="text/javascript"></script>
        <script src="/getfit/assets/Scripts/demo.min.js" type="text/javascript"></script>
        <script src="/getfit/assets/Scripts/user/account.js" type="text/javascript"></script>

        <script type="text/javascript">
            <?php
                $toast =  $this->session->flashdata('toast');
                
                if ($toast != null && $toast['state'] == 'success') {
            ?>
                var shortCutFunction = "success";
                var msg = "<?php echo $toast['msg'] ?>";
                var title = "Notification";
                toastr[shortCutFunction](msg, title);
                $('#toast-container').addClass('animated rubberBand');

            <?php } else if (($toast != null) && ($toast['state'] == 'error')) { ?>

                var shortCutFunction = "error";
                var msg = "<?php echo $toast['msg'] ?>";
                var title = "Error !";
                toastr[shortCutFunction](msg, title);
                $('#toast-container').addClass('animated shake');
                
            <?php } ?>
        </script>
        
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>


