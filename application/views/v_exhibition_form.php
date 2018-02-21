<!DOCTYPE html>
<html>
    <head>
        <?php
        include('admin/header_include.php');
        ?>

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <?php
                include('admin/header_body.php');
                ?>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <?php
                include('admin/header_body_aside.php');
                ?>
            </aside>


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">

                    <section class="content">
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- /.box -->

                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><label> Exhibition Master</label></h3>
                                        <a href="<?php echo site_url("exhibition/view_exhibition") ?>" class="btn btn-primary pull-right">
                                            <label class="fa fa-icon label-btn-icon"></label>
                                            &nbsp;<label class="label-btn-fonts">View Records</label>
                                        </a>
                                    </div>
                                    <!-- /.box-header -->

                                    <?php
                                    echo $this->session->flashdata('message');
                                    ?>
                                    <div class="box-body">
                                        <?php
                                        if (isset($update_data)) {
                                            ?>
                                            <form role="form" name="exhibitionfrm" method="POST" action="<?php echo site_url("exhibition/editp") ?>">
                                                <!-- text input -->
                                                <input type="hidden" class="form-control" name="exhibition_id" value="<?php echo $update_data['exhibition_id'] ?>">

                                                <div class="form-group">
                                                    <label> Exhibition Title: </label>
                                                    <input type="text" class="form-control" name="title" value="<?php echo $update_data['title'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Description:</label>
                                                    <textarea id="editor1" name="description" rows="10" cols="80" >
                                                        <?php echo $update_data['description'] ?>
                                                    </textarea>             
                                                </div>
                                                <div class="bootstrap-timepicker">
                                                    <div class="form-group">
                                                        <label>Starting Time picker:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-clock-o"></i>
                                                            </div>  
                                                            <input type="text" class="form-control timepicker" name="starting_time" value="<?php echo $update_data['starting_time'] ?>">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                    <!-- /.form group -->
                                                </div>
                                                <div class="bootstrap-timepicker">
                                                    <div class="form-group">
                                                        <label>End Time picker:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-clock-o"></i>
                                                            </div>
                                                            <input type="text" class="form-control timepicker" name="end_time" value="<?php echo $update_data['end_time'] ?>">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                    <!-- /.form group -->
                                                </div>
                                                <div class="form-group">
                                                    <label>Date range:</label>

                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" class="form-control pull-right" id="reservation" name="date"   value="<?php echo $update_data['date'] ?>">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>

                                                <div class="form-group">
                                                    <label> Fees:</label>
                                                    <input type="text" class="form-control" name="fees" placeholder="Enter fees..." value="<?php echo $update_data['fees'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label> Address:</label>
                                                    <textarea class="form-control" name="address" placeholder="Enter your address..." rows="5" cols="40"><?php echo $update_data['address'] ?></textarea>
                                                </div>
                                                


                                                <div class="form-group">
                                                    <button type="submit" name="submit" class="btn btn-primary">submit
                                                    </button>
                                                </div>
                                            </form>
                                            <?php
                                        } else {
                                            ?>
                                            <form role="form" name="exhibitionfrm" method="POST" action="<?php echo site_url("exhibition/addp") ?>">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>  Exhibition Title:</label>
                                                    <input type="text" class="form-control" name="title" placeholder="Enter your exhibition title...">
                                                </div>
                                                <div class="form-group">
                                                    <label>Description:</label>
                                                    <textarea id="editor1" name="description" rows="10" cols="80">
                                                                                    This is my textarea to be replaced with CKEditor.
                                                    </textarea>             
                                                </div>
                                                <div class="bootstrap-timepicker">
                                                    <div class="form-group">
                                                        <label>Starting Time picker:</label>
                                                        <div class="input-group">


                                                            <div class="input-group-addon">
                                                                <i class="fa fa-clock-o"></i>
                                                            </div>
                                                            <input type="text" class="form-control timepicker" name="starting_time">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                    <!-- /.form group -->
                                                </div>
                                                <div class="bootstrap-timepicker">
                                                    <div class="form-group">
                                                        <label>End Time picker:</label>
                                                        <div class="input-group">


                                                            <div class="input-group-addon">
                                                                <i class="fa fa-clock-o"></i>
                                                            </div>
                                                            <input type="text" class="form-control timepicker" name="end_time">
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                    <!-- /.form group -->
                                                </div>
                                                <!-- Date range -->
                                                <div class="form-group">
                                                    <label>Date range:</label>

                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" class="form-control pull-right" id="reservation" name="date">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                                <!-- time Picker -->


                                                <!-- /.input group -->

                                                <!-- /.form group -->
                                                <div class="form-group">
                                                    <label> Fees:</label>
                                                    <input type="text" class="form-control" name="fees" placeholder="Enter fees...">
                                                </div>
                                                <div class="form-group">
                                                    <label> Address:</label>
                                                    <textarea class="form-control" name="address" placeholder="Enter your address..." rows="5" cols="40"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="submit" class="btn btn-primary">submit
                                                    </button>
                                                </div>
                                            </form> 

                                            <?php
                                        }
                                        ?>
                                    </div> </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->

                    </section>

                    <!-- Main content -->
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <?php
                include('admin/footer_body.php');
                ?>
            </footer>


            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        <?php
        include('admin/footer_include.php');
        ?>
        <!-- Page script -->
        <script>
            $(function () {
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'})
                //Date range picker
                $('#reservation').daterangepicker()
                //Date picker
                $('#datepicker').datepicker({
                    autoclose: true
                })
                //Timepicker
                $('.timepicker').timepicker({
                    showInputs: false
                })
            })
        </script>

    </body>
</html>
