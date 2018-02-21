<!DOCTYPE html>
<html>
    <head>
        <?php
       $this->load->view('admin/header_include');
        ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <?php
              $this->load->view('admin/header_body');
                ?>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <?php
$this->load->view('admin/header_body_aside');
?>
            </aside>


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title"><label>Art Subcategory Master</label></h3>
                            <a href="<?php echo site_url("art_subcategory/view_art_subcategory") ?>" class="btn btn-primary pull-right">
                                <label class="fa fa-plus label-btn-icon"></label>
                                &nbsp;<label class="label-btn-fonts">View Records</label>
                            </a>
                        </div>

                        <div class="box-body">
                            <?php
                            if (isset($update_data)) {
                                ?>

                                <form name="art_subcategoryfrm" method="POST" action="<?php echo site_url("art_subcategory/editp") ?>" role="form" >
                                    <input type="hidden" name="art_subcategory_id" value="<?php echo $update_data['art_subcategory_id'] ?>" />

                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Art Category Name</label>                                     
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
                                        <label>Art Subcategory Name</label>
                                        <input type="text" class="form-control"name="art_subcategory_name" value="<?php echo $update_data['art_subcategory_name'] ?>" >

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" value="submit">Submit</button>
                                    </div>
                                </form>
                                <?php
                            } else {
                                ?>

                                <form name="art_subcategoryfrm" method="POST" action="<?php echo site_url("art_subcategory/addp") ?>" role="form" >

                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Select Art_category Name</label>
                                        <select name="art_category_id" class="form-control">
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
                                        <label>Art Subcategory Name</label>
                                        <input type="text" class="form-control"name="art_subcategory_name"  placeholder="Enter State Name....">
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
               $this->load->view('admin/footer_body');
                ?>
            </footer>


            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        <?php
        $this->load->view('admin/footer_include');                
?>
    </body>
</html>
