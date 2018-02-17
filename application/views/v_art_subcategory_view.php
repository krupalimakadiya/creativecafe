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
                        <!-- Default box -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title"><label>Art Subcategory Master</label></h3>
                                <p align="right">
                                    <a href="<?php echo site_url("art_subcategory/add_art_subcategory") ?>"><button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add records</button></a> &nbsp;
                                    <a href="<?php echo site_url("art_subcategory/import_art_subcategory") ?>"><button class="btn btn-primary"><i class="glyphicon glyphicon-import"></i>&nbsp;Imports</button></a> &nbsp;
                                    <a href="<?php echo site_url("art_subcategory/export") ?>"><button class="btn btn-primary"><i class="glyphicon glyphicon-export"></i>&nbsp;Exports</button></a></p>

                                <?php
                                $message = $this->session->flashdata('message');
                                $success = $this->session->flashdata('success');
                                $fail = $this->session->flashdata('fail');
                                
                                if (isset($message)) {
                                    if ($message != ' ') {
                                        ?>
                                        <div class="alert alert-success">       <!--green model-->
                                            <span class="semibold">Note:</span>&nbsp;&nbsp;
                                            <?= $message ?>
                                        </div>
                                        <?php
                                    }
                                }
                                if (isset($success)) {
                                    if ($success != ' ') {
                                        ?>
                                        <div class="alert alert-success">       <!--green model-->
                                            <span class="semibold">Note:</span>&nbsp;&nbsp;
                                            <?= $success ?>
                                        </div>
                                        <?php
                                    }
                                }
                                if (isset($fail)) {
                                    if ($fail != ' ') {
                                        ?>
                                        <div class="alert alert-success">       <!--green model-->
                                            <span class="semibold">Note:</span>&nbsp;&nbsp;
                                            <?= $fail ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>


                            </div>


                            <div class="box-body">
                                <form name="frm" method="post" action="<?php echo site_url('art_subcategory/deletemultiple'); ?>">

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Check</th>
                                                <th>Sr No.</th>
                                                <th>Art Category Name</th>
                                                <th>Art Subcategory Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?PHP
                                            $cnt = 1;
                                            foreach ($art_subcategory_list as $art_subcategory) {
                                                ?>
                                                <tr>
                                                    <td><input type="checkbox" name="art_subcategory_id[]" value="<?php echo $art_subcategory->art_subcategory_id ?>"/></td>
                                                    <td><?PHP echo $cnt++; ?> </td>
                                                    <td><?PHP echo $art_subcategory->art_category_name ?></td>
                                                    <td><?PHP echo $art_subcategory->art_subcategory_name ?></td>

                                                    <td><?php
                                                        if ($art_subcategory->status == '0') {
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
                                                                <li> <a onclick="openView(<?= $art_subcategory->art_subcategory_id ?>);"><i class="fa fa-search"></i><label>View</label></a> </li>                     
                                                                <li>    <a href="<?php echo site_url("art_subcategory/edit_data/$art_subcategory->art_subcategory_id") ?>" onclick="return confirm('you want to edit...........')"><i class="fa fa-edit"></i><label>Edit</label></a></li>
                                                                <li>    <a href="<?php echo site_url("art_subcategory/delete/$art_subcategory->art_subcategory_id") ?>" onclick="return confirm('you want to delete...........')"><i class="fa fa-trash"></i><label>Delete</label></a></li>
                                                                <li><?php
                                                                    if ($art_subcategory->status == '0') {
                                                                        ?>
                                                                        <a href="<?php echo site_url("art_subcategory/update_status_active/$art_subcategory->art_subcategory_id") ?>"><i class="glyphicon glyphicon-ok" style="color:green"></i><label>Active</label></a>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <a href="<?php echo site_url("art_subcategory/update_status_deactive/$art_subcategory->art_subcategory_id") ?>"><i class="glyphicon glyphicon-remove" style="color:red"></i><label>Deactive</label></a>
                                                                        <?php
                                                                    }
                                                                    ?></li>
                                                            </ul>
                                                        </div>
                                                        <div id="myModal<?= $art_subcategory->art_subcategory_id ?>" class="modal fade" role="dialog">
                                                            <div class="modal-dialog">
                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title"><label>Subcategory Data</label></h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <table  width="60%">
                                                                            <tr>
                                                                                <td><label>Subcategory ID</label></td>
                                                                                <td>:&nbsp;&nbsp;<?php echo $art_subcategory->art_subcategory_id ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><label>Category Name</label></td>
                                                                                <td>:&nbsp;&nbsp;<?php echo $art_subcategory->art_category_name ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><label>Subcategory Name</label></td>
                                                                                <td>:&nbsp;&nbsp;<?php echo $art_subcategory->art_subcategory_name ?></td>
                                                                            </tr>
                                                                        </table>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                        <li>    <input type="submit" name="submit" value="Delete Selected" onclick="return confirm('Are You Sure You Want to Delete ?')"/></li>                     
                                        <li>    <input type="submit" name="submit1" value="Active Selected" onclick="return confirm('Are You Sure You Want to active all records ?')"/></li>                                                                
                                        <li>     <input type="submit" name="submit2" value="Deactive Selected" onclick="return confirm('Are You Sure You Want to Deactive all record ?')"/></li>                     
                                    </ul>
                                </div>
                                <p align="right"><i class="glyphicon glyphicon-ok" style="color:green" ></i>&nbsp;&nbsp;&nbsp;&nbsp;<label>Indicates Activated</label>
                                    <br/>
                                    <i class="glyphicon glyphicon-remove" style="color:red" ></i>&nbsp;<label>Indicates Deactivated</label>
                                </p>
                            </div>

                        </div>
                    </form>
                        <!-- /.box -->

                        <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Main content -->
                        <!-- /.content -->
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
                        <script type="text/javascript">
                            function openView(id) {
                                $('#myModal' + id).modal('show');
                            }
                        </script>
        <script>
            $(function ()
            {
                window.setTimeout(function ()
                {
                    $(".alert").fadeTo(500, 0).slideUp(500, function ()  {
                        $(this).remove();
                    });
                }, 4000);
                
                 $("#example1").datatable();
            });
        </script>
                </body>
                        </html>
