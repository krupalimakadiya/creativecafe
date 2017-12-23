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
                    <h1>
                        Blank page
                        <small>it all starts here</small>
                    </h1>





                    <section class="content">
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- /.box -->

                                <div class="box">
                                    <div class="box-header">
                                        <h2 class="box-title">User  master</h2>
                                        <p align="right"><a href="<?php echo site_url("user/user_add") ?>"><button ><h5>insert record</h5></button></a>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                <th>user_id</th>
                                                    <th>first_name</th>
                                                    <th>last__name</th>
                                                    <th>country</th>
                                                    <th>state</th>
                                                    <th>city</th>
                                                    <th>pincode</th>
                                                    <th>email</th>
                                                    <th>mobile</th>
                                                    <th>password</th>
                                                    <th>status</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?PHP
                                                foreach ($user_list as $user) {
                                                    ?>
                                                    <tr>
                                                        <td><?PHP echo $user->user_id ?> </td>
                                                        <td><?PHP echo $user->first_name ?></td>
                                                        <td><?PHP echo $user->last_name?></td>
                                                        <td><?PHP echo $user->country?></td>
                                                        <td><?PHP echo $user->state?></td>
                                                        <td><?PHP echo $user->city?></td>
                                                        <td><?PHP echo $user->pincode?></td>
                                                        <td><?PHP echo $user->email?></td>
                                                        <td><?PHP echo $user->mobile?></td>
                                                        <td><?PHP echo $user->password?></td>
                                                        <td><?PHP echo $user->status?></td>

                                                        
                                                                <?PHP
                                                            
                                                        }
                                                        ?>
                                                   
                                                </tr>
                                       

                                        </tbody>

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

                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Examples</a></li>
                        <li class="active">Blank page</li>
                    </ol>
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
