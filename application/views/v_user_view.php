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
                                <p align="right">
                                    <a href="<?php echo site_url("user/add_user") ?>"><button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add records</button></a> &nbsp;
                                    <a href="<?php echo site_url("user/import") ?>"><button class="btn btn-primary"><i class="glyphicon glyphicon-import"></i>&nbsp;Imports</button></a> &nbsp;
                                    <a href="<?php echo site_url("user/export") ?>"><button class="btn btn-primary"><i class="glyphicon glyphicon-export"></i>&nbsp;Exports</button></a></p>
                            </div>


                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>First_name</th>
                                                <th>Last_name</th>
                                                <th>City</th>
                                                <th>Email</th>
                                               
                                                <th>Password</th>
                                                <th>Status</th>
                                                <th>Action</th>
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
                                                    <td><?PHP echo $user->city ?></td>
                                                    <td><?PHP echo $user->email ?></td>
                                                    <td><?PHP echo $user->password ?></td>
                                                    <td><?php
                                                        if ($user->status == '0') {
                                                            ?>
                                                            <i class="glyphicon glyphicon-ok" style="color:green" ></i>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <i class="glyphicon glyphicon-remove" style="color:red"></i>
                                                            <?php
                                                        }
                                                        ?></td>
                                                    <td> <div class="btn-group">
                                                            <button type="button" class="btn btn-primary">Action</button>

                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                                <span class="caret"></span> <!-- caret -->
                                                            </button>

                                                            <ul class="dropdown-menu" role="menu"> <!-- class dropdown-menu -->
                                                                <li>    <a href="<?php echo site_url("user/update_status_deactive/$user->user_id") ?>"><i class=" fa fa-search"></i><label>View</label></a></li>                     
                                                                <li>    <a href="<?php echo site_url("user/update_status_deactive/$user->user_id") ?>"><i class="fa fa-edit"></i><label>Edit</label></a></li>
                                                                <li>    <a href="<?php echo site_url("user/update_status_deactive/$user->user_id") ?>"><i class="fa fa-trash"></i><label>Delete</label></a></li>
                                                                <li class="divider"></li>
                                                                <li><?php
                                                                    if ($user->status == '0') {
                                                                        ?>
                                                                        <a href="<?php echo site_url("user/update_status_active/$user->user_id") ?>" class="btn btn-success">Active</a>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <a href="<?php echo site_url("user/update_status_deactive/$user->user_id") ?>" class="btn btn-danger">Deactive</a>
                                                                        <?php
                                                                    }
                                                                    ?></li>
                                                            </ul>
                                                        </div>
                                                    </td>
    <?PHP
}
?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <div class="btn-group">
                                                            <button type="button" class="btn btn-primary">Action</button>

                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                                <span class="caret"></span> <!-- caret -->
                                                            </button>

                                                            <ul class="dropdown-menu" role="menu"> <!-- class dropdown-menu -->
                                                                <li>    <a href="<?php echo site_url("user/update_status_deactive/$user->user_id") ?>"><i class=" fa fa-search"></i><label>Multiple Delete</label></a></li>                     
                                                                <li>    <a href="<?php echo site_url("user/update_status_deactive/$user->user_id") ?>"><i class="fa fa-edit"></i><label>Select All</label></a></li>
                                                                <li>    <a href="<?php echo site_url("user/update_status_deactive/$user->user_id") ?>"><i class="fa fa-trash"></i><label>Deselect All</label></a></li>
                                                               
                                                                </ul>
                                                        </div>
                                <p align="right"><i class="glyphicon glyphicon-ok" style="color:green" ></i>&nbsp;&nbsp;&nbsp;&nbsp;<label>Indicates Activated</label>
                                    <br/>
                                    <i class="glyphicon glyphicon-remove" style="color:red" ></i>&nbsp;<label>Indicates Deactivated</label>
                                                            </p>
                            </div>
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
