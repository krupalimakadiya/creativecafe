<!DOCTYPE html>
<html>
    <head>
        <?php
        $this->load->view('admin/header_include');
        ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <?php
                $this->load->view('admin/header_body');
                ?>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <?php
                $this->load->view('admin/header_body_aside');
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
                                        <h3 class="box-title"><label>Event Master</label></h3>
                                        <a href="<?php echo site_url("event/index") ?>" class="btn btn-primary pull-right">
                                            <label class="fa fa-icon label-btn-icon"></label>
                                            &nbsp;<label class="label-btn-fonts">View Records</label>
                                        </a>
                                    </div>
                                    <!-- /.box-header -->

                                    <div class="box-body">
                                        <?php
                                        if (isset($update_data)) {
                                            ?>
                                        <form role="form" name="eventfrm" method="POST" autocomplete="off" action="<?php echo site_url("event/editp") ?>" enctype="multipart/form-data">
                                                <!-- text input -->
                                                <input type="hidden" class="form-control" name="event_id" value="<?php echo $update_data['event_id'] ?>">

                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control" name="title" required="" value="<?php echo $update_data['title'] ?>">                                    
                                                </div>
                                                <div class="form-group">
                                                    <label>File</label>
                                                    <input type="file" class="form-control" name="file" required="">                                    
                                                </div>
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type="date" class="form-control" name="date" value="<?php echo $update_data['date'] ?>" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <input type="file" class="form-control" name="image" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea id="editor1" name="description" rows="10" cols="80" required="" value=""><?php echo $update_data['description'] ?>
                                                    </textarea>             
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" name="submit" class="btn btn-primary">submit
                                                    </button>
                                                </div>
                                            </form>
                                            <?php
                                        } else {
                                            ?>
                                        <form role="form" name="eventfrm" method="POST" autocomplete="off" action="<?php echo site_url("event/do_upload") ?>" enctype="multipart/form-data">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control" name="title" placeholder="Enter your News Title" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label>File</label>
                                                    <input type="file" class="form-control" name="file" required="">
                                                </div>

                                                <div class="form-group">
                                                    <label>Date:</label>
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" class="form-control pull-right" id="datepicker" name="date" required="">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <input type="file" class="form-control" name="image" required="">
                                                </div>

                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea id="editor1" name="description" rows="10" cols="80" required="">
                                                                This is my textarea to be replaced with CKEditor.
                                                    </textarea>             
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="submit" class="btn btn-primary">submit
                                                    </button>
                                                </div>
                                            </form>                            
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div></div></section></section>
                                <!-- Main content -->
                            </div>
                            <!-- /.content-wrapper -->
                            <footer class="main-footer">
                                <?php
                                $this->load->view('admin/footer_body');
                                ?>
                            </footer>
                            <!-- Add the sidebar's background. This div must be placed
                                 immediately after the control sidebar -->
                            <div class="control-sidebar-bg"></div>
                        </div>
                        <!-- ./wrapper -->
                        <?php
                        $this->load->view('admin/footer_include');
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
