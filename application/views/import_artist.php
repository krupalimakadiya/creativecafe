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
                            <h3 class="box-title"><label>Artist Master</label></h3>
                            </div>
                                  <!-- /.box-header -->
                                  
                                    <div class="box-body">                        
                                                   <form role="form" method="post" action="<?php echo site_url("artist/importp") ?>"  enctype="multipart/form-data">
        <!-- text input-->
                                <div class="form-group">
                                    <label>Upload File</label>
                                    <input type="file" class="form-control"  name="upload">
                                </div>
              
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary">Upload
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
    </body>
</html>
