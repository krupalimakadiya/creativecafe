<!DOCTYPE html>
<html>
    <head>
        <?php
        include('header_include.php');
        ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <?php
                include('header_body.php');
                ?>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <?php
                include('header_body_aside.php');
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
                            <h3 class="box-title"><label>Country Master</label></h3>
                            <a href="<?php echo site_url("country/view_country") ?>" class="btn btn-primary pull-right">
                                <label class="fa fa-icon label-btn-icon"></label>
                                &nbsp;<label class="label-btn-fonts">View Records</label>
                            </a>
                        </div>
                                  <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>country name</label>
                                    <input type="text" class="form-control" placeholder="Enter your country name...">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary">submit
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </section>

                <!-- Main content -->
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <?php
                include('footer_body.php');
                ?>
            </footer>


            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        <?php
        include('footer_include.php');
        ?>
    </body>
</html>
