<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "inc_core/head.php"; ?>    
        <link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.css">
        <title>CatEye</title>
    </head>
    <body>
        <div class="dashboard-pages user-transactions-page">
            <?php include "inc_core/header.php"; ?> 
            <div class="dashboard-body-wrapp clearfix">
                <?php include "inc_core/left_sidebar.php"; ?> 
                <div class="dashboad-body">
                    <div class="add-schedules">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                            <div class="text-right well-sm">
                                <button type="submit" class="btn btn-sm btn-green">Import CSV</button>
                            </div>
</div></div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="">
                                    <div class="dashboard-body-functions  clearfix">
                                        <ul class="alert_menu list-unstyled">
                                            <li>
                                                <a href="#alert_modal" data-toggle="modal" data-target="#alert_modal"><span class="fa fa-plus-circle"></span> Alert Setup</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="dashboard-body-main">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-gradient log-errors-table">
                                                <thead>
                                                    <tr>
                                                        <th>My Schedules</th>
                                                        <th>Edit/Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Alert 1
                                                        </td>
                                                        <td>
                                                            <a href="" class="btn btn-icon fa fa-pencil"></a> 
                                                            <a href="" class="btn btn-icon fa fa-trash-o"></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Alert 2
                                                        </td>
                                                        <td>
                                                            <a href="" class="btn btn-icon fa fa-pencil"></a> 
                                                            <a href="" class="btn btn-icon fa fa-trash-o"></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Alert 3
                                                        </td>
                                                        <td>
                                                            <a href="" class="btn btn-icon fa fa-pencil"></a> 
                                                            <a href="" class="btn btn-icon fa fa-trash-o"></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Alert 4
                                                        </td>
                                                        <td>
                                                            <a href="" class="btn btn-icon fa fa-pencil"></a> 
                                                            <a href="" class="btn btn-icon fa fa-trash-o"></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Alert 5
                                                        </td>
                                                        <td>
                                                            <a href="" class="btn btn-icon fa fa-pencil"></a> 
                                                            <a href="" class="btn btn-icon fa fa-trash-o"></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="">
                                    <div class="dashboard-body-functions  clearfix">
                                        <ul class="alert_menu list-unstyled">
                                            <li>
                                                <a href="#schedules_modal" data-toggle="modal" data-target="#schedules_modal"><span class="fa fa-plus-circle"></span> Add Schedules</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="dashboard-body-main">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-gradient log-errors-table">
                                                <thead>
                                                    <tr>
                                                        <th>My Schedules</th>
                                                        <th>Edit/Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Business Hours
                                                        </td>
                                                        <td>
                                                            <a href="" class="btn btn-icon fa fa-pencil"></a> 
                                                            <a href="" class="btn btn-icon fa fa-trash-o"></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            24x7
                                                        </td>
                                                        <td>
                                                            <a href="" class="btn btn-icon fa fa-pencil"></a> 
                                                            <a href="" class="btn btn-icon fa fa-trash-o"></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="dashboard-body-functions  clearfix space40">
                                        <ul class="alert_menu list-unstyled">
                                            <li>
                                                <a href="#notification_modal" data-toggle="modal" data-target="#notification_modal"><span class="fa fa-plus-circle"></span> Add Notification Type</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="dashboard-body-main">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-gradient log-errors-table">
                                                <thead>
                                                    <tr>
                                                        <th>My Notification</th>
                                                        <th>Edit/Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Email CNC
                                                        </td>
                                                        <td>
                                                            <a href="" class="btn btn-icon fa fa-pencil"></a> 
                                                            <a href="" class="btn btn-icon fa fa-trash-o"></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Email_DBSs
                                                        </td>
                                                        <td>
                                                            <a href="" class="btn btn-icon fa fa-pencil"></a> 
                                                            <a href="" class="btn btn-icon fa fa-trash-o"></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-header dashboard-footer">
            </div>
        </div>

        <!-- Add Schedules-modal -->
        <div class="modal fade sch_modal" id="schedules_modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Schedules</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="" method="post">
                                    <h3 class="sch_title">Schedule Name</h3>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group row">
                                                <label class="col-md-2 col-sm-3 control-label space10">Name</label>
                                                <div class="col-md-10 col-sm-9">
                                                    <input type="text" class="form-control" name="">    
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>

                                    <h3 class="sch_title space30">Scheduled Run</h3>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="sch_set_box">
                                                <h4 class="sch_subtitle">Start</h4>
                                                <ul class="list-unstyled">
                                                    <li>                                                    
                                                        <div class="radio ctm_radio sch_calander_radio">
                                                            <input type="radio" name="start_radio" id="startOn_calander">
                                                            <label for="startOn_calander">Start on</label>
                                                        </div>
                                                        <div id="start_calander" class="sch_calander"></div>
                                                    </li>
                                                    <li>                                 
                                                        <div class="radio ctm_radio">
                                                            <input type="radio" name="start_radio" id="now_calander">
                                                            <label for="now_calander">Now</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="sch_set_box">
                                                <h4 class="sch_subtitle">End</h4>
                                                <ul class="list-unstyled">
                                                    <li>                                                    
                                                        <div class="radio ctm_radio sch_calander_radio">
                                                            <input type="radio" name="end_radio" id="end_by_cal_rdo">
                                                            <label for="end_by_cal_rdo">End by</label>
                                                        </div>
                                                        <div id="end_calander" class="sch_calander"></div>
                                                    </li>
                                                    <li>                                 
                                                        <div class="radio ctm_radio sch_inline">
                                                            <input type="radio" name="end_radio" id="end_after_rdo">
                                                            <label for="end_after_rdo">End after</label>
                                                        </div>
                                                        <div class="sch_inline">
                                                            <input type="text" class="form-control" id="end_after_input">
                                                        </div>
                                                        <div class="sch_inline">
                                                            <select class="form-control" id="end_after_occ">
                                                                <option>Occurrences</option>
                                                                <option>Occurrence 1</option>
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li>              
                                                        <div class="radio ctm_radio">
                                                            <input type="radio" name="end_radio" id="forever_rdo">
                                                            <label for="forever_rdo">Forever</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <h3 class="sch_title space30">Recurrence</h3>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="sch_recurrence_box">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-inline">
                                                            <label class="control-label">Every</label>
                                                            <input type="text" class="form-control sch_every_input" name="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <ul class="list-inline recurrence_every_chks space10">
                                                            <li>
                                                                <div class="checkbox cus_check">
                                                                    <input type="checkbox" name="" id="Recurrence_Seconds">
                                                                    <label for="Recurrence_Seconds">Seconds</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="checkbox cus_check">
                                                                    <input type="checkbox" name="" id="Recurrence_Minutes">
                                                                    <label for="Recurrence_Minutes">Minutes</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="checkbox cus_check">
                                                                    <input type="checkbox" name="" id="Recurrence_Hours">
                                                                    <label for="Recurrence_Hours">Hours</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="checkbox cus_check">
                                                                    <input type="checkbox" name="" id="Recurrence_Days">
                                                                    <label for="Recurrence_Days">Days</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="checkbox cus_check">
                                                                    <input type="checkbox" name="" id="Recurrence_Weeks">
                                                                    <label for="Recurrence_Weeks">Weeks</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="checkbox cus_check">
                                                                    <input type="checkbox" name="" id="Recurrence_Months">
                                                                    <label for="Recurrence_Months">Months</label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row space30">
                                                    <div class="col-sm-1">
                                                        <div class="form-inline">
                                                            <label class="control-label">On</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-11">
                                                        <ul class="list-inline recurrence_every_chks">
                                                            <li>
                                                                <div class="checkbox cus_check">
                                                                    <input type="checkbox" name="" id="Recurrence_Monday">
                                                                    <label for="Recurrence_Monday">Monday</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="checkbox cus_check">
                                                                    <input type="checkbox" name="" id="Recurrence_Tuesday">
                                                                    <label for="Recurrence_Tuesday">Tuesday</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="checkbox cus_check">
                                                                    <input type="checkbox" name="" id="Recurrence_Wednesday">
                                                                    <label for="Recurrence_Wednesday">Wednesday</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="checkbox cus_check">
                                                                    <input type="checkbox" name="" id="Recurrence_Thursday">
                                                                    <label for="Recurrence_Thursday">Thursday</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="checkbox cus_check">
                                                                    <input type="checkbox" name="" id="Recurrence_Friday">
                                                                    <label for="Recurrence_Friday">Friday</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="checkbox cus_check">
                                                                    <input type="checkbox" name="" id="Recurrence_Saturday">
                                                                    <label for="Recurrence_Saturday">Saturday</label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="checkbox cus_check">
                                                                    <input type="checkbox" name="" id="Recurrence_Sunday">
                                                                    <label for="Recurrence_Sunday">Sunday</label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 text-center space30">
                                            <button type="submit" class="btn btn-green btn-sm">Submit</button>
                                            <button type="reset" data-dismiss="modal" class="btn btn-default">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Add Schedules-modal -->

        <!-- Add Notification Type-modal -->
        <div class="modal fade transaction_detail_modal" id="notification_modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Notification Type</h4>
                    </div>
                    <div class="modal-body">
                        <p>Coming Soon</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Add Notification Type-modal -->

        <!-- Add/Edit Alert Dialogue Modal -->
        <div class="modal fade transaction_detail_modal" id="alert_modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add/Edit Alert Dialogue</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Alert Name</label>
                                        <input type="text" class="form-control" name="alert_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alert_type">Alert Type</label>
                                        <select class="form-control" id="alert_type" required>
                                            <option selected value="">Select Option</option>
                                            <option value="Business_Function">Business Function</option>
                                            <option value="Database_Queries">Database Queries</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Schedule</label>
                                        <select class="form-control" required>
                                            <option selected value="">Select Option</option>
                                            <option>24x7</option>
                                            <option>Business Hours</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Notification</label>
                                        <select class="form-control" required>
                                            <option selected value="">Select Option</option>
                                            <option>Email</option>
                                            <option>Email CNC </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="business_function" style="display: none;">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <hr>
                                        <h4>Business Function</h4>
                                    </div>
                                </div>
                                <div class="row space20">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Business Function</label>
                                            <select class="form-control">
                                                <option selected value="">Select Option</option>
                                                <option>Get Parent Address</option>
                                                <option>Update</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Select one or more:</label>
                                            <table class="table no-border">
                                                <tr>
                                                    <td>
                                                        <div class="checkbox cus_check">
                                                            <input type="checkbox" name="" id="response_time">
                                                            <label for="response_time">Response Time</label>
                                                        </div>
                                                    </td>
                                                    <td><input type="text" class="form-control" disabled name="" id="milliseconds"></td>
                                                    <td><label for="milliseconds">Milliseconds</label></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox cus_check">
                                                            <input type="checkbox" name="" id="ResponseTimeChange">
                                                            <label for="ResponseTimeChange">Response Time Change</label>
                                                        </div>
                                                    </td>
                                                    <td><input type="text" class="form-control" disabled name="" id="perAverage"></td>
                                                    <td><label for="perAverage">% of Average</label></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox cus_check">
                                                            <input type="checkbox" name="" id="return">
                                                            <label for="return">Return</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-inline">
                                                            <select class="form-control return-select" id="perReturnSelect" disabled>
                                                                <option>=</option>
                                                                <option><</option>
                                                                <option>></option>
                                                                <option>!=</option>
                                                            </select>
                                                            <input type="text" disabled class="form-control return-input" name="" id="perReturn">
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="database_queries" style="display: none;">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <hr>
                                        <h4>Database Queries</h4>
                                    </div>
                                </div>
                                <div class="row space20">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Select one or more:</label>
                                            <table class="table no-border">
                                                <tr>
                                                    <td>
                                                        <div class="checkbox cus_check">
                                                            <input type="checkbox" name="" id="db_Response_Time">
                                                            <label for="db_Response_Time">Response Time</label>
                                                        </div>
                                                    </td>
                                                    <td><input type="text" class="form-control" disabled name="" id="db_Milliseconds"></td>
                                                    <td><label>Milliseconds</label></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox cus_check">
                                                            <input type="checkbox" name="" id="db_Error_Code">
                                                            <label for="db_Error_Code">Error Code</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" id="db_Error_Code_Select" disabled>
                                                            <option>=</option>
                                                            <option><</option>
                                                            <option>></option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="checkbox cus_check">
                                                            <input type="checkbox" name="" id="Error_Return_Contains">
                                                            <label for="Error_Return_Contains">Error Return Contains</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" disabled name="" id="Error_Return_Contains_Input">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center space30">
                                <button type="submit" class="btn btn-sm btn-green">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include "inc_core/footer_scripts.php"; ?> 

        <script type="text/javascript">
            $(document).ready(function(){
                $('#alert_type').on('change', function() {
                    $changeVal = $('#alert_type').val();
                    // console.log($changeVal);
                    if($changeVal == 'Business_Function'){
                        $('#business_function').show();
                        $('#database_queries').hide();
                    }
                    else if($changeVal == 'Database_Queries'){
                        $('#database_queries').show();
                        $('#business_function').hide();
                    }
                    else {
                        $('#database_queries').hide();
                        $('#business_function').hide();
                    }
                });
            })
        </script>
        <script type="text/javascript">            
            $(document).ready(function(){
                $('#alert_type').on('change', function() {
                    $changeVal = $('#alert_type').val();
                    // console.log($changeVal);
                    if($changeVal == 'Business_Function'){
                        $('#business_function').show();
                        $('#database_queries').hide();
                    }
                    else if($changeVal == 'Database_Queries'){
                        $('#database_queries').show();
                        $('#business_function').hide();
                    }
                    else {
                        $('#database_queries').hide();
                        $('#business_function').hide();
                    }
                });
            }); 
        </script>
        <script type="text/javascript">            
            
            $('#db_Milliseconds').change(function(){
                if($('#db_Milliseconds').length){
                    // console.log('checked True')
                    $('#db_Response_Time').prop("checked", true);
                }
                else {
                    console.log('checked false')
                    $('#db_Response_Time').prop("checked", false);
                }
            });

            $('#db_Response_Time').change(function(){
                var isChecked = $('#db_Response_Time').is(':checked');

                if($('#db_Milliseconds').length && (!isChecked)) {
                    $('#db_Milliseconds').attr('disabled', 'true'); 
                }
                else if($('#db_Milliseconds').length && (isChecked)){
                    $('#db_Milliseconds').removeAttr('disabled', 'true');    
                }
            });            
            
            $('#db_Error_Code_Select').change(function(){
                if($('#db_Error_Code_Select').length){
                    // console.log('checked True')
                    $('#db_Error_Code').prop("checked", true);
                }
                else {
                    console.log('checked false')
                    $('#db_Error_Code').prop("checked", false);
                }
            });

            $('#db_Error_Code').change(function(){
                var isChecked = $('#db_Error_Code').is(':checked');

                if($('#db_Error_Code_Select').length && (!isChecked)) {
                    $('#db_Error_Code_Select').attr('disabled', 'true'); 
                }
                else if($('#db_Error_Code_Select').length && (isChecked)){
                    $('#db_Error_Code_Select').removeAttr('disabled', 'true');    
                }
            });           
            
            $('#Error_Return_Contains_Input').change(function(){
                if($('#Error_Return_Contains_Input').length){
                    // console.log('checked True')
                    $('#Error_Return_Contains').prop("checked", true);
                }
                else {
                    console.log('checked false')
                    $('#Error_Return_Contains').prop("checked", false);
                }
            });

            $('#Error_Return_Contains').change(function(){
                var isChecked = $('#Error_Return_Contains').is(':checked');

                if($('#Error_Return_Contains_Input').length && (!isChecked)) {
                    $('#Error_Return_Contains_Input').attr('disabled', 'true'); 
                }
                else if($('#Error_Return_Contains_Input').length && (isChecked)){
                    $('#Error_Return_Contains_Input').removeAttr('disabled', 'true');    
                }
            });
            
            
            
            
            $('#milliseconds').change(function(){
                if($('#milliseconds').length){
                    // console.log('checked True')
                    $('#response_time').prop("checked", true);
                }
                else {
                    console.log('checked false')
                    $('#response_time').prop("checked", false);
                }
            });

            $('#response_time').change(function(){
                var isChecked = $('#response_time').is(':checked');

                if($('#milliseconds').length && (!isChecked)) {
                    $('#milliseconds').attr('disabled', 'true'); 
                }
                else if($('#milliseconds').length && (isChecked)){
                    $('#milliseconds').removeAttr('disabled', 'true');    
                }
            });
            
            
            $('#perAverage').change(function(){
                if($('#perAverage').length){
                    // console.log('checked True')
                    $('#ResponseTimeChange').prop("checked", true);
                }
                else {
                    console.log('checked false')
                    $('#ResponseTimeChange').prop("checked", false);
                }
            });

            $('#ResponseTimeChange').change(function(){
                var isChecked = $('#ResponseTimeChange').is(':checked');

                if($('#perAverage').length && (!isChecked)) {
                    $('#perAverage').attr('disabled', 'true'); 
                }
                else if($('#perAverage').length && (isChecked)){
                    $('#perAverage').removeAttr('disabled', 'true');    
                }
            });
            
            
            $('#perReturn').change(function(){
                if($('#perReturn').length){
                    // console.log('checked True')
                    $('#return').prop("checked", true);
                }
                else {
                    console.log('checked false')
                    $('#return').prop("checked", false);
                }
            });

            $('#return').change(function(){
                var isChecked = $('#return').is(':checked');

                if($('#perReturn').length && (!isChecked)) {
                    $('#perReturn').attr('disabled', 'true');
                    $('#perReturnSelect').attr('disabled', 'true');  
                }
                else if($('#perReturn').length && (isChecked)){
                    $('#perReturn').removeAttr('disabled', 'true');
                    $('#perReturnSelect').removeAttr('disabled', 'true');                    
                }
            });
        </script>

        <!-- https://eonasdan.github.io/bootstrap-datetimepicker/ -->
        <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $('#start_calander').datetimepicker({
                    inline: true,
                    sideBySide: false
                });
                $('#end_calander').datetimepicker({
                    inline: true,
                    sideBySide: false
                });
            });
        </script>
    </body>
</html>