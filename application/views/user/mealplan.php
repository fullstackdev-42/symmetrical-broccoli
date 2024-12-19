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
                                                <div class="portlet light portlet-fit">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="icon-settings font-red"></i>
                                                            <span class="caption-subject font-red sbold uppercase"><?php echo $user_tab; ?></span>
                                                        </div>
                                                        <div class="caption pull-right">                                                           
                                                            <div class="btn-group">
                                                                <button class="btn green create-mealplan">Create MealPlan</button>
                                                            </div>
                                                            <div class="btn-group">
                                                                <button class="btn green delete-mealplan">Delete MealPlan</button>
                                                            </div>                                                            
                                                        </div>                                                        
                                                    </div>                    
                                                    <div class="portlet-body mealplan_flag" mealplan_flag="<?php echo $mealplan_flag; ?>" >
                                                    <?php if($mealplan_flag==true){ ?>
                                                        <div class="page-content-inner">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="profile-sidebar margin-top-30">
                                                                        <div class="profile-sidebar-portlet">
                                                                            <div class="profile-usermenu mealplan-menu">
                                                                                <ul class="nav">
                                                                                    <?php foreach ($mealplans as $key => $value) :?>
                                                                                        <li>
                                                                                            <a class="mealplan" mealplan_id="<?=$value->mealPlan_id?>"><?=$value->name?></a>
                                                                                        </li>
                                                                                    <?php endforeach;?>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-9 mealplan-content" hidden="true">
                                                                    <div class="tabbable-custom nav-justified">
                                                                        <ul class="nav nav-tabs nav-justified">
                                                                            <li class="active">
                                                                                <a href="#tab" data-toggle="tab" aria-expanded="true" dayofweek="Monday">Monday</a>
                                                                            </li>
                                                                            <li class="">
                                                                                <a href="#tab" data-toggle="tab" aria-expanded="false" dayofweek="Tuesday">Tuesday</a>
                                                                            </li>
                                                                            <li class="">
                                                                                <a href="#tab" data-toggle="tab" aria-expanded="false" dayofweek="Wednesday">Wednesday</a>
                                                                            </li>
                                                                            <li class="">
                                                                                <a href="#tab" data-toggle="tab" aria-expanded="false" dayofweek="Thursday">Thursday</a>
                                                                            </li>
                                                                            <li class="">
                                                                                <a href="#tab" data-toggle="tab" aria-expanded="false" dayofweek="Friday">Friday</a>
                                                                            </li>
                                                                            <li class="">
                                                                                <a href="#tab" data-toggle="tab" aria-expanded="false" dayofweek="Saturday">Saturday</a>
                                                                            </li>
                                                                            <li class="">
                                                                                <a href="#tab" data-toggle="tab" aria-expanded="false" dayofweek="Sunday">Sunday</a>
                                                                            </li>
                                                                        </ul>
                                                                        <div class="tab-content">
                                                                            <div class="tab-pane active" id="tab">
                                                                                <div class="row margin-0">
                                                                                    <div class="col-md-6 portlet box blue margin-0">
                                                                                        <div class="portlet-title">
                                                                                            <div class="caption font-size-30">
                                                                                                <i class="fa fa-bed font-size-40"></i>Breakfast</div>
                                                                                            <div class="tools padding-bottom-0">
                                                                                                <a class="delete_dailymealplan"><i class="fa fa-trash font-size-30 white"></i></a>
                                                                                                <a class="edit_dailymealplan dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-pencil font-size-30 white"></i></a>
                                                                                                <div class="dropdown-menu pull-right top-40 hold-on-click">
                                                                                                    <select name="meal_id" category="breakfast" class="theme-setting theme-setting-style form-control input-sm input-small input-inline">
                                                                                                        <option value="0">Choose A Meal</option>                                                                                                        
                                                                                                    </select></br>
                                                                                                    <button class="btn green save">Save</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="portlet-body breakfast row margin-0 padding-10">
                                                                                            <div class="exist" category="breakfast">
                                                                                                <div class="col-md-5 padding-left-0">
                                                                                                    <img src="" class="meal-image" alt="Image does not exist.">
                                                                                                    <div class="detail-btn">
                                                                                                        <button class="btn btn-danger detail" meal_id="">SEE MORE</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-7 meal-info">
                                                                                                    <h2 class="name uppercase"></h2>
                                                                                                    <h3 class="sbold">Protein: <span class="protein bold"></span></h3>
                                                                                                    <h3 class="sbold">Fat: <span class="fat bold"></span></h3>
                                                                                                    <h3 class="sbold">Carbs: <span class="carbs bold"></span></h3>
                                                                                                    <h3 class="sbold">Cal: <span class="cal bold"></span></h3>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="not-exist center">
                                                                                                <h2>Daily mealplan doesn't exist. Please select a meal.</h2>
                                                                                            </div>                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6 portlet box blue margin-0">
                                                                                        <div class="portlet-title">
                                                                                            <div class="caption font-size-30">
                                                                                                <i class="fa fa-bed font-size-40"></i>Dinner</div>
                                                                                            <div class="tools padding-bottom-0">
                                                                                                <a class="delete_dailymealplan"><i class="fa fa-trash font-size-30 white"></i></a>
                                                                                                <a class="edit_dailymealplan dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-pencil font-size-30 white"></i></a>
                                                                                                <div class="dropdown-menu pull-right top-40 hold-on-click">
                                                                                                    <select name="meal_id" category="dinner" class="theme-setting theme-setting-style form-control input-sm input-small input-inline">
                                                                                                        <option value="0">Choose A Meal</option>
                                                                                                    </select></br>
                                                                                                    <button class="btn green save">Save</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="portlet-body dinner row margin-0 padding-10">
                                                                                            <div class="exist" category="dinner">
                                                                                                <div class="col-md-5 padding-left-0">
                                                                                                    <img src="" class="meal-image" alt="Image does not exist.">
                                                                                                    <div class="detail-btn">
                                                                                                        <button class="btn btn-danger detail" meal_id="">SEE MORE</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-7 meal-info">
                                                                                                    <h2 class="name uppercase"></h2>
                                                                                                    <h3 class="sbold">Protein: <span class="protein bold"></span></h3>
                                                                                                    <h3 class="sbold">Fat: <span class="fat bold"></span></h3>
                                                                                                    <h3 class="sbold">Carbs: <span class="carbs bold"></span></h3>
                                                                                                    <h3 class="sbold">Cal: <span class="cal bold"></span></h3>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="not-exist center">
                                                                                                <h2>Daily mealplan doesn't exist. Please select a meal.</h2>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row margin-0">
                                                                                    <div class="col-md-6 portlet box blue margin-0">
                                                                                        <div class="portlet-title">
                                                                                            <div class="caption font-size-30">
                                                                                                <i class="fa fa-bed font-size-40"></i>Lunch</div>
                                                                                            <div class="tools padding-bottom-0">
                                                                                                <a class="delete_dailymealplan"><i class="fa fa-trash font-size-30 white"></i></a>
                                                                                                <a class="edit_dailymealplan dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-pencil font-size-30 white"></i></a>
                                                                                                <div class="dropdown-menu pull-right top-40 hold-on-click">
                                                                                                    <select name="meal_id" category="lunch" class="theme-setting theme-setting-style form-control input-sm input-small input-inline">
                                                                                                        <option value="0">Choose A Meal</option>
                                                                                                    </select></br>
                                                                                                    <button class="btn green save">Save</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="portlet-body lunch row margin-0 padding-10">
                                                                                            <div class="exist" category="lunch">
                                                                                                <div class="col-md-5 padding-left-0">
                                                                                                    <img src="" class="meal-image" alt="Image does not exist.">
                                                                                                    <div class="detail-btn">
                                                                                                        <button class="btn btn-danger detail" meal_id="">SEE MORE</button>
                                                                                                    </div>                                                                                                    
                                                                                                </div>
                                                                                                <div class="col-md-7 meal-info">
                                                                                                    <h2 class="name uppercase"></h2>
                                                                                                    <h3 class="sbold">Protein: <span class="protein bold"></span></h3>
                                                                                                    <h3 class="sbold">Fat: <span class="fat bold"></span></h3>
                                                                                                    <h3 class="sbold">Carbs: <span class="carbs bold"></span></h3>
                                                                                                    <h3 class="sbold">Cal: <span class="cal bold"></span></h3>                                                                                                    
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="not-exist center">
                                                                                                <h2>Daily mealplan doesn't exist. Please select a meal.</h2>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6 portlet box blue margin-0">
                                                                                        <div class="portlet-title">
                                                                                            <div class="caption font-size-30">
                                                                                                <i class="fa fa-bed font-size-40"></i>Snack</div>
                                                                                            <div class="tools padding-bottom-0">
                                                                                                <a class="delete_dailymealplan"><i class="fa fa-trash font-size-30 white"></i></a>
                                                                                                <a class="edit_dailymealplan dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-pencil font-size-30 white"></i></a>
                                                                                                <div class="dropdown-menu pull-right top-40 hold-on-click">
                                                                                                    <select name="meal_id" category="snack" class="theme-setting theme-setting-style form-control input-sm input-small input-inline">
                                                                                                        <option value="0">Choose A Meal</option>
                                                                                                    </select></br>
                                                                                                    <button class="btn green save">Save</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="portlet-body snack row margin-0 padding-10">
                                                                                            <div class="exist" category="snack">
                                                                                                <div class="col-md-5 padding-left-0">
                                                                                                    <img src="" class="meal-image" alt="Image does not exist.">
                                                                                                    <div class="detail-btn">
                                                                                                        <button class="btn btn-danger detail" meal_id="">SEE MORE</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-7 meal-info">
                                                                                                    <h2 class="name uppercase"></h2>
                                                                                                    <h3 class="sbold">Protein: <span class="protein bold"></span></h3>
                                                                                                    <h3 class="sbold">Fat: <span class="fat bold"></span></h3>
                                                                                                    <h3 class="sbold">Carbs: <span class="carbs bold"></span></h3>
                                                                                                    <h3 class="sbold">Cal: <span class="cal bold"></span></h3>                                                                                                    
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="not-exist center">
                                                                                                <h2>Daily mealplan doesn't exist. Please select a meal.</h2>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
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

            <div class="modal fade meal-detail-modal" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title">Recipe</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="content meal-id">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="" class="meal_image" alt="Image">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-45 meal-info">
                                    <h2 class="meal-name uppercase"></h2>
                                </div>
                            </div>
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
                                            </tr>
                                        </thead>
                                        <tbody class="meal-ingredient">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Method</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="method" rows="7"></textarea>
                                </div>
                            </div>
                        </div>                        
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade create-mealplan-modal" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Create MealPlan</h3>
                  </div>
                  <div class="modal-body">
                    <div class="content">
                        <!-- END Create mealplan FORM -->
                        <form id="create_mealplan_form" class="form-horizontal" role="form">
                            <div class="portlet box margin-bottom-0">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <label class="col-md-3 control-label">Name</label>
                                            <div class="col-md-9">
                                                <input type="text" name="name" class="form-control" placeholder="MealPlan">
                                            </div>
                                        </div>
                                        <div class="row margin-top-10">
                                            <label class="col-md-3 control-label">Description</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" placeholder="Please input the description about this mealplan" rows="5" name="desc"></textarea>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>                            
                                <div class="portlet-body">
                                    <div class="panel-group accordion" id="accordion3">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title bg-blue bg-font-blue font-lg sbold uppercase">
                                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1" aria-expanded="false"> Monday </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_3_1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body" dayofweek="monday">
                                                    <div class="col-md-6">
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Protein:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-protein form-control" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Fat:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-fat form-control" value="">
                                                            </div>
                                                        </div>                                                                                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Carbs:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-carbs form-control" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Cal:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-cal form-control" value="">
                                                            </div>
                                                        </div>                                                                                                                        
                                                    </div>                                                    
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Breakfast</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="breakfast" name="monday[1]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Lunch</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="lunch" name="monday[2]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Dinner</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="dinner" name="monday[3]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Snack</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="snack" name="monday[4]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title bg-blue bg-font-blue font-lg sbold uppercase">
                                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2" aria-expanded="false"> Tuesday </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_3_2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body" dayofweek="tuesday">
                                                    <div class="col-md-6">
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Protein:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-protein form-control" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Fat:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-fat form-control" value="">
                                                            </div>
                                                        </div>                                                                                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Carbs:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-carbs form-control" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Cal:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-cal form-control" value="">
                                                            </div>
                                                        </div>                                                                                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Breakfast</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="breakfast" name="tuesday[1]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Lunch</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="lunch" name="tuesday[2]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Dinner</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="dinner" name="tuesday[3]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Snack</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="snack" name="tuesday[4]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title bg-blue bg-font-blue font-lg sbold uppercase">
                                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_3" aria-expanded="false"> Wednesday </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_3_3" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body" dayofweek="wednesday">
                                                    <div class="col-md-6">
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Protein:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-protein form-control" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Fat:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-fat form-control" value="">
                                                            </div>
                                                        </div>                                                                                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Carbs:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-carbs form-control" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Cal:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-cal form-control" value="">
                                                            </div>
                                                        </div>                                                                                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Breakfast</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="breakfast"  name="wednesday[1]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Lunch</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="lunch" name="wednesday[2]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Dinner</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="dinner" name="wednesday[3]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Snack</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="snack" name="wednesday[4]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title bg-blue bg-font-blue font-lg sbold uppercase">
                                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_4" aria-expanded="false"> Thursday </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_3_4" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body" dayofweek="thursday">
                                                    <div class="col-md-6">
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Protein:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-protein form-control" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Fat:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-fat form-control" value="">
                                                            </div>
                                                        </div>                                                                                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Carbs:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-carbs form-control" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Cal:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-cal form-control" value="">
                                                            </div>
                                                        </div>                                                                                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Breakfast</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="breakfast" name="thursday[1]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Lunch</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="lunch" name="thursday[2]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Dinner</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="dinner" name="thursday[3]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Snack</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="snack" name="thursday[4]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title bg-blue bg-font-blue font-lg sbold uppercase">
                                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_5" aria-expanded="false"> Friday </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_3_5" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body" dayofweek="friday">
                                                    <div class="col-md-6">
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Protein:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-protein form-control" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Fat:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-fat form-control" value="">
                                                            </div>
                                                        </div>                                                                                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Carbs:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-carbs form-control" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Cal:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-cal form-control" value="">
                                                            </div>
                                                        </div>                                                                                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Breakfast</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="breakfast" name="friday[1]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Lunch</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="lunch" name="friday[2]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Dinner</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="dinner" name="friday[3]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Snack</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="snack" name="friday[4]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title bg-blue bg-font-blue font-lg sbold uppercase">
                                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_6" aria-expanded="false"> Saturday </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_3_6" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body" dayofweek="saturday">
                                                    <div class="col-md-6">
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Protein:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-protein form-control" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Fat:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-fat form-control" value="">
                                                            </div>
                                                        </div>                                                                                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Carbs:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-carbs form-control" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Cal:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-cal form-control" value="">
                                                            </div>
                                                        </div>                                                                                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Breakfast</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="breakfast" name="saturday[1]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Lunch</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="lunch" name="saturday[2]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Dinner</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="dinner" name="saturday[3]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Snack</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="snack" name="saturday[4]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title bg-blue bg-font-blue font-lg sbold uppercase">
                                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_7" aria-expanded="false"> Sunday </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_3_7" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body" dayofweek="sunday">
                                                    <div class="col-md-6">
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Protein:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-protein form-control" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Fat:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-fat form-control" value="">
                                                            </div>
                                                        </div>                                                                                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Carbs:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-carbs form-control" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-20">
                                                            <label class="control-label col-sm-6">Cal:</label>                                                                
                                                            <div class="col-sm-6">
                                                                <input type="text" readonly="true" class="r-cal form-control" value="">
                                                            </div>
                                                        </div>                                                                                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Breakfast</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="breakfast" name="sunday[1]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Lunch</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="lunch" name="sunday[2]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Dinner</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="dinner" name="sunday[3]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-8 margin-10">
                                                            <label class="col-md-3 control-label">Snack</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" category="snack" name="sunday[4]">
                                                                    <option value="0">Choose a Meal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" align="center">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <input type="button" class="btn green btn-block btn-lg create bold" value="CREATE">
                                        </div>
                                        <div class="col-md-4"></div>                                 
                                    </div>
                                </div>
                            </div>
                        </form>
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
        <script src="/getfit/assets/Scripts/user/mealplan.js" type="text/javascript"></script>

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


