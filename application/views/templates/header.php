<?php echo doctype('xhtml1-trans'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>Wedly - <?=$title?></title>
<?php
    echo link_tag(array('rel'=>'icon','href'=>'assets/images/favicon.ico','type'=>'image/x-icon'));
    $meta = array(
        array('name'=>'viewport','content'=>'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'),
        array('name'=>'description','content'=>'A one-stop shop where you can find not just inspirational ideas,but also the wedding vendors that can make it happen!You will have access to the largest visual directory of wedding vendors in Asia,as well as some pretty awesome wedding planning tools to help you plan that perfect day.'),
        array('name'=>'keywords','content'=>'Wedly, Wedding, thewedly, TheWedly, wedding in asia, Asia'),
    );
    echo meta($meta);
?>
    <!--[if !IE]>--><link href="<?=base_url("assets/css/frontend/IE.css")?>" rel="stylesheet" type="text/css"><!--<![endif]-->
<?php
     echo link_tag(array('rel'=>'stylesheet','href'=>'assets/css/frontend/style.css','type'=>'text/css'));
     echo link_tag(array('rel'=>'stylesheet','href'=>'assets/css/frontend/developer.css','type'=>'text/css'));
     echo link_tag(array('rel'=>'stylesheet','href'=>'assets/css/frontend/login.css','type'=>'text/css'));
     echo link_tag(array('rel'=>'stylesheet','href'=>'assets/css/frontend/accordion.css','type'=>'text/css'));
     echo link_tag(array('rel'=>'stylesheet','href'=>'assets/css/frontend/skin.css','type'=>'text/css'));
     echo link_tag(array('rel'=>'stylesheet','href'=>'assets/css/frontend/register.css','type'=>'text/css'));
     echo link_tag(array('rel'=>'stylesheet','href'=>'assets/css/frontend/responsive.css','type'=>'text/css'));
     echo link_tag(array('rel'=>'stylesheet','href'=>'assets/css/frontend/home.css','type'=>'text/css'));
     echo link_tag(array('rel'=>'stylesheet','href'=>'assets/css/frontend/jquery.selectbox.css','type'=>'text/css'));
     echo link_tag(array('rel'=>'stylesheet','href'=>'assets/css/frontend/bootstrap.no-icons.min.css','type'=>'text/css'));
     echo link_tag(array('rel'=>'stylesheet','href'=>'assets/css/frontend/2da899a215be.css','type'=>'text/css'));
     echo link_tag(array('rel'=>'stylesheet','href'=>'assets/css/frontend/jplayer.pink.flag.css','type'=>'text/css'));
     echo link_tag(array('rel'=>'stylesheet','href'=>'assets/css/frontend/circle.player.css','type'=>'text/css'));
     echo link_tag(array('rel'=>'stylesheet','href'=>'assets/css/frontend/font-awesome.min.css','type'=>'text/css'));
?>
</head>
<body>
<div class="pop_outer abs_top_log">
    <div class="pop_inner login_popup" id="login">
        <div class="regist_pop_login_block_extra popuo_login_block_extra">
 		<div class="login_popup_block">
                     <div class="img_register">
 		      <span class="l_headings">Log In</span>
 		     </div> 
			 <div class="login_left_block">
                             <form name="signin" method="post" id="signinform" action="<?= base_url("signin") ?>">
                                <!--
                                <div class="response-msg success ui-corner-all error_div" style="font-size:13px;background: none repeat scroll 0 0 rgba(0, 0, 0, 0);border: medium none; padding-left:0px;">
                                    This is success
                                </div>
                                <div class="response-msg error ui-corner-all error_div"  style="font-size:13px; background: none repeat scroll 0 0 rgba(0, 0, 0, 0);border: medium none; padding-left:0px;">
                                    This is error
                                </div>
                                -->
				<div class="login_row">
				    <label>Email address</label> 
	 				<input type="text" class="required_email1 email" name="data[Member][email]" /></input>
	 			</div>
	 			<div class="login_row">
				    <label>Password</label>  
	 				<input type="password" id="password" class="required_password" name="data[Member][password]"></input>
	 			</div>
 				<div class="btn_block">
					<input type="hidden" name="data[Member][vendor_message]" class="vendor_message" value=""/>
 					<input  class="login_btn" type="Submit" value="Log In">
				</div>
				</form>
 			</div>
 			<img src="<?= base_url("assets/images/divid.png") ?>" class="divide_img"></img>
 			<div class="login_left_block">
	 			<div class="social_block">
	 				<a href="javascript:void(0)" class="fb" id="fb-login" onclick="Login();"></a>
	 				<a href="javascript:void(0)" class="google" onclick="student_google_login();"></a>
	 				<a href="javascript:void(0)" class="pintrest yahooLg"></a>
	 			</div>
 			</div>
 			<div class="membr_div">Not a Member Yet? <a href="javascript:void(0)" id="r_click">Register Here!</a></div>
 			<div class="membr_div"><a href="javascript:void(0)" id="forgotpass" >Forgotten Your Password?</a></div>
 		</div>
 	</div>
    </div>
</div>
<header class="header_main">
<div class="wrapper">
        <div class="header_gap"></div>
        <div class="header_row">
		   <nav class="main-menu">
			<div class="navs_btns">
                            <a href="<?=  base_url() ?>"><img src="<?= base_url("assets/images/wedly_logo.png") ?>" class="logo_size"></img></a>
			</div>
			<div class="rights_menu">
			    <ul class="sf-menu">
			  
			    <div class="hide_shows">
				    <div class="tip_container"><div class="tip"></div></div>
                            </div>
				
				<div class="header_show">			
				</div>
				<div class="align_top_menu">
                                    <li class="header_li"> <a href="<?= base_url() ?>" class="active">Browse</a></li>
					<?php if(false){ //if logged in ?>
                                            <?php if($this->Session->check('page_active')){ ?>
                                                    <li  class="user_display"> <a id="user_menu_tab" class="active" href="javascript:void(0)"><?php echo ucfirst($usersDetails['Member']['first_name']);?></a></li>
                                            <?php } else { ?>
                                                    <li  class="user_display"> <a id="user_menu_tab" class="active_user_bar" href="javascript:void(0)"><?php echo ucfirst($usersDetails['Member']['first_name']);?></a></li>
                                            <?php } ?>
					<?php } ?>
                                        <!--<li class="register_li"><a href="javascript:void(0)" class="reg active">Register</a><div class="clear"></div></li>-->
                                        <li class="register_li"><a href="javascript:void(0)" class="reg">Register</a><div class="clear"></div></li>
                                        <li class="login_li"><a href="javascript:void(0)" class="log">Log In</a></li>
					
				</div>
				<li class="selected nt_ryt_brder">
					<div class="search_menu">
                                            <form class="srchPins" method="get" name="search" action="<?=  base_url("Homes/index")?>">
                                                <input  id="keywrd" type="text" name="keyword" class="input" placeholder="Search" >
							<input  type="submit" value="" class="input_submit">
						</form>
					</div>
				
				</li>
				<li class="selected brdr_not">
					<div class="search_filter">
						<?php #if($this->Session->check('search_bar')){ ?>
							<!--<form>
								<input type="button" id="filter" name="keyword" class="input fltr_only" value="Search Filters">
							</form>-->
						<?php #} else { ?>
                                                        <form action="<?= base_url(); ?>" method="post">
								<input type="submit" name="unique_sarch_para" class="input fltr_only" value="Search Filters">
							</form>
						<?php #} ?>
					</div>
				
				</li>
				</ul>
				<?php if(false){ ?>
					<div class="bars_icons">
						<a class="" id="flip" href="javascript:void(0)"><em style="background-position: 0px -20px;">&nbsp;</em></a>
					</div>
				<?php } else { ?>
					<div class="bars_icons">
						<a href ="javascript:void(0)" id="flip" ><em>&nbsp;</em></a>
					</div>
				<?php } ?>
				
				<form method="POST">
					<input type="hidden" name="category" id="cat_hidden">
					<input type="hidden" name="country" id="con_hidden">
					<input type="hidden" name="state" id="state_hidden">
					<div id="InputsWrapper">
					</div>
				</form>
				
			
			</div>
			</nav>
		</div>
                <div class="nav_show_div" id="pannel_show_down" style="display:none;">
                        <div class="nav_right_div">
                                <ul>
                                        <!--<li> <a href="javascript:void();">View Our Vendors</a></li>-->
                                        <li> <a href="<?= base_url("Homes/aboutUs") ?>">About Us</a></li>
                                        <li> <a href="<?= base_url("Homes/ContactUs") ?>">Contact Us</a></li>
                                        <li> <a href="<?= base_url("Homes/privacyPolicy") ?>">Privacy & Terms</a></li>
                                        <!--<li> <a href="<?= base_url("Homes/copyright") ?>Homes/copyright">Copyright & Trademark</a></li>-->
                                </ul>
                        </div>
                </div>
</div>
   </header>