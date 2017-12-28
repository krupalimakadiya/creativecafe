<!DOCTYPE html>
<html>
    <head>
        <?php
        include('header_include.php');
        ?>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script>
            $("document").ready(function () {
                // $("#state").hide();
                $("#country_id").change(function () {
                    $("#state_id").show();
                    var id = $(this).val();

                    $.ajax({
                        url: "<?php echo site_url("city/drop_state") ?>",
                        type: "POST",
                        data: {country_id: id},
                        success: function (result) {
                            //alert(result);
                            $("#state_id").html(result);
                        }

                    });
                });

            });
        </script>

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
                            <?php
                            if (isset($update_data)) {
                                ?>
                                <form role="form" name="cityfrm" method="POST" action="<?php echo site_url('city/editp') ?>">
                                    <!-- text input -->
                                                <input type="hidden" name="city_id" value="<?php echo $update_data['city_id'] ?>" />

                                    <div class="form-group">
                                        <label>Country name</label>
                                        <select class="form-control" name="country_id" id="country_id" >
                                                                <?php
                                            foreach ($country_list as $country) {
                                                if ($country->country_id == $update_data['country_id']) {
                                                    ?>
                                                    <option selected value="<?php echo $update_data['country_id'] ?>"><?php echo $country->country_name ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?php echo $update_data['country_id'] ?>"><?php echo $country->country_name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                        
                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label>State name</label>
                                        <select class="form-control" name="state_id" id="state_id" >
                                                                                    <?php
                                            foreach ($state_list as $state) {
                                                if ($state->state_id == $update_data['state_id']) {
                                                    ?>
                                                    <option selected value="<?php echo $state->state_id ?>"> <?php echo $state->state_name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
</select>

                                    </div>


                                    <div class="form-group">
                                        <label>City Name</label>
                                    <input type="text" class="form-control"name="city_name" value="<?php echo $update_data['city_name'] ?>" >
  </div>

                                    <div class="form-group">
                                        <input type="submit" name="submit" class="btn btn-primary"/>
                                    </div>

                                </form>

                                <?php
                            } else {
                                ?>
                                <form role="form" name="cityfrm" method="POST" action="<?php echo site_url('city/addp') ?>" role="form">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Country name</label>
                                        <select class="form-control" name="country_id" id="country_id" >
                                           <option >--select--</option>
                                            <?php
                                            foreach ($country_list as $country) {
                                                ?>
                                                <option value="<?php echo $country->country_id ?>" ><?php echo $country->country_name ?></option>
                                                <?php
                                            }
                                            ?>
                                         </select>
                                    </div>

                                    <div class="form-group">
                                        <label>State name</label>
                                        <select class="form-control" name="country_id" id="country_id" >
                                                    <option></option>
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
