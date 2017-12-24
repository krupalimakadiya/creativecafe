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
                            <h3 class="box-title"><label>City Master</label></h3>
                            <a href="<?php echo site_url("city/add_city") ?>" class="btn btn-primary pull-right">
                                <label class="fa fa-plus label-btn-icon"></label>
                                &nbsp;<label class="label-btn-fonts">Add Records</label>
                            </a>
                        </div>
                                  <!-- /.box-header -->
                                    <div class="box-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sr no.</th>
                                                    <th>Country name</th>
                                                    <th>State name</th>
                                                    <th>City name</th>                                                
                                                    <th>Status</th>
                                                    <th>Action</th>


                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?PHP
                                                foreach ($city_list as $city) {
                                                    ?>
                                                    <tr>
                                                        <td><?PHP echo $city->city_id ?> </td>
                                                        <td><?PHP echo $city->country_name ?> </td>
                                                        <td><?PHP echo $city->state_name ?></td>
                                                        <td><?PHP echo $city->city_name ?></td>
                                                        
                                                        <td>  <?php
                                           if ($city->status=='0' ) {
                                               ?>

                                        <a href="<?php echo site_url("city/update_status_active/$city->city_id") ?>" class="btn btn-success" role="button"><label>Active</label></a>
                                            <?php
                                        } else
                                            {
                                            ?>
                                        <a href="<?php echo site_url("city/update_status_deactive/$city->city_id") ?>" class="btn btn-danger" role="button"><label>Deactive</label></a>
                                            <?php
                                        }
                                        ?></td>
                                                        <td>
                                                            <a href="<?php echo site_url("city/del/$city->city_id"); ?>" onclick="return confirm('Are u sure delete record?');"> <button class="btn btn-primary"><i class="fa fa-trash-o"></i></button></a>
                                                            <a href="<?php echo site_url("city/edit_data/$city->city_id"); ?> "onclick="return confirm('Are u sure update record?');"> <button class="btn btn-primary"><i class="fa fa-edit"></i></button></a>
                                                        </td>
                                                </tr>

                                            </tbody>

<?php
                                                }
                                                ?>
                                        </table>
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
