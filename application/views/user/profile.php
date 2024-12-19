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
                                                        <div class="caption pull-right">
                                                            <?php if($profile_flag==false){ ?>
                                                                <div class="btn-group">
                                                                    <button class="btn green create-profile">Create Profile</button>
                                                                </div>
                                                            <?php } ?>
                                                            <?php if($profile_flag==true){ ?>
                                                                <div class="btn-group pull-right">
                                                                    <button class="btn green edit-profile">Edit Profile</button>
                                                                </div>
                                                            <?php }; ?>
                                                        </div>                                                        
                                                    </div>                    
                                                    <div class="portlet-body profile_flag" profile_flag="<?php echo $profile_flag; ?>" >
                                                        <?php if($profile_flag==true){ ?>
                                                            <div class="profile row">
                                                                <div class="col-md-4">
                                                                    <div class="rectangle form-horizontal">
                                                                        <h4 class="middle font-blue-chambray font-lg sbold">Body Profile</h4>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3 control-label">Weight</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" readonly="true" name="weight" class="form-control" placeholder="Kilograms" value="<?php echo $profile[0]->weight; ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3 control-label">Height</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" readonly="true" name="height" class="form-control" placeholder="Centimeters" value="<?php echo $profile[0]->height; ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3 control-label">Age</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" readonly="true" name="age" class="form-control" placeholder="Years" value="<?php echo $profile[0]->age; ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3 control-label">Sex</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" readonly="true" name="sex" class="form-control" placeholder="Male or Female" value="<?php echo $profile[0]->sex; ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3 control-label">Activity</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" readonly="true" name="activity" class="form-control" placeholder="Active" value="<?php echo $activities[($profile[0]->activity)-1]->level; ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3 control-label">Goal</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" readonly="true" name="goal" class="form-control" placeholder="Weight Gain" value="<?php echo $goals[($profile[0]->goal)-1]->name; ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="rectangle form-horizontal">
                                                                        <h4 class="middle font-blue-chambray font-lg sbold">Daily Macros</h4>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3 control-label">Protein</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" readonly="true" name="protein" class="form-control" placeholder="Protein" value="<?php echo $profile[0]->profileProtein; ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3 control-label">Carbs</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" readonly="true" name="carbs" class="form-control" placeholder="Carbhydrate" value="<?php echo $profile[0]->profileCarbs; ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3 control-label">Fat</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" readonly="true" name="fat" class="form-control" placeholder="Fat" value="<?php echo $profile[0]->profileFat; ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3 control-label">Calories</label>
                                                                                    <div class="col-md-9">
                                                                                        <input type="text" readonly="true" name="cal" class="form-control" placeholder="Calories" value="<?php echo $profile[0]->profileCal; ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="rectangle form-horizontal">
                                                                        <h4 class="middle font-blue-chambray font-lg sbold">Nutritional Preferences</h4>
                                                                        
                                                                        <?php if($profile[0]->DietType_diet_id == Null){ ?>
                                                                            <h2 style="text-align: center;">You didn't select any nutritional preferences</h2>
                                                                        <?php }else{ ?>
                                                                            <?php foreach ($profile as $key => $value) :?>
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <div class="col-md-2"></div>
                                                                                            <div class="col-md-8">
                                                                                                <input type="text" readonly="true" class="form-control" value="<?php echo $diet_types[($value->DietType_diet_id)-1]->dietType; ?>">
                                                                                            </div>
                                                                                            <div class="col-md-2"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            <?php endforeach; ?>
                                                                        <?php }; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php }; ?>
                                                    </div>
                                                </div>
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

            <div class="modal fade create-profile-modal" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Create Profile</h3>
                  </div>
                  <div class="modal-body">
                    <div class="progress">
                        <div class="circle active">
                            <span class="label">Step 1</span>
                        </div>
                        <span class="bar"></span>
                        <div class="circle">
                            <span class="label">Step 2</span>
                        </div>
                        <span class="bar"></span>
                        <div class="circle">
                            <span class="label">Step 3</span>
                        </div>                
                    </div>
                    <div class="content">                                                                
                        <div class="profile-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light ">
                                        <div class="portlet-title">
                                            <ul class="nav nav-tabs">
                                                <li class="mr-20 underline">
                                                    <span class="font-dark font-lg bold">Body Profile</span>
                                                </li>
                                                <li class="mr-20">
                                                    <span class="font-dark font-lg bold">Macros</span>
                                                </li>
                                                <li class="mr-20">
                                                    <span class="font-dark font-lg bold">Nutritional Preferences</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="portlet-title tabbable-line">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#tab_1_1" data-toggle="tab"><span class="font-dark font-lg bold">Body Profile</span></a>
                                                </li>
                                                <li>
                                                    <a href="#tab_1_2" data-toggle="tab"><span class="font-dark font-lg bold">Macros</span></a>
                                                </li>
                                                <li>
                                                    <a href="#tab_1_3" data-toggle="tab"><span class="font-dark font-lg bold">Nutritional Preferences</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="portlet-body">
                                            <!-- BEGIN Create Profile FORM -->
                                            <form id="create_profile_form" class="form-horizontal" role="form" enctype="multipart/form-data">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <div class="rectangle">
                                                            <h4 class="middle font-blue-chambray font-lg sbold">Resting Energy Expenditure</h4>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Weight</label>
                                                                        <div class="col-md-9">
                                                                            <input type="number" step="any" name="weight" class="form-control" placeholder="Kilograms">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Height</label>
                                                                        <div class="col-md-9">
                                                                            <input type="number" step="any" name="height" class="form-control" placeholder="Centimeters">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Age</label>
                                                                        <div class="col-md-9">
                                                                            <input type="number" name="age" class="form-control" placeholder="Years">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="col-md-3 control-label">Sex</label>
                                                                        <div class="col-md-4 radio">
                                                                            <label><input type="radio" name="sex" value="Male" checked>Male</label>
                                                                        </div>
                                                                        <div class="col-md-4 radio">
                                                                            <label><input type="radio" name="sex" value="Female">Female</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>                                                                                                                        
                                                        </div>

                                                        <div class="rectangle">
                                                            <h4 class="middle font-blue-chambray font-lg sbold">Total Daily Expenditure</h4>
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label">Activity Level</label>
                                                                    <div class="col-md-6">
                                                                        <select class="form-control" name="activity">
                                                                            <?php foreach ($activities as $key => $activity) :?>
                                                                            <option value="<?=$activity->activity_id?>"><?=$activity->level?></option>
                                                                            <?php endforeach;?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>                                                                                                                
                                                        </div>

                                                        <div class="rectangle">
                                                            <div class="row">
                                                                <div class="form-group mt-18">
                                                                    <label class="col-md-4 control-label">Goal</label>
                                                                    <div class="col-md-6">
                                                                        <select class="form-control" name="goal">
                                                                            <?php foreach ($goals as $key => $goal) :?>
                                                                            <option value="<?=$goal->goal_id?>"><?=$goal->name?></option>
                                                                            <?php endforeach;?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>                                                                                                                
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-md-4 control-label">Total Daily Calories</label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control" name="tdcal" readonly>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="button" class="btn btn-info calculate pull-right" value="Calculate">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab_1_2">
                                                        <div class="rectangle">
                                                            <h4 class="middle font-blue-chambray font-lg sbold">Daily Macros</h4>
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label">Protein</label>
                                                                    <div class="col-md-6">
                                                                        <input type="text" name="profileProtein" class="form-control" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label">Fat</label>
                                                                    <div class="col-md-6">
                                                                        <input type="text" name="profileFat" class="form-control" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label">Carbohydrate</label>
                                                                    <div class="col-md-6">
                                                                        <input type="text" name="profileCarbs" class="form-control" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>                                                                                                                
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab_1_3">
                                                        <div class="rectangle">
                                                            <h4 class="middle font-blue-chambray font-lg sbold">Choose Nutritional Preferences</h4>
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label">Diet Type</label>
                                                                    <div class="col-md-6">
                                                                        <select class="form-control diet-select">
                                                                            <?php foreach ($diet_types as $key => $diet_type) :?>
                                                                            <option value="<?=$diet_type->diet_id?>"><?=$diet_type->dietType?></option>
                                                                            <?php endforeach;?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th> Name </th>
                                                                                <th> Delete </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="diet-field">
                                                                            
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="margin-top:20px; margin-bottom:20px;">
                                                    <input type="button" class="btn btn-danger back_btn" value="Back to FoodBank">
                                                    <input type="button" class="btn green pull-right next_btn" value="Next">
                                                </div>
                                            </form>                                                                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Create Profile FORM -->
                    </div>
                  </div>
                </div>

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
        <script src="/getfit/assets/Scripts/user/profile.js" type="text/javascript"></script>

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


