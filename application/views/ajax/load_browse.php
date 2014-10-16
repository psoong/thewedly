<?php foreach($portfolio->result() as $row): ?>
<?php #$this->Common->vdump($member); die(); ?>
<?php if(!empty($row->image) || !empty($row->video) || !empty($row->audio)): ?>
<?php 
    $member = $this->Member->load($row->member_id); 
    $pin_to = (!empty($member->title) && !empty($member->country_name))? $member->title . ' in '. $member->country_name : $member->title;
    switch($row->pin_type){
        case "image":
            $div_attrs = 'class="item" style="width:236px;height:'.($row->image_height+48).'px;"';
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
                    <?php if(strstr($row->video,"youtube.com")): ?>
                        <?php $vid_arr = explode("=", $row->video); ?>
                        <iframe width="236" height="250" src="http://www.youtube.com/embed/<?=$vid_arr[1]?>" frameborder="0" allowfullscreen></iframe>
                    <?php elseif(strstr($row->video,"vimeo.com")): ?>
                            <?php $vid_arr = explode("/", $row->video); ?>
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
            <?php if($row->pin_type == "video" || $row->pin_type == "image"): ?>
            <div class="isptop_social">
                <?php if($row->pin_type == "image"): ?>
                    <a hreflang="<?= $row->member_id ?>" logged_in="no" href="javascript:void(0)" title="Add to Album" rel='<?= $row->id ?>' class="pin_ad"><img class="so_add_img" src="<?= base_url("assets/images/add_grey.png") ?>"></a>
                    <a href="javascript:void(0)"><img src="<?= base_url("assets/images/facebook_grey.png") ?>"  rel="<?= base_url("assets/images/portfolio/search/".$row->image) ?>" class="fbsharebutton" id="fbsharebutton_img" desc="<?php echo ucwords($member->business_name);?>" /><a>
                    <a rel="<?= $row->member_id ?>"  class="goog_p_c" href="https://plus.google.com/share?url=<?= base_url("assets/images/portfolio/search/".$row->image) ?>" title="Google+"  onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;"><img class="so_google_img" src="<?= base_url("assets/images/google_grey.png") ?>"></a>
                    <a  rel="<?= $row->member_id ?>" class="pint_p_c" href="//pinterest.com/pin/create/button/?media=<?= base_url("assets/images/portfolio/search/".$row->image) ?>&description=<?=$pin_to?>&url=<?= base_url() ?>" title="Pinterest" target="_blank" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;"><img class="so_pint_img" src="<?= base_url("assets/images/pinterest_grey.png") ?>"></a>
                    <a rel="<?= $row->member_id ?>"  class="gmail_p_c" href="https://api.addthis.com/oexchange/0.8/forward/email/offer?url=<?php #echo HTTP_ROOT."Members/vendorProfile/"?><?php #echo base64_encode(convert_uuencode($pin['Portfolio']['member_id']));?>/?pin_id=<?php $row->id ?>&title=Weddingin Asia&description=Opis" title="Email" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=400');return false;"><img class="so_mail_img" src="<?= base_url("assets/images/mail_grey.png") ?>"></a>
                    <?php $senderId=0; #if(isset($_SESSION['Member']['id'])) { $senderId=$_SESSION['Member']['id']; } else { $senderId=0; }?>
                    <input id="pinAdd" type="hidden" name="data[AdminList][sender_id]" value="<?php echo $senderId;?>">
                <?php elseif($row->pin_type == "video"): ?>
                    <?php if(strstr($row->video,"youtube.com")): ?>
                        <?php $vid_arr = explode("=", $row->video); ?>
                        <a hreflang="<?= $row->member_id ?>" logged_in="no" href="javascript:void(0)" class="pin_ad" rel='<?= $row->id ?>' title="Add to Album"><img class="so_add_img" src="<?= base_url("assets/images/add_grey.png") ?>"></a>
                        <a href="javascript:void(0)"><img src="<?= base_url("assets/images/facebook_grey.png") ?>"  rel="<?php echo $vid_arr[1] ?>" class="fbsharebutton" id="fbsharebutton_vid" /><a>
                        <a rel="<?= $row->member_id ?>" class="goog_p_c" href="https://plus.google.com/share?url=http://youtube.com/watch?v=<?php echo $vid_arr[1]; ?>" title="Google+" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;"><img class="so_google_img" src="<?= base_url("assets/images/google_grey.png") ?>"></a>
                        <a rel="<?= $row->member_id ?>" class="pint_p_c" href="//pinterest.com/pin/create/button/?url=<?= base_url() ?>&media=http://img.youtube.com/vi/<?php echo $vid_arr[1] ?>/mqdefault.jpg&description=<?=$pin_to?>" title="Pinterest" target="_blank" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;"><img class="so_pint_img" src="<?= base_url("assets/images/pinterest_grey.png") ?>"></a>
                        <a rel="<?= $row->member_id ?>"  class="gmail_p_c" href="https://api.addthis.com/oexchange/0.8/forward/email/offer?url=<?php #echo HTTP_ROOT."Members/vendorProfile/"?><?php #echo base64_encode(convert_uuencode($pin['Portfolio']['member_id']));?>/?pin_id=<?php $row->id ?>&title=Weddingin Asia&description=Opis" title="Email" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=400');return false;"><img class="so_mail_img" src="<?= base_url("assets/images/mail_grey.png") ?>"></a>
                        <a  rel="<?= $row->id ?>" class="videos_click" href=""><img src="<?= base_url("assets/images/video_grey.png") ?>" class="videos_click_img"></a>
                    <?php elseif(strstr($row->video,"vimeo.com")): ?>
                        <?php $vid_arr = explode("/", $row->video); ?>
                        <a hreflang="<?= $row->member_id ?>" logged_in="no" href="javascript:void(0)" class="pin_ad" rel='<?= $row->id ?>' title="Add to Album"><img class="so_add_img" src="<?= base_url("assets/images/add_grey.png") ?>"></a>
                        <a href="javascript:void(0)"><img src="<?= base_url("assets/images/facebook_grey.png") ?>"  rel="<?php echo $vid_arr[1] ?>" class="fbsharebutton" id="fbsharebutton_vid_vimeo" /><a>
                        <a rel="<?= $row->member_id ?>" class="goog_p_c" href="https://plus.google.com/share?url=http://vimeo.com/<?php echo $vid_arr[1]; ?>" title="Google+" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;"><img class="so_google_img" src="<?= base_url("assets/images/google_grey.png") ?>"></a>
                        <a rel="<?= $row->member_id ?>" class="pint_p_c" href="//pinterest.com/pin/create/button/?url=<?= base_url() ?>&media=<?= base_url("assets/images/wedly_logo.png") ?>&description=The%20Wedly%3A%20http://vimeo.com/<?php echo $vid_arr[1]; ?>" title="Pinterest" target="_blank" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;"><img class="so_pint_img" src="<?= base_url("assets/images/pinterest_grey.png") ?>"></a>
                        <a rel="<?= $row->member_id ?>"  class="gmail_p_c" href="https://api.addthis.com/oexchange/0.8/forward/email/offer?url=<?php #echo HTTP_ROOT."Members/vendorProfile/"?><?php #echo base64_encode(convert_uuencode($pin['Portfolio']['member_id']));?>/?pin_id=<?php $row->id ?>&title=Weddingin Asia&description=Opis" title="Email" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=400');return false;"><img class="so_mail_img" src="<?= base_url("assets/images/mail_grey.png") ?>"></a>
                        <a  rel="<?= $row->id ?>" class="videos_click" href=""><img src="<?= base_url("assets/images/video_grey.png") ?>" class="videos_click_img"></a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <?php endif; ?>
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