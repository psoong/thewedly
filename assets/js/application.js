 $(document).ready(function(){
            /*******login popup*******/
            $(".log").bind('click',function(){ 

                    $('.header_li a').removeClass('active');
                    $('.register_li a').removeClass('active');

                    $("#pannel_filter").hide();
                    $(".log_show_div").hide();
                    $("#filter").addClass('fltr_only');
                    $("#filter").css({'background': '#F3F4F5','color': '#777777','border':'0px solid #FF285B'});
                    $('#filter').removeAttr( 'style' );	
                    $('.toggle').css('margin-top','0px');


                    $("#pannel_show_down").hide();
                    $(".log_show_div").hide();
                    $("#flip").addClass('in_active');
                    $('.bars_icons a em').css('background-position','0px 3px');
                    $('.bars_icons a em').removeAttr( 'style' );

                    $('.register_li a').removeClass('active');

                    $('.login_li a').addClass('active');

                    $('.login_row label.error').hide();
                    $('.required_email1').val('');
                    $('#password').val('')
                    window.onkeyup = function (event) {
                            if (event.keyCode == 27) {

                                    $('#login').hide();
                                    $("#register").hide();
                                    $("#forgot_pass").hide();
                                $("#reset_pass").hide();
                                    $('.login_li a').removeClass('active');

                                    $('.mask1').hide();
                                    $('.pop_outer').css('display','block');
                            }
                    }

                    //$('.pop_outer').show();
                    $("#register").hide();
                    $('.mask1').hide();
                    $("#login").show();
                    $("#signinform input:text").first().focus();
                    //var $div = $('<div />').appendTo('body');
                    //$div.attr('class', 'mask1');
                    $(".close").click(function(){
                            $("#login").hide();

                            $("#register").hide();
                            $("#forgot_pass").hide();
                            $("#reset_pass").hide();
                            $(".mask1").removeClass();
                    });

                    $(".mask1").bind('click',function(){ 
                            $("#login").hide();
                            $("#register").hide();
                            $("#forgot_pass").hide();
                            $("#reset_pass").hide();
                            $('.login_li a').removeClass('active');
                            hidemask();
                            $(this).removeClass();
                    });
              });

              /*****reg popup************/
            $(".reg").bind('click',function(){

                    $('.login_li a').removeClass('active');
                    $('.header_li a').removeClass('active');

                    $("#pannel_filter").hide();
                    $(".log_show_div").hide();
                    $("#filter").addClass('fltr_only');
                    $("#filter").css({'background': '#F3F4F5','color': '#777777','border':'0px solid #FF285B'});
                    $('#filter').removeAttr( 'style' );	
                    $('.toggle').css('margin-top','0px');


                    $("#pannel_show_down").hide();
                    $(".log_show_div").hide();
                    $("#flip").addClass('in_active');
                    $('.bars_icons a em').css('background-position','0px 3px');
                    $('.bars_icons a em').removeAttr( 'style' );


                    $('.register_li a').addClass('active');
               window.onkeyup = function (event) {
                            if (event.keyCode == 27) {

                                    $('#login').hide();
                                    $("#register").hide();
                                    $("#forgot_pass").hide();
                                $("#reset_pass").hide();
                                    $('.register_li a').removeClass('active');
                                    $('.mask1').hide();
                                    $('.pop_outer').css('display','block');
                            }
                    }

                    $("#login").hide();
                    $('.mask1').hide();
                    $("#register").show();
                    //var $div = $('<div />').appendTo('body');
                    //$div.attr('class', 'mask1');
                    $(".close").click(function(){
                            $("#login").hide();
                            $("#register").hide();
                            $("#forgot_pass").hide();
                            $("#reset_pass").hide();
                            $(".mask1").removeClass();
                    });

                    $(".mask1").bind('click',function(){
                            $("#login").hide();
                            $("#register").hide();
                            $("#forgot_pass").hide();
                            $("#reset_pass").hide();
                            $('.register_li a').removeClass('active');
                            $(this).removeClass();
                    });
              });
              /******for popup*********/


            $("#r_click").bind('click',function(){
                    $("#login").hide();
                    $("#register").show();

            });

            $("#forgotpass").bind('click',function(){
              window.onkeyup = function (event) {
                            if (event.keyCode == 27) {

                                    $('#login').hide();
                                    $("#register").hide();
                                    $('.mask1').hide();
                                    $("#forgot_pass").hide();
                                $("#reset_pass").hide();
                            }
                    }


                $("#forgot_pass").show();
                //var $div = $('<div />').appendTo('body');
                //$div.attr('class', 'mask1');
                        $("#login").hide();

                        $(".close_pass_popup").bind('click',function(){
                                        $("#login").hide();
                                        $("#register").hide();
                                        $("#forgot_pass").hide();
                                        $(".mask1").removeClass();
                                });

                        $(".mask1").bind('click',function(){

                                        $("#login").hide();
                                        $("#register").hide();
                                        $("#forgot_pass").hide();
                                        $("#reset_pass").hide();

                                        $(".mask1").removeClass();
                                });

            });
            jQuery('.hs nav').meanmenu();
			  
});
function hidemask(){
	$(".mask1").hide();
}
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-46285679-1', 'thewedly.com');
ga('require', 'displayfeatures');
ga('send', 'pageview');

