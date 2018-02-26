<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo $this->config->item('static_url') ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>Krupali Makadiya</p>
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
                <i class="fa fa-user"></i> <span>User Master</span>
            </a>
        </li>
        <li>
            <a href="<?PHP echo site_url('artist/index') ?>">
                <i class="fa fa-user"></i> <span>Artist Master</span>
            </a>
        </li>
        <li>
            <a href="<?PHP echo site_url('post/index') ?>">
                <i class="fa fa-circle-o"></i> <span>Post Master</span>
            </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-circle-o"></i> <span>Country Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?PHP echo site_url('country/index') ?>"><i class="fa fa-circle-o"></i> Country Master</a></li>
            <li><a href="<?PHP echo site_url('state/index') ?>"><i class="fa fa-circle-o"></i> State Master</a></li>
            <li><a href="<?PHP echo site_url('city/index') ?>"><i class="fa fa-circle-o"></i> City Master</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-circle-o"></i> <span>Art Category Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>        
        <ul class="treeview-menu">            
            <li class="active"><a href="<?PHP echo site_url('art_category/index')?>"><i class="fa fa-circle-o"></i> Art Category Master</a></li>
           <li><a href="<?PHP echo site_url('art_subcategory/index')?>"><i class="fa fa-circle-o"></i> Art Subcategory Master</a></li>
           <li><a href="<?PHP echo site_url('art_subcategory2/index')?>"><i class="fa fa-circle-o"></i> Art Subcategory2 Master</a></li>                   
          </ul>
        </li>
        <li>
            <a href="<?PHP echo site_url('comment/index') ?>">
                <i class="fa fa-comments"></i> <span>Comment Master</span>
            </a>
        </li>
        
        <li>
            <a href="<?PHP echo site_url('news/index') ?>">
                <i class="fa fa-circle-o"></i> <span>News Master</span>
            </a>
        </li>
        
        <!--<li>
            <a href="<?PHP echo site_url('event/index') ?>">
                <i class="fa fa-circle-o"></i> <span>Event Master</span>
            </a>
        </li>-->
        
        <li>
            <a href="<?PHP echo site_url('exhibition/index') ?>">
                <i class="fa fa-circle-o"></i> <span>Exhibition Master</span>
            </a>
        </li>   
                                
        
                <li>
            <a href="<?PHP echo site_url('site/index') ?>">
                <i class="fa fa-circle-o"></i> <span>Site Review Master</span>
            </a>
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