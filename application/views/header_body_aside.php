<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo base_url() ?>AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>Alexander Pierce</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="<?PHP echo site_url('user/index') ?>">

                <i class="fa fa-dashboard"></i> <span>User Master</span>

            </a>
        </li>
        <li>
            <a href="<?PHP echo site_url('artist/artist_view') ?>">

                <i class="fa fa-dashboard"></i> <span>Artist Master</span>

            </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?PHP echo site_url('country/index') ?>"><i class="fa fa-circle-o"></i> Country Master</a></li>
            <li><a href="<?PHP echo site_url('state/index') ?>"><i class="fa fa-circle-o"></i> State Master</a></li>
            <li><a href="<?PHP echo site_url('city/index') ?>"><i class="fa fa-circle-o"></i> City Master</a></li>
            <li><a href="<?PHP echo site_url('category/index')?>"><i class="fa fa-circle-o"></i> Art Category Master</a></li>
          
          </ul>
        </li>
        
        
        <!--<li>
            <a href="#">
                <i class="fa fa-circle"></i> <span>next</span>

            </a>
        </li>
-->
    </ul>
</section>
<!-- /.sidebar -->