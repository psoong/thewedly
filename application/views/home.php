<div class="pop_outer">
    <div class="pop_inner log_block_width margin_adjust"  id="login_first">
        <div class="login_block log_block_width z_space main_ab_cntr">
            <div class="edt_pop_block_inner">
                    <div class="head_block_width rec_g">
                            <h2 class="login_heading jne_lbek"><label>To add photos to an album, you will first need to login as a registered user</label></h2>
                    </div>

                    <div class="cover_bottom_block head_block_width adj_wdh_delne">
                            <input type="submit" value="OK" class="remove">
                    </div>
            </div>
        </div>
    </div>
</div>
<div id="bottom_container">
    <div class="pin_bodi toggle toggle_margin_top" accesskey="">
        <div id="board_main">
            <?php if($portfolio->num_rows()): ?>
                <div id="board">
                    <?php foreach($portfolio->result() as $row): ?>
                    <?php #$this->Common->vdump($member); die(); ?>
                    <?php if(!empty($row->image) || !empty($row->video) || !empty($row->audio)): ?>
                    <?php 
                        $member = $this->Member->load($row->member_id); 
                        $pin_to = (!empty($member->title) && !empty($member->country_name))? $member->title . ' in '. $member->country_name : $member->title;
                        switch($row->pin_type){
                            case "image":
                                $div_attrs = 'class="item" style="width:236px;height:'.($row->image_height+48).'"';
                            break;
                            case "video":
                                $div_attrs = 'class="item" style="width:236px; height:300px;"';
                            break;
                            case "audio":
                                $div_attrs = 'class="player_adujst_back item" style="width:236px; height:277px;"';
                            break;
                            default : continue; break;
                        }
                    ?>
                    <div class="element bx_shdw" id="<?= $row->id ?>">
                        <div <?= $div_attrs ?> >
                            <div class="zoom_outers" rel="<?= $row->id ?>">
                                <a href="javascript:void(0)" class="pin-img-link">
                                    <?php if($row->pin_type == "video"): ?>
                                        <?php $vid_arr = explode("=", $row->video); ?>
                                        <?php if(strstr($row->video,"youtube.com")): ?>
                                            <object width="236" height="250">
                                                <param name="movie" value="http://www.youtube.com/v/<?=$vid_arr[1]?>?hl=en_US&amp;version=3"></param>
                                                <param name="allowFullScreen" value="true"></param>
                                                <param name="allowscriptaccess" value="always"></param>
                                                <embed src="http://www.youtube.com/v/<?=$vid_arr[1]?>?hl=en_US&version=3" type="application/x-shockwave-flash" width="236" height="250" allowscriptaccess="always" allowfullscreen="true"></embed>
                                            </object>
                                        <?php elseif(strstr($row->video,"vimeo.com")): ?>
                                                <iframe src="//player.vimeo.com/video/<?= $vid_arr[1] ?>" width="236" height="250" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                        <?php endif; ?>
                                    <?php elseif($row->pin_type == "audio"): ?>
                                        <div class="player_adujst play_ad_home">&nbsp;
                                            <div id="jquery_jplayer_1" class="cp-jplayer"></div>
                                            <div id="cp_container_1" class="cp-container">
                                                    <div class="cp-buffer-holder"> <!-- .cp-gt50 only needed when buffer is > than 50% -->
                                                            <div class="cp-buffer-1"></div>
                                                            <div class="cp-buffer-2"></div>
                                                    </div>
                                                    <div class="cp-progress-holder"> <!-- .cp-gt50 only needed when progress is > than 50% -->
                                                            <div class="cp-progress-1"></div>
                                                            <div class="cp-progress-2"></div>
                                                    </div>
                                                    <ul class="cp-controls home_li_ply">
                                                            <li><a class="cp-play" tabindex="1"></a></li>
                                                            <li><a class="cp-pause"tabindex="1"></a></li> <!-- Needs the inline style here, or jQuery.show() uses display:inline instead of display:block -->
                                                    </ul>
                                            </div>	
                                        </div>
                                        <script type="text/javascript">
                                            $(document).ready(function(){
                                                var myCirclePlayer = new CirclePlayer("#jquery_jplayer_1",
                                                {
                                                        mp3:"<?= base_url("assets/images/portfolio/audio/".$row->audio) ?>",
                                                }, {
                                                        cssSelectorAncestor: "#cp_container_1",
                                                        swfPath: "<?= base_url("assets/js/frontend") ?>",
                                                        supplied: "mp3",
                                                        wmode: "window"
                                                });
                                            });
                                        </script>
                                    <?php else: ?>
                                        <img class="large_image" src="<?= base_url("assets/images/portfolio/search/".$row->image) ?>" alt="" width="236" height="<?= $row->image_height ?>" />
                                    <?php endif; ?>
                                </a>
                                <div class="isptop_social">
                                    <a hreflang="<?= $row->member_id ?>" logged_in="no" href="javascript:void(0)" title="Add to Album" rel='<?= $row->id ?>' class="pin_ad"><img class="so_add_img" src="<?= base_url("assets/images/add_grey.png") ?>"></a>
                                    <a href="javascript:void(0)"><img src="<?= base_url("assets/images/facebook_grey.png") ?>"  rel="<?= base_url("assets/images/portfolio/search/".$row->image) ?>" class="fbsharebutton" id="fbsharebutton_img" desc="<?php echo ucwords($member->business_name);?>" /><a>
                                    <a rel="<?= $row->member_id ?>"  class="goog_p_c" href="https://plus.google.com/share?url=<?= base_url("assets/images/portfolio/search/".$row->image) ?>" title="Google+"  onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;"><img class="so_google_img" src="<?= base_url("assets/images/google_grey.png") ?>"></a>
                                    <a  rel="<?= $row->member_id ?>" class="pint_p_c" href="//pinterest.com/pin/create/button/?media=<?= base_url("assets/images/portfolio/search/".$row->image) ?>&description=<?=$pin_to?>&url=<?= base_url() ?>" title="Pinterest" target="_blank" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;"><img class="so_pint_img" src="<?= base_url("assets/images/pinterest_grey.png") ?>"></a>
                                    <a rel="<?= $row->member_id ?>"  class="gmail_p_c" href="https://api.addthis.com/oexchange/0.8/forward/email/offer?url=<?php #echo HTTP_ROOT."Members/vendorProfile/"?><?php #echo base64_encode(convert_uuencode($pin['Portfolio']['member_id']));?>/?pin_id=<?php #echo $pin['Portfolio']['id'];?>&title=Weddingin Asia&description=Opis" title="Email" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=400');return false;"><img class="so_mail_img" src="<?= base_url("assets/images/mail_grey.png") ?>"></a>
                                    <?php $senderId=0; #if(isset($_SESSION['Member']['id'])) { $senderId=$_SESSION['Member']['id']; } else { $senderId=0; }?>
                                    <input id="pinAdd" type="hidden" name="data[AdminList][sender_id]" value="<?php echo $senderId;?>">
                                </div>
                            </div>
                            <div class="vendor">
                                    <div class="caption-title"> 	
                                            <p class="pinned-by">
                                                    <a href="<?= base_url("Members/vendorProfile/".base64_encode(convert_uuencode($row->member_id))) ?>" rel="<?= $row->member_id ?>" class="user"><?php echo ucwords($member->business_name);?></a>
                                            </p>
                                            <p class="pinned-to"><a href="javascript:void(0)" class="category"><?= $pin_to ?></a></p>
                                            <div class="clear-left"></div>
                                    </div>
                            </div>	
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $portfolio->free_result(); ?>
                </div>
            <?php else: ?>
                <span style="text-align:centre;">Sorry, No records found.</span>
            <?php endif; ?>
        </div>
        <div class="popUp"></div>
         <div id="lastPostsLoader" style="display:none;bottom:8px;left: 47%;position: absolute; z-index: 2147483647;">
                <div class="loader_status">
                        <img class="chart_loading8" src="<?= base_url("assets/images/ajax-loader.gif") ?>"/>
                        <span class="ldr_sn">Loading...</span>
                </div>
        </div>

        <div id="lastPostsLoader_empty" style="display:none;bottom:8px;left: 47%;position: absolute; z-index: 2147483647;">
                <div class="loader_status" style="width: 123px;padding-left:8px;">
                        <span class="ldr_sn">No more result...</span>
                </div>
        </div>
    </div>
</div>

