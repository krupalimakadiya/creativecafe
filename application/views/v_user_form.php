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
                    <!-- Default box -->
                    <div class="box box-info">
                        <div class="box-header with-border box-primary" >
                            <h3 class="box-title"><label>User Master</label></h3>

                            <a href="<?php echo site_url("user/view_user") ?>" class="btn btn-primary pull-right">
                                <label class="fa fa-plus label-btn-icon"></label>
                                &nbsp;<label class="label-btn-fonts">View Records</label>
                            </a>
                        </div>
                        <div class="box-body">
                            <form role="form">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>First name</label>
                                    <input type="text" class="form-control" placeholder="Enter your first name...">
                                </div>
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input type="text" class="form-control" placeholder="Enter your last name...">
                                </div>


                                <!-- select -->
                                <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>State</label>
                                    <select class="form-control">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>City</label>
                                    <select class="form-control">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Pincode</label>
                                    <input type="text" class="form-control" placeholder="Enter your pincode...">
                                </div>
                                <div class="form-group">
                                    <label>Email ID</label>
                                    <input type="text" class="form-control" placeholder="Enter your email...">
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control" placeholder="Enter your mobile number...">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Enter your password...">
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
