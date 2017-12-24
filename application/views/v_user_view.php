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
                        <!-- Default box -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title"><label>User Master</label></h3>
                                 <a href="<?php echo site_url("user/add_user") ?>" class="btn btn-primary pull-right" role="button"><span class="glyphicon glyphicon-plus"></span><label>Add records</label></a> 
                                        &nbsp; <a href="<?php echo site_url("user/import") ?>" class="btn btn-primary pull-right" role="button"><span class="glyphicon glyphicon-import"></span><label>Imports</label></a>
                               
                            </div>
                            
                        
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>user_id</th>
                                                <th>first_name</th>
                                                <th>last__name</th>
                                                <th>country</th>
                                                <th>state</th>
                                                <th>city</th>
                                                <th>pincode</th>
                                                <th>email</th>
                                                <th>mobile</th>
                                                <th>password</th>
                                                <th>status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?PHP
                                            foreach ($user_list as $user) {
                                                ?>
                                                <tr>
                                                    <td><?PHP echo $user->user_id ?> </td>
                                                    <td><?PHP echo $user->first_name ?></td>
                                                    <td><?PHP echo $user->last_name ?></td>
                                                    <td><?PHP echo $user->country ?></td>
                                                    <td><?PHP echo $user->state ?></td>
                                                    <td><?PHP echo $user->city ?></td>
                                                    <td><?PHP echo $user->pincode ?></td>
                                                    <td><?PHP echo $user->email ?></td>
                                                    <td><?PHP echo $user->mobile ?></td>
                                                    <td><?PHP echo $user->password ?></td>
                                                    <td><?php
                                                        if ($user->status == '0') {
                                                            ?>
                                                            <a href="<?php echo site_url("user/update_status_active/$user->user_id") ?>" class="btn btn-success" role="button"><label>Active</label></a>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <a href="<?php echo site_url("user/update_status_deactive/$user->user_id") ?>" class="btn btn-danger" role="button"><label>Deactive</label></a>
                                                            <?php
                                                        }
                                                        ?></td>
                                                    <?PHP
                                                }
                                                ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                        </div>
                        <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </section>

                </section>

                <!-- Main content -->
                <!-- /.content -->
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
