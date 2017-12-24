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
                      <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title"><label>City Master</label></h3>
                            <a href="<?php echo site_url("city/view_city") ?>" class="btn btn-primary pull-right">
                                <label class="fa fa-plus label-btn-icon"></label>
                                &nbsp;<label class="label-btn-fonts">View Records</label>
                            </a>
                        </div>
                 
                        <div class="box-body">
                            <form role="form">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Country name</label>
                                    <select class="form-control" name="country_id" id="country_id" >
                                        <option>select plz</option>
                                        <?PHP
                                        foreach ($country_list as $country) {
                                            ?>

                                            <option value="<?PHP echo $country->country_id ?>"><?PHP echo $country->country_name ?></option>
                                            <?PHP
                                        }
                                        ?>
                                    </select>

                                </div>
                                
                                <div class="form-group">
                                    <label>State name</label>
                                    <select class="form-control" name="country_id" id="country_id" >
                                        <option>select plz</option>
                                        <?PHP
                                        foreach ($state_list as $state) {
                                            ?>

                                            <option value="<?PHP echo $country->country_id ?>"><?PHP echo $country->country_name ?></option>
                                            <?PHP
                                        }
                                        ?>
                                    </select>

                                </div>
                                
                                
                                <div class="form-group">
                                    <label>City Name</label>
                                    <input type="text" class="form-control" placeholder="Enter your city name...">
                                </div>
                                
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-primary"/>
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
