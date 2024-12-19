                                                    <div class="portlet-body">
                                                        <div class="table-toolbar">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="btn-group">
                                                                        <button  id="add_ingredient" class="btn green"> Add New
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
                                                                    <th> Quantity</th>
                                                                    <th> Unit </th>
                                                                    <th> Edit </th>
                                                                    <th> Delete </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($ingredients as $key => $value) :?> <!-- how to get $ingredients sent from index function in admin/ingredient controller and how to access to the indivisuals-->
                                                                    <tr class="available" ingredient_id="<?=$value->ingredient_id?>">
                                                                        <td><?=$value->name?></td> <!-- $value will be an indivisual ingredient as foreach statement repeats -->
                                                                        <td><?=$value->protein?></td> <!-- thus, $value->protein will return protein amount -->
                                                                        <td><?=$value->carbs?></td>
                                                                        <td><?=$value->fat?></td>
                                                                        <td><?=$value->cal?></td>
                                                                        <td><?=$value->qty?></td>
                                                                        <td><?=$value->unit?></td>
                                                                        <td><a class="edit"><i class="fa fa-pencil"></i></a></td>
                                                                        <td><a class="delete_ingredient" ingredient_name="<?=$value->name?>" ingredient_id="<?=$value->ingredient_id?>"><i class="fa fa-trash"></i></a></td>
                                                                    </tr>
                                                                <?php endforeach;?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div id="ingredient_modal" class="modal fade" role="dialog">
                                                      <div class="modal-dialog modal-sm">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h3 class="modal-title">Add new Ingredient</h3>
                                                          </div>
                                                          <div class="modal-body">
                                                            <div class="content">
                                                                <!-- BEGIN REGISTRATION FORM -->
                                                                <form class="add-ingredient-form" method="post">
                                                                    <div class="form-group">
                                                                        <label class="control-label visible-ie8 visible-ie9">Name</label>
                                                                        <div class="input-icon">
                                                                            <i class="fa fa-font"></i>
                                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Name" name="name" /> </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label visible-ie8 visible-ie9">Protein</label>
                                                                        <div class="input-icon">
                                                                            <i class="fa fa-balance-scale"></i>
                                                                            <input class="form-control placeholder-no-fix" type="number" step="any" placeholder="Protein" name="protein" /> </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label visible-ie8 visible-ie9">Carbs</label>
                                                                        <div class="input-icon">
                                                                            <i class="fa fa-balance-scale"></i>
                                                                            <input class="form-control placeholder-no-fix" type="number" step="any" autocomplete="off" placeholder="Carbs" name="carbs" /> </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label visible-ie8 visible-ie9">Fat</label>
                                                                        <div class="input-icon">
                                                                            <i class="fa fa-balance-scale"></i>
                                                                            <input class="form-control placeholder-no-fix" type="number" step="any" autocomplete="off" placeholder="Fat" name="fat" /> </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label visible-ie8 visible-ie9">Calories</label>
                                                                        <div class="input-icon">
                                                                            <i class="fa fa-balance-scale"></i>
                                                                            <input class="form-control placeholder-no-fix" type="number" step="any"type="number" step="any" autocomplete="off" placeholder="Calories" name="cal" /> </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="control-label visible-ie8 visible-ie9">Quantity</label>
                                                                        <div class="input-icon">
                                                                            <i class="fa fa-balance-scale"></i>
                                                                            <input class="form-control placeholder-no-fix" type="number" step="any" autocomplete="off" placeholder="Quantity" name="quantity" /> </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="control-label visible-ie8 visible-ie9">Unit</label>
                                                                        <div class="input-icon">
                                                                            <i class="fa fa-spoon"></i>
                                                                            <select class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Unit" name="unit"> 
                                                                                <option>kilogram</option>
                                                                                <option>gram</option>
                                                                                <option>liter</option>
                                                                                <option>milliliter</option>
                                                                                <option>tablespoon</option>
                                                                                <option>teaspoon</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    
                                                                    <div class="form-actions">
                                                                        <button type="button" class="close_modal btn btn-danger" data-dismiss="modal">Close</button>                                                                   
                                                                        <button type="submit" class="btn green pull-right"> Add </button>
                                                                    </div>
                                                                </form>
                                                                <!-- END REGISTRATION FORM -->
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
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="/getfit/assets/Scripts/admin/ingredient.js" type="text/javascript"></script>
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


