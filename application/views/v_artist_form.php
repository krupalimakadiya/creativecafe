<!DOCTYPE html>
<html>
    <head>
        <?php
        include('admin/header_include.php');
        ?>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script>
            $("document").ready(function () {
                // $("#state").hide();
                $("#country_id").change(function () {
                    $("#state_id").show();
                    var id = $(this).val();

                    $.ajax({
                        url: "<?php echo site_url("artist/drop_state") ?>",
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
        <script>
            $("document").ready(function () {
                // $("#state").hide();
                $("#state_id").change(function () {
                    $("#city_id").show();
                    var id = $(this).val();

                    $.ajax({
                        url: "<?php echo site_url("artist/drop_city") ?>",
                        type: "POST",
                        data: {state_id: id},
                        success: function (result) {
                            //alert(result);
                            $("#city_id").html(result);
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
                    <!-- Default box -->
                    <div class="box box-info">
                        <div class="box-header with-border box-primary" >
                            <h3 class="box-title"><label>Artist Master</label></h3>

                            <a href="<?php echo site_url("artist/index") ?>" class="btn btn-primary pull-right">
                                <label class="fa fa-plus label-btn-icon"></label>
                                &nbsp;<label class="label-btn-fonts">View Records</label>
                            </a>
                        </div>
                        <div class="box-body">
                            <?php
                            if (isset($update_data)) {
                                ?>

                                <form name="artistfrm" method="POST" action="<?php echo site_url("artist/editp") ?>" role="form" >
                                    <input type="hidden" name="artist_id" value="<?php echo $update_data['artist_id'] ?>" />
                                    <div class="form-group">
                                        <label>First name</label>
                                        <input type="text" class="form-control" name="first_name"  value="<?php echo $update_data['first_name'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input type="text" class="form-control" name="last_name"  value="<?php echo $update_data['last_name'] ?>">
                                    </div>
                                    <div class="form-group">
                                    <label>Art Category Name</label>                                     
                                        <select name="art_category_id" id="art_category_id" class="form-control">
                                            <?php
                                            foreach ($category_list as $category) {
                                                if ($category->art_category_id == $update_data['art_category_id']) {
                                                    ?>
                                                    <option selected value="<?php echo $category->art_category_id ?>"><?php echo $category->art_category_name ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?php echo $category->art_category_id ?>"><?php echo $category->art_category_name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select></div>

                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" class="form-control" name="mobile"  value="<?php echo $update_data['mobile'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Email ID</label>
                                        <input type="text" class="form-control" name="email" value="<?php echo $update_data['email'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password"  value="<?php echo $update_data['password'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Country_name</label>                                     
                                        <select name="country_id" id="country_id" class="form-control">
                                            <?php
                                            foreach ($country_list as $country) {
                                                if ($country->country_id == $update_data['country_id']) {
                                                    ?>
                                                    <option selected value="<?php echo $country->country_id ?>"><?php echo $country->country_name ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?php echo $country->country_id ?>"><?php echo $country->country_name ?></option>
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
                                                                                                       <!-- <option selected value="<?//php echo $state->state_id ?>"> <?php //echo $state->state_name        ?></option>-->
                                                    <option value="<?php echo $state->state_id; ?>"selected="selected"><?php echo $state->state_name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select></div>
                                    <div class="form-group">
                                        <label>City Name</label>
                                        <select name="city_id" id="city_id" class="form-control">

                                            <?php
                                            foreach ($city_list as $city) {
                                                if ($city->city_id == $update_data['city_id']) {
                                                    ?>
                                                    <option value="<?php echo $city->city_id; ?>"selected="selected"><?php echo $city->city_name; ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?php echo $city->city_id; ?>"><?php echo $city->city_name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Pincode</label>
                                        <input type="text" class="form-control" name="pincode"  value="<?php echo $update_data['pincode'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" value="submit">Submit</button>
                                    </div>
                                </form>
                                <?php
                            } else {
                                ?>
                                <form name="artistfrm" method="POST" action="<?php echo site_url("artist/addp") ?>" role="form" >
                                    <div class="form-group">
                                        <label>First name</label>
                                        <input type="text" class="form-control" name="first_name"   placeholder="Enter Your First Name...">
                                    </div>
                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input type="text" class="form-control" name="last_name"  placeholder="Enter Your last Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Art Category Name</label>
                                        <!--<input type="text" class="form-control" name="art_category_id" placeholder="Enter your art category">-->
                                        <select name="art_category_id" class="form-control" id="art_category_id">
                                            <option value="">--Select--</option>
                                            <?php
                                                                            foreach ($category_list as $category) {
                                                                                ?>
                                            <option value="<?php echo $category->art_category_id?>"><?php echo $category->art_category_name ?></option>
                                            <?php
                                                                            }
                                            ?>                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" class="form-control" name="mobile"   placeholder="Enter your mobile number...">
                                    </div>
                                    <div class="form-group">
                                        <label>Email ID</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter your email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password"   placeholder="Enter your password...">
                                    </div>
                                    <div class="form-group">
                                        <label>Select Country_name</label>
                                        <select name="country_id" class="form-control" id="country_id" required="">
                                            <option value="">--select--</option>
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
                                        <label>Select State Name</label>
                                        <select name="state_id" id="state_id" class="form-control">
                                            <option></option>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>City Name</label>
                                        <select name="city_id" id="city_id" class="form-control"><option></option></select>
                                    </div>

                                    <div class="form-group">
                                        <label>Pincode</label>
                                        <input type="text" class="form-control" name="pincode"  placeholder="Enter your pincode...">
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" value="submit">Submit</button>
                                    </div>
                                </form>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
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
