<!DOCTYPE html>
<html>
    <head>
        <?php
        include('admin/header_include.php');
        ?>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script>
            $("document").ready(function () {
                // $("#art_subcategory").hide();
                $("#art_category_id").change(function () {
                    $("#art_subcategory_id").show();
                    var id = $(this).val();

                    $.ajax({
                        url: "<?php echo site_url("art_subcategory2/drop_art_subcategory") ?>",
                        type: "POST",
                        data: {art_category_id: id},
                        success: function (result) {
                            //alert(result);
                            $("#art_subcategory_id").html(result);
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
                            <a href="<?php echo site_url("art_subcategory2/index") ?>" class="btn btn-primary pull-right">
                                <label class="fa fa-plus label-btn-icon"></label>
                                &nbsp;<label class="label-btn-fonts">View Records</label>
                            </a>
                        </div>

                        <div class="box-body">
                          <?php
                            if (isset($update_data)) {
                                ?>

                                <form name="art_subcategory2frm" method="POST" action="<?php echo site_url("art_subcategory2/editp") ?>" role="form" >
                                    <input type="hidden" name="art_subcategory2_id" value="<?php echo $update_data['art_subcategory2_id'] ?>" />

                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Country_name</label>                                     
                                        <select name="art_category_id" id="art_category_id" class="form-control">
                                            <?php
                                            foreach ($art_category_list as $art_category) {
                                                if ($art_category->art_category_id == $update_data['art_category_id']) {
                                                    ?>
                                                    <option selected value="<?php echo $update_data['art_category_id'] ?>"><?php echo $art_category->art_category_name ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?php echo $update_data['art_category_id'] ?>"><?php echo $art_category->art_category_name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>State Name</label>
                                        <select name="art_subcategory_id" id="art_subcategory_id" class="form-control">

                                            <?php
                                            foreach ($art_subcategory_list as $art_subcategory) {
                                                if ($art_subcategory->art_subcategory_id == $update_data['art_subcategory_id']) {
                                                    ?>
                                                    <option selected value="<?php echo $art_subcategory->art_subcategory_id ?>"> <?php echo $art_subcategory->art_subcategory_name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>City Name</label>
                                        <input type="text" class="form-control"name="art_subcategory2_name" value="<?php echo $update_data['art_subcategory2_name'] ?>" >

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" value="submit">Submit</button>
                                    </div>
                                </form>
                                <?php
                            } else {
                                ?>

                                <form name="art_subcategory2frm" method="POST" action="<?php echo site_url("art_subcategory2/addp") ?>" role="form" >

                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Select Country_name</label>
                                        <select name="art_category_id" id="art_category_id" class="form-control">
                                            <option >--select--</option>
                                            <?php
                                            foreach ($art_category_list as $art_category) {
                                                ?>
                                                <option value="<?php echo $art_category->art_category_id ?>" ><?php echo $art_category->art_category_name ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Select State Name</label>
                                        <td><select name="art_subcategory_id" id="art_subcategory_id" class="form-control">
                                                <option></option>
                                            </select>
                                    </div>

                                    <div class="form-group">
                                        <label>City Name</label>
                                        <input type="text" class="form-control" name="art_subcategory2_name"  placeholder="Enter City Name....">
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


                </section>

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
        </div>
        <!-- ./wrapper -->
<?php
include('admin/footer_include.php');
?>
    </body>
</html>
