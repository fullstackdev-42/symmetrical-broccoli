                                                    <div class="portlet-body">
                                                        <div class="table-toolbar">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="btn-group">
                                                                        <button  id="add_meal" class="btn green"> Add New
                                                                            <i class="fa fa-plus"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                                            <thead>
                                                                <tr>
                                                                    <th> Name </th>
                                                                    <th> Protein </th>
                                                                    <th> Carbs </th>
                                                                    <th> Fat </th>
                                                                    <th> Calories </th>
                                                                    <th> Edit </th>
                                                                    <th> Delete </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($meals as $key => $value) :?>
                                                                    <tr class="available" meal_id="<?=$value->meal_id?>">
                                                                        <td><?=$value->name?></td>
                                                                        <td><?=$value->totalP?></td>
                                                                        <td><?=$value->totalC?></td>
                                                                        <td><?=$value->totalF?></td>
                                                                        <td><?=$value->totalCal?></td>
                                                                        <td><a class="edit" meal_name="<?=$value->name?>" meal_id="<?=$value->meal_id?>"><i class="fa fa-pencil"></i></a></td>
                                                                        <td><a class="delete_meal" meal_name="<?=$value->name?>" meal_id="<?=$value->meal_id?>"><i class="fa fa-trash"></i></a></td>
                                                                    </tr>
                                                                <?php endforeach;?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div id="meal_add_modal" class="modal fade" role="dialog">
                                                      <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h3 class="modal-title">Add new Meal</h3>
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
                                                                                <div class="portlet-title tabbable-line">
                                                                                    <ul class="nav nav-tabs">
                                                                                        <li class="active">
                                                                                            <a href="#tab_1_1" data-toggle="tab">Step 1</a>
                                                                                        </li>
                                                                                        <li>
                                                                                            <a href="#tab_1_2" data-toggle="tab">Step 2</a>
                                                                                        </li>
                                                                                        <li>
                                                                                            <a href="#tab_1_3" data-toggle="tab">Step 3</a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                                <div class="portlet-body">
                                                                                    <!-- BEGIN ADD MEAL FORM -->
                                                                                    <form id="add_meal_form" class="form-horizontal" role=form enctype="multipart/form-data">
                                                                                        <div class="tab-content">
                                                                                            <div class="tab-pane active" id="tab_1_1">
                                                                                                <div class="form-group">
                                                                                                    <label class="col-md-3 control-label">Name</label>
                                                                                                    <div class="col-md-9">
                                                                                                        <input type="text" name="name" class="form-control" placeholder="Name">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <label class="col-md-3 control-label">Category</label>
                                                                                                    <div class="col-md-9">
                                                                                                        <select class="form-control" name="category_id">
                                                                                                            <?php foreach ($categories as $key => $category) :?>
                                                                                                            <option value="<?=$category->category_id?>"><?=$category->catType?></option>
                                                                                                            <?php endforeach;?>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <label class="col-md-3 control-label">Diet Type</label>
                                                                                                    <div class="col-md-9">
                                                                                                        <select class="form-control diet-select">
                                                                                                            <?php foreach ($diet_types as $key => $diet_type) :?>
                                                                                                            <option value="<?=$diet_type->diet_id?>"><?=$diet_type->dietType?></option>
                                                                                                            <?php endforeach;?>
                                                                                                        </select>
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
                                                                                            <div class="tab-pane" id="tab_1_2">
                                                                                                <div class="form-group">
                                                                                                    <label class="col-md-3 control-label">Ingredients</label>
                                                                                                    <div class="col-md-9">
                                                                                                        <select class="form-control" id="select_ingredient">
                                                                                                            <?php foreach ($ingredients as $key => $ingredient) :?>
                                                                                                            <option value="<?=$ingredient->ingredient_id?>"><?=$ingredient->name?></option>
                                                                                                            <?php endforeach;?>
                                                                                                        </select>                                                                                                        
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <div class="table-responsive">
                                                                                                        <table class="table table-bordered">
                                                                                                            <thead>
                                                                                                                <tr>
                                                                                                                    <th> Name </th>
                                                                                                                    <th> Protein </th>
                                                                                                                    <th> Carbs </th>
                                                                                                                    <th> Fat </th>
                                                                                                                    <th> Calories </th>
                                                                                                                    <th> Quantity </th>
                                                                                                                    <th> Unit </th>
                                                                                                                    <th> Delete </th>
                                                                                                                </tr>
                                                                                                            </thead>
                                                                                                            <tbody id="meal_ingredient">
                                                                                                                
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane" id="tab_1_3">
                                                                                                <div class="form-group">
                                                                                                    <label class="col-md-2 control-label">Method</label>
                                                                                                    <div class="col-md-10">
                                                                                                        <textarea class="form-control" name="method" rows="7"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group">
                                                                                                    <label class="col-md-2 control-label">Image</label>
                                                                                                    <div class="col-md-10">
                                                                                                        <input type="file" name="meal_image" class="form-control">
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
                                                                <!-- END ADD MEAL FORM -->
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
            <!-- Edit Meal Modal -->
            <div id="meal_edit_modal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Edit Meal</h3>
                  </div>
                  <div class="modal-body">
                    <form id="meal_edit_form" class="form-horizontal" role=form enctype="multipart/form-data">
                        <div class="content meal-id" meal_id="">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="" class="meal_image" alt="Image">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-45">
                                        <label class="col-md-4 control-label">Name</label>
                                        <div class="col-md-8">
                                           <input type="text" name="name" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Image</label>
                                        <div class="col-md-8">
                                            <input type="file" name="meal_image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group" hidden="true">                                        
                                        <div class="col-md-8">
                                            <input type="text" name="upload_flag" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Category</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="category_id">
                                                <?php foreach ($categories as $key => $category) :?>
                                                <option value="<?=$category->category_id?>"><?=$category->catType?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>                                                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Diet Type</label>
                                        <div class="col-md-8">
                                            <select class="form-control diet-select">
                                                <?php foreach ($diet_types as $key => $diet_type) :?>
                                                <option value="<?=$diet_type->diet_id?>"><?=$diet_type->dietType?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>                                
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="form-group col-md-8">
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
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Ingredients</label>
                                        <div class="col-md-8">
                                            <select class="form-control edit-ingredient">
                                                <?php foreach ($ingredients as $key => $ingredient) :?>
                                                <option value="<?=$ingredient->ingredient_id?>"><?=$ingredient->name?></option>
                                                <?php endforeach;?>
                                            </select>                                                                                                        
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> Name </th>
                                                    <th> Protein </th>
                                                    <th> Carbs </th>
                                                    <th> Fat </th>
                                                    <th> Calories </th>
                                                    <th> Quantity </th>
                                                    <th> Unit </th>
                                                    <th> Delete </th>
                                                </tr>
                                            </thead>
                                            <tbody class="meal-ingredient">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Method</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="method" rows="7"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn green save" >Save</button>
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Edit Meal Modal -->
            
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
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="/getfit/assets/Scripts/admin/meal.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="/getfit/assets/Scripts/layout.min.js" type="text/javascript"></script>
        <script src="/getfit/assets/Scripts/demo.min.js" type="text/javascript"></script>
        <script src="/getfit/assets/Scripts/admin.js" type="text/javascript"></script>

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


