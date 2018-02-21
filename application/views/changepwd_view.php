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
   <?php
                echo $this->session->flashdata('message');
                ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title"><label>Change Password</label></h3>
                        </div>

                        <div class="box-body">
                        <form action="<?php echo site_url('changepwd/changepass') ?>" method="post" name="changepwdfrm" role="form">
         
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" class="form-control" name="oldpwd" placeholder="enter your old password"  >
                                    </div>

                            <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" class="form-control" name="newpwd" placeholder="enter your new password"  >
                                    </div>
                            
                            <div class="form-group">
                                        <label>Confirm New Password</label>
                                        <input type="password" class="form-control" name="confirmpwd" placeholder="enter your new confirm password"  >
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" value="submit">Submit</button>
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

