window.fbAsyncInit = function() {
  FB.init({
    appId      : '646730485446032',
    xfbml      : true,
    status     : true,
    version    : 'v2.1'
  });
};
function faceLogin(){
         FB.login(function(response) {
           if (response.authResponse) {
                 FB.api('/me', function(response) {
                        $('input[id=facebook_login_fb]').val(response['id']);
                        $('#fb_login_form').submit();
                 });
           } else {
                 console.log('User cancelled login or did not fully authorize.');
           }
         }, {scope: 'email,user_photos'}); 	
};
function Login() {
        FB.login(function(response) {
           if (response.authResponse) {
                 FB.api('/me', function(response) {
                        var str;
                        str = response['id'] + ";\n" +
                        response['name'] + ";\n" +
                        response['first_name'] + ";\n" +
                        response['last_name'] + ";\n" +
                        response['birthday'] + ";\n" +
                        response['gender'] + ";\n" +
                        response['username'] + ";\n" +
                        response['phone'] + ";\n" +
                        response['email'];
                        $('input[id=full_name]').val(response['name']);
                        $('input[id=first_name_fb]').val(response['first_name']);
                        $('input[id=last_name_fb]').val(response['last_name']);
                        $('input[id=email_fb]').val(response['email']);
                        $('input[id=facebook_id_fb]').val(response['id']);

                        if(response['hometown']!=undefined)
                        {
                                $('input[id=hometown]').val(response['hometown']['name']);
                        }
                        $('#fb_registration_form').submit();
                 });
           } else {
                 console.log('User cancelled login or did not fully authorize.');
           }
         }, {scope: 'email,user_birthday,user_photos,user_hometown,user_location'});
};
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
});	
	
//****** form submission ******//
$('#feedback_data').live('submit', function(e){
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
        
function create_mask(){
    hide_popup();
    var $div = $('<div />').appendTo('body');
    $div.attr('class', 'mask1');
    $("div[class^=mask]").click(function(){ hide_popup(); });
}
function remove_mask(){ $('div[class^=mask]').remove(); }
function hide_popup(){
    $(".pop_outer > div").hide();
    remove_mask();
}
$('.edt_pop_block_inner').bind('clickoutside', function(event) {  hide_popup(); });
$(".remove").click(function(){ hide_popup(); });
window.onkeyup = function (event) { if (event.keyCode == 27) { hide_popup(); } }