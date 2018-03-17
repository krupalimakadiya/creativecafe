<!DOCTYPE html>
<html>
    <head>
        <?php
        $this->load->view('admin/header_include');
        ?>  
        <script type="text/javascript">
            function formValidator()
            {
                var first_name = document.getElementById('first_name');
                var last_name = document.getElementById('last_name');
                var mobile = document.getElementById('mobile');
                var email = document.getElementById('email');
                var country_id = document.getElementById('country_id');
                var state_id = document.getElementById('state_id');
                var city_id = document.getElementById('city_id');
                var pincode = document.getElementById('pincode');
                if (isAlphabet(first_name, "Enter your first name in letters"))
                {
                    if (isAlphabet(last_name, "Enter your last name in letters"))
                    {
                        if (lengthRestriction(mobile, 10, 10))
                        {
                            if (emailValidator(email, "enter a valid email address"))
                            {
                                if (madeSelection(country_id, "choose country"))
                                {
                                    if (madeSelection(state_id, "choose state"))
                                    {
                                        if (madeSelection(city_id, "choose city"))
                                        {
                                            if (isNumeric(pincode, "Enter pincode in 6 digits only..."))
                                            {
                                                return true;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
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
            function lengthRestriction(elem, min, max)
            {
                var ulnput = elem.value;
                if (ulnput.length >= min && ulnput.length <= max)
                {
                    return true;
                } else
                {
                    alert("please enter Mobile number in 10 Digits ");
                    elem.focus();
                    return false;

                }
            }
            function emailValidator(elem, helperMsg)
            {
                var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
                if (elem.value.match(emailExp))
                {
                    return true;
                } else
                {
                    alert(helperMsg);
                    elem.focus();
                    return false;
                }
            }
            function madeSelection(elem, helperMsg)
            {
                if (elem.value == "--select--")
                {
                    alert(helperMsg);
                    elem.focus();
                    return false;
                } else
                {
                    return true;
                }
            }
            function isNumeric(elem, helperMsg)
            {
                var numericExpression = /^[0-9]{6}$/;
                if (elem.value.match(numericExpression))
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
                                <form name="artistfrm" method="POST" action="<?php echo site_url("artist/editp") ?>" autocomplete="off" role="form" enctype="multipart/form-data" onsubmit='return formValidator()' >
                                    <input type="hidden" name="artist_id" value="<?php echo $update_data['artist_id'] ?>" />
                                    <div class="form-group">
                                        <label>First name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name"  value="<?php echo $update_data['first_name'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $update_data['last_name'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $update_data['mobile'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Email ID</label>
                                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $update_data['email'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" required=""  value="<?php echo $update_data['password'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Artist profile</label>
                                        <input type="file" class="form-control" name="artist_profile" id="artist_profile" required="" value="<?php echo $update_data['artist_profile'] ?>">
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
                                                                                                                                                                       <!-- <option selected value="<?//php echo $state->state_id ?>"> <?php //echo $state->state_name           ?></option>-->
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
                                        <input type="text" class="form-control" name="pincode" id="pincode"  value="<?php echo $update_data['pincode'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Select Artist type</label>      
                                        <select class="form-control" required=""  name="user_type">
                                           
                                            <?PHP
                                            if($update_data['user_type'] == 'artist')
                                            {
                                                ?>
                                            <option selected>artist</option>
                                             <option>user</option>
                                            <?PHP
                                            }
                                            ?>
                                              <?PHP
                                            if($update_data['user_type'] == 'user')
                                            {
                                                ?>
                                            <option selected>artist</option>
                                             <option selected>user</option>
                                            <?PHP
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
                                <form name="artistfrm" method="POST" action="<?php echo site_url("artist/addp") ?>" autocomplete="off" role="form" enctype="multipart/form-data"  onsubmit='return formValidator()' >
                                    <div class="form-group">
                                        <label>First name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name"  placeholder="Enter Your First Name..." required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Your last Name" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" class="form-control" name="mobile"  id="mobile" placeholder="Enter your mobile number..." required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Email ID</label>
                                        <input type="text" class="form-control" name="email" required="" id="email" placeholder="Enter your email...">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password"   placeholder="Enter your password..." required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Profile Picture</label>
                                        <input type="file" class="form-control" name="artist_profile" required="" >
                                    </div>

                                    <div class="form-group">
                                        <label>Select Country_name</label>
                                        <select name="country_id" class="form-control" id="country_id">
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
                                        <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Enter your pincode...">
                                    </div>
                                    <div class="form-group">
                                        <label>Select User type</label>
                                        <select class="form-control" required="" name="user_type">
                                            <option >--select--</option>
                                            <option>artist</option>
                                            <option>user</option>
                                            
                                        </select>
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
                </section>
            </div>
            <!-- /.box -->

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

