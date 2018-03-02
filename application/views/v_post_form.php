<!DOCTYPE html>
<html>
    <head>
        <?php
        $this->load->view('admin/header_include');
        ?>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
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
                    <!-- Default box -->
                    <div class="box box-info">
                        <div class="box-header with-border box-primary" >
                            <h3 class="box-title"><label>Post Master</label></h3>

                            <a href="<?php echo site_url("post/index") ?>" class="btn btn-primary pull-right">
                                <label class="fa fa-plus label-btn-icon"></label>
                                &nbsp;<label class="label-btn-fonts">View Records</label>
                            </a>
                        </div>
                        <div class="box-body">
                            <?php
                            if (isset($update_data)) {
                                ?>
                                <form name="artistfrm" method="POST" action="<?php echo site_url("post/editp") ?>" role="form" enctype="multipart/form-data">
                                    <input type="hidden" name="post_id" value="<?php echo $update_data['post_id'] ?>" />
                                    <!--                                    <div class="form-group">
                                                                            <label>First name</label>
                                                                            <input type="text" class="form-control" name="first_name"  value="<?php echo $update_data['first_name'] ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Last name</label>
                                                                            <input type="text" class="form-control" name="last_name"  value="<?php echo $update_data['last_name'] ?>">
                                                                        </div>
                                    
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
                                                                        </div>-->                                  
                                    <div class="form-group">
                                        <label>Art Category Name</label>                                     
                                        <select name="art_category_id" id="art_category_id" class="form-control">
                                            <?php
                                            foreach ($art_category_list as $art_category) {
                                                if ($art_category->art_category_id == $update_data['art_category_id']) {
                                                    ?>
                                                    <option selected value="<?php echo $art_category->art_category_id ?>"><?php echo $art_category->art_category_name ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?php echo $art_category->art_category_id ?>"><?php echo $art_category->art_category_name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>             
                                    </div>
                                    <div class="form-group">
                                        <label>Art Subcategory Name</label>
                                        <select name="art_subcategory_id" id="art_subcategory_id" class="form-control">
                                            <?php
                                            foreach ($art_subcategory_list as $art_subcategory) {
                                                if ($state->art_subcategory_id == $update_data['art_subcategory_id']) {
                                                    ?>
                                                                                                                                               <!-- <option selected value="<?//php echo $state->state_id ?>"> <?php //echo $state->state_name            ?></option>-->
                                                    <option value="<?php echo $art_subcategory->art_subcategory_id; ?>"selected="selected"><?php echo $art_subcategory->art_subcategory_name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select></div>
                                    <div class="form-group">
                                        <label>Art Subcategory2 Name</label>
                                        <select name="art_subcategory2_id" id="art_subcategory2_id" class="form-control">

                                            <?php
                                            foreach ($art_subcategory_list as $art_subcategory2) {
                                                if ($art_subcategory2->art_subcategory2_id == $update_data['art_subcategory2_id']) {
                                                    ?>
                                                    <option value="<?php echo $art_subcategory2->art_subcategory2_id; ?>"selected="selected"><?php echo $art_subcategory2->art_subcategory2_name; ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?php echo $art_subcategory2->art_subcategory2_name; ?>"><?php echo $art_subcategory2->art_subcategory2_name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" value="submit">Submit</button>
                                    </div>
                                </form>
                                <?php
                            } else {
                                ?>
                                <form name="postfrm" method="POST" action="<?php echo site_url("post/addp") ?>" role="form" enctype="multipart/form-data" >

                                    <div class="form-group">
                                        <label>Art Category Name</label>
                                        <select class="form-control" name="art_category_id"  id="art_category_id">
                                            <option value="">--select--</option>                                            
                                            <?php
                                            foreach ($art_category_list as $art_category) {
                                                ?>                                          
                                                <option value="<?php echo $art_category->art_category_id ?>"><?php echo $art_category->art_category_name ?></option>
                                                <?php
                                            }
                                            ?>                                            
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Select Art Subcategory Name</label>
                                        <select name="art_subcategory_id" id="art_subcategory_id" class="form-control">
                                            <option></option>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Select Art Subcategory2 Name</label>
                                        <select name="art_subcategory2_id" id="art_subcategory2_id" class="form-control"><option></option></select>
                                    </div>

                                    <div class="form-group">
                                        <label>File Type</label>
                                        <select class="form-control" name="file_type" id="file_type">
                                            <option value="">--select--</option>
                                            <option value="audio"  >Audio</option>                                            
                                            <option value="video"  >Video</option>
                                            <option value="image" >Image</option>
                                            <option value="Others" >Others</option>                                            
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <span id="uploadtype" style="display: none">
                                            <label>Upload</label>
                                            <input type="file" name="image" class="form-control" >
                                        </span>

                                        <span id="audiotype" style="display: none">
                                            <label>Enter Audio Url</label>
                                            <input type="text" name="project_audio"  title="Enter Correct Audio URL " max_len="1000" id="project_video1" class="form-control"  placeholder="Enter Audio Url" />
                                        </span>

                                        <span id="urltype" style="display: none">
                                            <label>Enter Video Url</label>   
                                            <?php //name="project_video"                                                     
                                            ?>
                                            <input type="text" name="project_video" pattern=".*[a-zA-Z0-9]{2}.*" title="Enter Correct Video URL " max_len="1000" id="project_video1" class="form-control"  placeholder="Enter Video Url" />
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea  rows="10" cols="80" class="form-control" name="description">
                                        </textarea>    
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
<script type="text/javascript">
    $(document).on('change', '#file_type', function (e) {
        var type = $(this).val();
        if (type == "image" || type == "Others") {
            $('#uploadtype').show();
            $('#urltype').hide();
            $('#audiotype').hide();

        } else if (type == "video") {
            $('#uploadtype').hide();
            $('#audiotype').hide();
            $('#urltype').show();
        } else if (type == "audio") {
            $('#uploadtype').hide();
            $('#urltype').hide();
            $('#audiotype').show();
        } else {
            $('#uploadtype').hide();
            $('#urltype').hide();
        }
    });
</script>


</body>
</html>