/*$('#signinform').validate();
        jQuery.validator.addMethod("required_email1",function(value,element) {
                if(value=='Email' || value=="")
                {	
                return false;
                } else {
                return true;;	
                }
} ,'This field is required');

        jQuery.validator.addMethod("required_password",function(value,element) {
                if(value=='Password' || value=="")
                {	
                return false;
                } else {
                return true;;	
                }
} ,'This field is required');
$("#password").rules('add',{minlength: 6,
messages: {minlength: "Password should be atleast 6 characters long."}});
*/
$('#yahooLg').click(function()
{ 	
    $.ajax
    ({
               url:ajax_url+'Homes/getYahoo_authUrl',
               success:function(response)
               {   
                       location.href = response;
               }
    });
});
/*
$("#forgot_password").validate({
        rules:
                {
                        "data[Member][email]":
                {
                        remote: ajax_url+'Members/checkForgotEmail'
                }	
        },
        messages:
        {			  
          "data[Member][email]":
          {
                  required: "This field is required",			 
                  remote:   "Email does not exists"
          }		  
        }	
});
		
$('#reset_password').validate();

$("#resetPassword").rules('add',{minlength: 6,
messages: {minlength: "Password should be atleast 6 characters long."}});

$("#reconfirm_password").rules('add',{equalTo: "#resetPassword",
messages: {equalTo: "Password and confirm password do not match"}});*/

//<?php if(($this->Session->check('error') || $this->Session->check('success')) && empty($user_login)){  ?>  
$("#login").show();		
//var $div = $('<div />').appendTo('body');
//$div.attr('class', 'mask1');
$(".mask1").show(); 
window.onkeyup = function(event) {
    if (event.keyCode == 27) {

            $('#login').hide();
            $('.error').hide();
            $("#register").hide();
    $('.mask1').hide();
            $(".response-msg").hide();
            $("#forgot_pass").hide();
            $("#reset_pass").hide();
    }
}	 
$(".mask1").click(function(){
    $("#login").hide();
    $("#register").hide();
    $('.error').hide();
    $(".response-msg").hide();
    $("#forgot_pass").hide();
    $("#reset_pass").hide();
    $(this).removeClass();
});
//<?php } ?>

//<?php if($this->Session->check('success_forget') || $this->Session->check('success')) { ?>
$("#forgot_pass").show();
$("#login").hide();
//var $div = $('<div />').appendTo('body');
//$div.attr('class', 'mask1');
$(".mask1").show(); 

window.onkeyup = function(event) {
    if (event.keyCode == 27) {
        $('#login').hide();
        $("#register").hide();
        $('.mask1').hide();
        $(".response-msg").hide();
        $("#forgot_pass").hide();
        $("#reset_pass").hide();
    }
}	 
$(".mask1").click(function(){
    $("#login").hide();
    $("#register").hide();
    $(".response-msg").hide();
    $('.error').hide();
    $("#forgot_pass").hide();
    $("#reset_pass").hide();
    $(this).removeClass();
});
$(".close_pass_popup").click(function(){
    $("#forgot_pass").hide();
    $(".mask1").removeClass();
});
//<?php } ?>

