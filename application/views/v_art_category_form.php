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
                                        <h3 class="box-title"><label> Art Category Master</label></h3>
                                        <a href="<?php echo site_url("art_category/view_art_category") ?>" class="btn btn-primary pull-right">
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
                                            <form role="form" name="categoryfrm" method="POST" action="<?php echo site_url("art_category/editp") ?>">
                                                <!-- text input -->
                                                <input type="hidden" class="form-control" name="art_category_id" value="<?php echo $update_data['art_category_id'] ?>">

                                                <div class="form-group">
                                                    <label>country name</label>
                                                    <input type="text" class="form-control" name="art_category_name" value="<?php echo $update_data['art_category_name'] ?>">

                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="submit" class="btn btn-primary">submit
                                                    </button>
                                                </div>
                                            </form>
                                            <?php
                                        } else {
                                            ?>
                                            <form role="form" name="categoryfrm" method="POST" action="<?php echo site_url("art_category/addp") ?>">
                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label> Art category name</label>
                                                    <input type="text" class="form-control" name="art_category_name" placeholder="Enter your art  name...">
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

                                </section>

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
                        </body>
                        </html>
