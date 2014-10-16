<div class="clear"></div>
<div class="mask"></div>
</div>
</div>
<a href="javascript:void(0);" id="back-top"></a>
</body>
<script type="text/javascript" src="<?=base_url("assets/js/frontend/jquery.js")?>"></script>
<script type="text/javascript" src="<?=base_url("assets/js/frontend/jquery.meanmenu.js")?>"></script>
<script type="text/javascript" src="<?=base_url("assets/js/newadmin/common.js")?>"></script>
<script type="text/javascript" src="<?=base_url("assets/js/frontend/jquery.isotope.js")?>"></script>
<script type="text/javascript" src="<?=base_url("assets/js/ui.js")?>"></script>
<script type="text/javascript" src="<?=base_url("assets/js/frontend/jquery.jcarousel.min.js")?>"></script>
<script type="text/javascript" src="<?=base_url("assets/js/frontend/jquery.selectbox-0.2.js")?>"></script>
<script type="text/javascript" src="<?=base_url("assets/js/frontend/jquery.jplayer.min.js")?>"></script>
<script type="text/javascript" src="<?=base_url("assets/js/jquery.timepicker.min.js")?>"></script>
<!--<script type="text/javascript" src="<?=base_url("assets/js/jquery.validate.js")?>"></script>-->
<script type="text/javascript" src="<?=base_url("assets/js/frontend/circle.player.js")?>"></script>
<script type="text/javascript" src="<?=base_url("assets/js/frontend/jquery-ui.min.js")?>"></script>
<script type="text/javascript" src="<?=base_url("assets/js/frontend/jquery.formLabels.js")?>"></script>
<script type="text/javascript" src="<?=base_url("assets/js/frontend/shCore.js")?>"></script>
<script type="text/javascript" src="<?=base_url("assets/js/frontend/init.js")?>"></script>
<script type="text/javascript" src="<?=base_url("assets/js/frontend/jquery.tabSlideOut.v1.3.js")?>"></script>
<script type="text/javascript" src="<?=base_url("assets/js/frontend/script-centered.js")?>"></script>
<script type="text/javascript" src="<?=base_url("assets/js/jquery.form.js")?>"></script>
<script type="text/javascript" src="<?=base_url("assets/js/application.js")?>"></script>
<?php if($title == 'Home'): ?>
<script type="text/javascript" src="<?=base_url("assets/js/home.js")?>"></script>
<?php endif; ?>
<?php 
    $response_type1 = "code";
    $client_id1     = "38789626348.apps.googleusercontent.com";
    $redirect_uri1  = base_url("google_login");

    $scope1 = "https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile";
    $state1 = "access";
?>
<script type="text/javascript">
function student_google_login(){
    window.open("https://accounts.google.com/o/oauth2/auth?response_type=<?php echo $response_type1;?>&client_id=<?php echo $client_id1;?>&redirect_uri=<?php echo $redirect_uri1;?>&scope=<?php echo $scope1;?>&state=<?php echo $state1;?>", height = 600, width = 400)
}
</script>

<div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js#appId=<?php echo '646730485446032';?>"></script>
<div style="display:none;">
    <form id="fb_registration_form"  action="<?= base_url('Members/facebookRegister') ?>" method="post">
            <input type="text" name="data[Member][email]" id="email_fb" value="" />
            <input type="text" name="data[Member][facebook_id]" id="facebook_id_fb" value="" />
            <input type="text" name="data[Member][user_name]" id="full_name" value="" />
            <input type="text" name="data[Member][first_name]" id="first_name_fb" value="" />
            <input type="text" name="data[Member][last_name]" id="last_name_fb" value="" />
            <input type="text" name="data[Member][hometown]" id="hometown" value="" />
    </form>
</div>

<form id="feedback_data" action="<?= base_url("Members/saveFeedbackData") ?>" method="post" enctype="multipart/form-data">
    <div class="feedbackpopup12" style="display:none;">
            <div class="loader_status">
                <img class="chart_loading8" src="<?=  base_url("assets/images/ajax-loader.gif") ?>"/>
                    <span class="ldr_sn">Loading...</span>
            </div>
    </div>
    <div class="slide-out-div">
                    <a class="handle" href="http://link-for-non-js-users">Content</a>
                <h2 class="imp_tail">Tell Us How We Can Improve</h2>
                    <div class="submit_formgap"> 
                            <div class="active_btns">
                                <a rel="1" class="feed_back_p active"  id="fdcat1" href="javascript:void(0);">Question</a>
                                    <a rel="2"  class="feed_back_p" id="fdcat2" href="javascript:void(0);">Problem</a>
                                    <a rel="3" class="feed_back_p" id="fdcat3" href="javascript:void(0);">Idea</a>
                                    <a rel="4" class="feed_back_p" id="fdcat4" href="javascript:void(0);">Praise</a>
                            </div>

                            <div class="slide_loginrepeat slide_textboxholders" id="text_box">
                                    <div class="feed_holder">
                                            <label>Your Feedback</label>
                                            <div class="slide_textboxholders">
                                                    <textarea rows="" cols="" name="data[Feedback][description]"  class="required blank_text"></textarea>
                                            </div> 
                                    </div>  	
                                    <input type="hidden" name="data[Feedback][category_id]" value="1" class="hid_cat_id"/>
                                    <div class="feed_holder">
                                            <label>Your Email (optional)</label>
                                            <div class="slide_textboxholders">
                                                    <input type="text" name="data[Feedback][sender_email]"  class="email blank_text_email" />
                                            </div> 
                                    </div>  


                                    <div class="s_upload">Upload Screenshot <span class="font_small">(jpg, gif, png, pdf)</span></div>
                                    <div class="slide_textboxholders image_error" style="margin-bottom:0; ">
                                            <span class="attach" id="feed_inp"> 
                                                    <input type="text" name="data[Feedback][image]" class="feedback_img" value="" id="file_fake" /> 
                                                    <span class="file up_file">
                                                            <input type="file"  class="file_select" name="upload" onchange="document.getElementById('file_fake').value = this.value.replace(/.*?[\/\\]([^\/\\]+)$/, '$1')" />
                                                            <input type="button" value="Upload" id="upload1" class="file_select_btn button feed_me_upload"/>
                                                    </span>
                                            </span>
                                    </div> 


                            </div>
                            <div class="slides_submits">
                                <input type="submit" value="Send" class="save_attach"/> 
                                    <input type="button" value="Cancel" id="sub_mit" class="fd_cal_btn"/>

                            </div>   

                </div> 
            </form>
    </div>
    <div class="clear"></div>
    <div class="mask"></div>
    <a href="javascript:void(0);" id="back-top"><!--<i class="icon-angle-up"></i>--></a>
    <div class="add_album_message feedback_class" style="display:none;">
        <div class="regist_pop_login_block" style="z-index: 999999;">
                <div class="new_login_inner sent_rev_mes feedback_class_content">

                </div>
        </div>
    </div>
</html>
