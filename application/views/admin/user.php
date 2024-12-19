                        <div class="portlet-body">
                            <table class="table table-striped table-hover table-bordered" id="sample_editable_user">
                                <thead>
                                    <tr>
                                        <th> First Name </th>
                                        <th> Last Name </th>
                                        <th> Username </th>
                                        <th> Email </th>
                                        <th> DateOfBirth </th>
                                        <th> User Type</th>
                                        <th> Edit </th>
                                        <th> Delete </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $key => $user) :?>
                                        <tr class="available" user_id="<?=$user->user_id?>">
                                            <td><?=$user->FirstName?></td>
                                            <td><?=$user->LastName?></td>
                                            <td><?=$user->username?></td>
                                            <td><?=$user->email?></td>
                                            <td><?=$user->DateOfBirth?></td>
                                            <td><?=$user->user_type?></td>
                                            <td><a class="edit"><i class="fa fa-pencil"></i></a></td>
                                            <td><a class="delete_user" user_name="<?=$user->username?>" user_id="<?=$user->user_id?>"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
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

<!-- start footer -->
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
<!-- end footer -->
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
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="/getfit/assets/Scripts/admin/ingredient.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="/getfit/assets/Scripts/layout.min.js" type="text/javascript"></script>
        <script src="/getfit/assets/Scripts/demo.min.js" type="text/javascript"></script>
        <script src="/getfit/assets/Scripts/admin.js" type="text/javascript"></script>
        <script src="/getfit/assets/Scripts/admin/user.js" type="text/javascript"></script>


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