//<?php if($this->Session->check('reset_page') || $this->Session->check('success_reset') || $this->Session->check('success')) { ?>
$("#reset_pass").show();
$("#login").hide();
//var $div = $('<div />').appendTo('body');
//$div.attr('class', 'mask1');
$(".mask1").show(); 

window.onkeyup = function(event) {
    if (event.keyCode == 27) {
        $('#login').hide();
        $("#register").hide();
        $('.mask1').hide();
        $(".response-msg").hide();
        $("#forgot_pass").hide();
        $("#reset_pass").hide();
    }
}	 
$(".mask1").click(function(){
     $("#login").hide();
     $("#register").hide();
     $(".response-msg").hide();
     $("#forgot_pass").hide();
     $("#reset_pass").hide();
     $(this).removeClass();
});
$(".close_pass_popup").click(function(){
    $("#reset_pass").hide();
    $(".mask1").removeClass();
});
//<?php } unset($_SESSION['reset_page']); ?>

$('#flip').click(function(){ 
    $('#pannel_show_down').toggle();
    if($('#pannel_show_down').css('display') == 'block'){
        $('#flip > em').addClass('active');
    }else{
        $('#flip > em').removeClass('active');
    }
});

$('.header_li a').removeClass('active');
				
			$("#pannel_filter").hide();
			$(".log_show_div").hide();
			$("#filter").addClass('fltr_only');
			$("#filter").css({'background': '#F3F4F5','color': '#777777','border':'0px solid #FF285B'});
			$('#filter').removeAttr( 'style' );	
			$('.toggle').css('margin-top','0px');
			
			
			$("#pannel_show_down").hide();
			$(".log_show_div").hide();
			$("#flip").addClass('in_active');
			$('.bars_icons a em').css('background-position','0px 3px');
			$('.bars_icons a em').removeAttr( 'style' );
			
			$('.register_li a').removeClass('active');
			
			$('.login_li a').addClass('active');
			
			
			$("#login").show();	
			$("#signinform input:text").first().focus();			
			//var $div = $('<div />').appendTo('body');
			 //$div.attr('class', 'mask1');
			$(".mask1").show(); 
			window.onkeyup = function(event) {
			if (event.keyCode == 27) {
				
				$('#login').hide();
				$('.error').hide();
				$("#register").hide();
        		$('.mask1').hide();
				$(".response-msg").hide();
				$("#forgot_pass").hide();
				$("#reset_pass").hide();
			}
		    }	 
		    $(".mask1").click(function(){
		        $("#login").hide();
		        $("#register").hide();
				$('.error').hide();
				$(".response-msg").hide();
				$("#forgot_pass").hide();
				$("#reset_pass").hide();
				
				$('.login_li a').removeClass('active');
				$(this).removeClass();
				$('.pop_outer').css('display','block');
	        });

window.onkeyup = function(event) {
			if (event.keyCode == 27) {
				
				$('#login').hide();
				$("#register").hide();
        		$('.mask1').hide();
				$(".response-msg").hide();
				$("#forgot_pass").hide();
				$("#reset_pass").hide();
			}
		    }	 
			$(".mask1").click(function(){
				$("#login").hide();
				$("#register").hide();
				$(".response-msg").hide();
				$('.error').hide();
				$("#forgot_pass").hide();
				$("#reset_pass").hide();
				$(this).removeClass();
			});
			$(".close_pass_popup").click(function(){
				$("#forgot_pass").hide();
				$(".mask1").removeClass();
				});
                                
                     $("#reset_pass").show();
			   $("#login").hide();
			   	//var $div = $('<div />').appendTo('body');
			    //$div.attr('class', 'mask1');
			    $(".mask1").show(); 
			
			window.onkeyup = function(event) {
			if (event.keyCode == 27) {
				
				$('#login').hide();
				$("#register").hide();
        		$('.mask1').hide();
				$(".response-msg").hide();
				$("#forgot_pass").hide();
				$("#reset_pass").hide();
			}
		    }	 
			$(".mask1").click(function(){
				$("#login").hide();
				$("#register").hide();
				$(".response-msg").hide();
				$("#forgot_pass").hide();
				$("#reset_pass").hide();
				$(this).removeClass();
			});
			$(".close_pass_popup").click(function(){
				$("#reset_pass").hide();
				$(".mask1").removeClass();
				});
                                
                                $(function(){
				$('.slide-out-div').tabSlideOut({
					tabHandle: '.handle',                              //class of the element that will be your tab
					pathToTabImage: ajax_url+'/assets/images/contact_tab.png',//path to the image for the tab (optionaly can be set using css)
					imageHeight: '122px',                               //height of tab image
					imageWidth: '40px',                               //width of tab image    
					tabLocation: 'left',                               //side of screen where tab lives, top, right, bottom, or left
					speed: 300,                                        //speed of animation
					action: 'click',                                   //options: 'click' or 'hover', action to trigger animation
					//topPos: '200px',                                   //position from the top
					fixedPosition: false                               //options: true makes it stick(fixed position) on scroll
				});
			   
			});
