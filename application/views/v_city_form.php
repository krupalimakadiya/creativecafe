<!DOCTYPE html>
<html>
    <head>
        <?php
        $this->load->view('admin/header_include');
        ?>
        <script type="text/javascript">
            function formValidator()
            {
                var city_name = document.getElementById('city_name');
                if (isAlphabet(city_name, "Enter your city name in letters"))
                {
                    return true;
                }
                return false;
            }
            function isAlphabet(elem, helperMsg)
            {
                var alphaExp = /^[a-zA-Z]+$/;
                if (elem.value.match(alphaExp))
                {
                    return true;
                } else
                {
                    alert(helperMsg);
                    elem.focus();
                    return false;
                }
            }
        </script>

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
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title"><label>City Master</label></h3>
                            <a href="<?php echo site_url("city/index") ?>" class="btn btn-primary pull-right">
                                <label class="fa fa-plus label-btn-icon"></label>
                                &nbsp;<label class="label-btn-fonts">View Records</label>
                            </a>
                        </div>

                        <div class="box-body">
                            <?php
                            if (isset($update_data)) {
                                ?>

                                <form name="cityfrm" method="POST" action="<?php echo site_url("city/editp") ?>" role="form" autocomplete="off" onsubmit='return formValidator()'>
                                    <input type="hidden" name="city_id" value="<?php echo $update_data['city_id'] ?>" />

                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Country_name</label>                                     
                                        <select name="country_id" id="country_id" class="form-control">
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
                                        <label>State Name</label>
                                        <select name="state_id" id="state_id" class="form-control">

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
                                        <input type="text" class="form-control"name="city_name" id="city_name" value="<?php echo $update_data['city_name'] ?>" required="" >
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" value="submit">Submit</button>
                                    </div>
                                </form>
                                <?php
                            } else {
                                ?>
                                <form name="cityfrm" method="POST" autocomplete="off" action="<?php echo site_url("city/addp") ?>" role="form" onsubmit='return formValidator()'>

                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Select Country_name</label>
                                        <select name="country_id" id="country_id" class="form-control">
                                            <option >--select--</option>
                                            <?php
                                            foreach ($country_list as $country) {
                                                ?>
                                                <option value="<?php echo $country->country_id ?>"><?php echo $country->country_name ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Select State Name</label>
                                        <td><select name="state_id" id="state_id" class="form-control">
                                                <option></option>
                                            </select>
                                    </div>

                                    <div class="form-group">
                                        <label>City Name</label>
                                        <input type="text" class="form-control" required="" id="city_name" name="city_name"  placeholder="Enter City Name....">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" value="submit">Submit</button>
                                    </div>
                                </form>
                                <?php
                            }
                            ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </section></div>           
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
        <!-- ./wrapper -->
        <?php
        include('admin/footer_include.php');
        ?>
    </body>
</html>
