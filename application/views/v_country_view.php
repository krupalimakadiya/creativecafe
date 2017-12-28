<!DOCTYPE html>
<html>
    <head>
        <?php
        include('header_include.php');
        ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <p><?php echo $country['country_id']?></p><br/>
                        <p><?php echo $country['country_name']?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
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
                                <h3 class="box-title"><label>Country Master</label></h3>
                                <p align="right">
                                    <a href="<?php echo site_url("country/add_country") ?>"><button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add records</button></a> &nbsp;
                                    <a href="<?php echo site_url("country/import") ?>"><button class="btn btn-primary"><i class="glyphicon glyphicon-import"></i>&nbsp;Imports</button></a> &nbsp;
                                    <a href="<?php echo site_url("country/export") ?>"><button class="btn btn-primary"><i class="glyphicon glyphicon-export"></i>&nbsp;Exports</button></a></p>
                            </div>


                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Country Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?PHP
                                        foreach ($country_list as $country) {
                                            ?>
                                            <tr>
                                                <td><?PHP echo $country->country_id ?> </td>
                                                <td><?PHP echo $country->country_name ?></td>
                                                <td><?php
                                                    if ($country->status == '0') {
                                                        ?>
                                                        <i class="glyphicon glyphicon-remove" style="color:red"></i>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <i class="glyphicon glyphicon-ok" style="color:green" ></i>

                                                        <?php
                                                    }
                                                    ?></td>
                                                <td> <div class="dropdown">

                                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> Action
                                                            <span class="caret"></span> <!-- caret -->
                                                        </button>

                                                        <ul class="dropdown-menu" role="menu"> <!-- class dropdown-menu -->
                                                            <li> <a onclick="openView();"><i class="fa fa-search"></i><label>View</label></a> </li>                     
                                                            <li>    <a href="<?php echo site_url("country/edit_data/$country->country_id") ?>" onclick="return confirm('you want to edit...........')"><i class="fa fa-edit"></i><label>Edit</label></a></li>
                                                            <li>    <a href="<?php echo site_url("country/delete/$country->country_id") ?>" onclick="return confirm('you want to delete...........')"><i class="fa fa-trash"></i><label>Delete</label></a></li>
                                                            <li><?php
                                                                if ($country->status == '0') {
                                                                    ?>
                                                                    <a href="<?php echo site_url("country/update_status_active/$country->country_id") ?>"><i class="glyphicon glyphicon-ok" style="color:green"></i><label>Active</label></a>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <a href="<?php echo site_url("country/update_status_deactive/$country->country_id") ?>"><i class="glyphicon glyphicon-remove" style="color:red"></i><label>Deactive</label></a>
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
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Action</button>

                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span> <!-- caret -->
                                    </button>

                                    <ul class="dropdown-menu" role="menu"> <!-- class dropdown-menu -->
                                        <li>    <a href="<?php echo site_url("country/update_status_deactive/$country->country_id") ?>"><i class=" fa fa-search"></i><label>Multiple Delete</label></a></li>                     
                                        <li>    <a href="<?php echo site_url("country/update_status_deactive/$country->country_id") ?>"><i class="fa fa-edit"></i><label>Select All</label></a></li>
                                        <li>    <a href="<?php echo site_url("country/update_status_deactive/$country->country_id") ?>"><i class="fa fa-trash"></i><label>Deselect All</label></a></li>

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
        <script type="text/javascript">
            function openView() {
                $('#myModal').modal('show');
            }
        </script>
    </body>
</html>