$(function () {
		$("#feedback_cat").selectbox();
		$("#feedback_sub_cat").selectbox();

	});
	
		
	$(document).ready(function(){
	
	
	$('.feed_back_p').bind('click',function(){ 
				
				$('.feed_back_p').removeClass('active');
				var catrel=$(this).attr('rel');
				$('.hid_cat_id').val(catrel);
				$('#fdcat'+catrel).addClass('active');
			
	});
			
	$('.fd_cal_btn').bind('click', function(){
		
			$('.blank_text').val('');
			$('.blank_text_email').val('');
			$('.feed_back_p').removeClass('active');
			$('#file_fake').val('');
			$('#fdcat1').addClass('active');
			
			$('.feedbackpopup12').hide();
			$('.slide-out-div').css("left" , -386);
			$('.slide-out-div').removeClass('open');
		
	});
	
	
	$('.feedbackpopup').hide();
	$('.select_error').hide();
	$('.age_error').hide();
		$('#feedback_cat').change(function(){
				$('.select_error').hide();
				var categoryId=$(this).val();
				$.ajax({
					type: 'POST',
					url: ajax_url+"Members/getSubCategory/"+categoryId,
					data: $(this).serialize(),
					success: function(returnedData) {
						$(".sub_category").html(returnedData);
					}

				});
		});
	
	//********Feedback Image Validation ***********//
					
				/*$('#feedback_data').validate({
					ignoreTitle: true
				});

			jQuery.validator.addMethod('feedback_img',function(value,element){ 
			if(value=="")
			{
				return true;
			}
			var ext_index=value.lastIndexOf('.');
			var ext=value.substring(ext_index+1);
			var ext_lcase=ext.toLowerCase();
			if(ext_lcase=='jpeg' || ext_lcase=='jpg' || ext_lcase=='png' || ext_lcase=='gif' || ext_lcase=='pdf' || ext_lcase=='doc')
			{
				return true;
			} else {
				return false;
			} }, "Invalid file format" );*/
			
			
			
	
	});	
	
	//****** form submission ******//
	$('#feedback_data').live('submit', function(e)
		{
			$('.sel_sub_cat_error_ajax').hide();
			$('.select_error').hide();
			$('.age_error').hide();
			var fedcat=$('#feedback_cat').val();
			var childFeedBack=$('.feedback_sub_cat').val();
			//alert(childFeedBack);
			if(fedcat=='' || childFeedBack=='')
			{
				if(fedcat=='')
				{
					$('.select_error').show();
					$('.select_error').html('This field is required');	
					
					$('.age_error').show();
					$('.age_error').html('Please select first category');
				}
				
				if(childFeedBack=='')
				{
					$('.sel_sub_cat_error_ajax').show();
					$('.sel_sub_cat_error_ajax').html('This field is required');	
					
				}
				
				return false;
			}else{
				e.preventDefault();
				$('.feedbackpopup12').show();
				$(this).ajaxSubmit({
			    success: function(msg) 
						{
								$('.feedbackpopup12').hide();
								//alert('Thanks for your feedback.')
								//location.reload(); 
								$('.slide-out-div').css("left" , -386);
								$('.slide-out-div').removeClass('open');
								$('.feedback_class').show();
								$('.feedback_class_content').text('Thanks for your feedback');
								setTimeout(function(){$(".feedback_class").fadeOut()},2000);
								return true;
						}
				});
			}			
	});