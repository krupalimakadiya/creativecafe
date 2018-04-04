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
            <aside class="main-sidebar">
                <?php
                $this->load->view('admin/header_body_aside');
                ?>
            </aside>

            <div class="content-wrapper">
                <section class="content-header">
                    <section class="content">
                        <!-- Default box -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title"><label>Comment Master</label></h3>
                                <p align="right">
                                    <?php
                                    $message = $this->session->flashdata('message');
                                    $success = $this->session->flashdata('success');
                                    $fail = $this->session->flashdata('fail');

                                    if (isset($message)) {
                                        if ($message != ' ') {
                                            ?>
                                        <div class="alert alert-success">       <!--green model-->
                                            <span class="semibold">Note:</span>&nbsp;&nbsp;
                                            <?php echo $message ?>
                                        </div>
                                        <?php
                                    }
                                }
                                if (isset($success)) {
                                    if ($success != ' ') {
                                        ?>
                                        <div class="alert alert-success">       <!--green model-->
                                            <span class="semibold">Note:</span>&nbsp;&nbsp;
                                            <?php echo $success ?>
                                        </div>
                                        <?php
                                    }
                                }
                                if (isset($fail)) {
                                    if ($fail != ' ') {
                                        ?>
                                        <div class="alert alert-success">       <!--green model-->
                                            <span class="semibold">Note:</span>&nbsp;&nbsp;
                                            <?php echo $fail ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>

                            <div class="box-body">
                                <form name="frm" method="post" action="<?php echo site_url('comment/deletemultiple'); ?>">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox"  id="select_all" />&nbsp;Check</th>
                                                <th>Sr No.</th>
                                                <th>User Id</th>
                                                <th>Post Id</th>
                                                <th>Comment</th>                                                
                                                <th>Action</th></tr>
                                        </thead>
                                        <tbody>
                                            <?PHP
                                            $cnt = 1;

                                            foreach ($comment_list as $comment) {
                                                ?>
                                                <tr>
                                                    <td><input type="checkbox" name="comment_id[]" class="checkbox" value="<?php echo $comment->comment_id; ?>" /></td>
                                                    <td><?PHP echo $cnt++; ?> </td>
                                                    <td><?PHP echo $comment->artist_id ?></td>
                                                    <td><?PHP echo $comment->post_id ?></td>
                                                    <td><?PHP echo $comment->comment ?></td>
                                                    <td> 
                                                        <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> Action
                                                                <span class="caret"></span> <!-- caret -->
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu"> <!-- class dropdown-menu -->
                                                                <li> <a onclick="openView(<?php echo $comment->comment_id ?>);"><i class="fa fa-search"></i><label>View</label></a> </li>                     
                                                                <li>    <a href="<?php echo site_url("comment/delete/$comment->comment_id") ?>" onclick="return confirm('you want to delete...........')"><i class="fa fa-trash"></i><label>Delete</label></a></li>
                                                            </ul>
                                                        </div>

                                                        <div id="myModal<?php echo $comment->comment_id ?>" class="modal fade" role="dialog">
                                                            <div class="modal-dialog">
                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title"><label>Comment Data</label></h4>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <table  width="60%">
                                                                            <tr>
                                                                                <td><label>Comment ID</label></td>
                                                                                <td>:&nbsp;&nbsp;<?php echo $comment->comment_id ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><label>User ID</label></td>
                                                                                <td>:&nbsp;&nbsp;<?php echo $comment->artist_id ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><label>Post ID</label></td>
                                                                                <td>:&nbsp;&nbsp;<?php echo $comment->post_id ?></td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td><label>Comment</label></td>
                                                                                <td>:&nbsp;&nbsp;<?php echo $comment->comment ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><label>Date</label></td>
                                                                                <td>:&nbsp;&nbsp;<?php echo $comment->comment_date ?></td>
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

                                </form>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <p align="right"><i class="glyphicon glyphicon-ok" style="color:green" ></i>&nbsp;&nbsp;&nbsp;&nbsp;<label>Indicates Activated</label>                                    <br/>
                                    <i class="glyphicon glyphicon-remove" style="color:red" ></i>&nbsp;<label>Indicates Deactivated</label>
                                </p>
                            </div>
                        </div>
                      </section>
                </section>

                <!-- Main content -->
                <!-- /.content -->
            </div>
          

            <footer class="main-footer">
                <?php
                $this->load->view('admin/footer_body');
                ?>
            </footer>
    <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        <?php
        $this->load->view('admin/footer_include');
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
                    $(".alert").fadeTo(500, 0).slideUp(500, function () {
                        $(this).remove();
                    });
                }, 4000);

                $("#example1").datatable();
            });
        </script>

    </body>
</html>
