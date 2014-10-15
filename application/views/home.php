<div id="bottom_container">
    <div class="pin_bodi toggle toggle_margin_top" accesskey="">
        <div id="board_main">
            <?php if($portfolio->num_rows()): ?>
                <div id="board">
                    <?php foreach($portfolio->result() as $row): ?>
                    <?php #$this->Common->vdump($member); die(); ?>
                    <?php if(!empty($row->image)): ?>
                    <div class="element bx_shdw" id="<?= $row->id ?>">
                        <div class="item" style="width:236px;height:<?= $row->image_height+48 ?>">
                            <div class="zoom_outers" rel="<?= $row->id ?>">
                                <a href="javascript:void(0)" class="pin-img-link">
                                    <img class="large_image" src="<?= base_url("assets/images/portfolio/search/".$row->image) ?>" alt="" width="236" height="<?= $row->image_height ?>" />
                                    <div class="isptop_social">
                                        <a hreflang="<?php #echo $pin['Member']['id']?>" href="javascript:void(0)" title="Add to Album" rel='<?= $row->id ?>' class="pin_ad"><img class="so_add_img" src="<?= base_url("assets/images/add_grey.png") ?>"></a>
                                        <a href="javascript:void(0)"><img src="<?= base_url("assets/images/facebook_grey.png") ?>"  rel="<?= base_url("assets/images/portfolio/search/".$row->image) ?>" class="fbsharebutton" id="fbsharebutton_img" /><a>
                                        <a rel="<?php #echo $pin['Member']['id']?>"  class="goog_p_c" href="https://plus.google.com/share?url=<?php #echo HTTP_ROOT."img/portfolio/search/"?><?php #echo $pin['Portfolio']['image'];?>" title="Google+"  onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;"><img class="so_google_img" src="<?= base_url("assets/images/google_grey.png") ?>"></a>
                                        <a  rel="<?php #echo $pin['Member']['id']?>" class="pint_p_c" href="//pinterest.com/pin/create/button/?url=<?php #echo HTTP_ROOT?>Homes/index/&media=<?php #echo HTTP_ROOT."img/portfolio/search/"?><?php #echo $pin['Portfolio']['image'];?>&description=Wedding%20In%20Asia%3A%20<?php #echo $pin['Category']['title']; ?>%20in%20<?php #echo $pin['Member']['CountryLocation']['country_name']; ?>"" title="Pinterest" target="_blank" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;"><img class="so_pint_img" src="<?= base_url("assets/images/pinterest_grey.png") ?>"></a>
                                        <a rel="<?php #echo $pin['Member']['id']?>"  class="gmail_p_c" href="https://api.addthis.com/oexchange/0.8/forward/email/offer?url=<?php #echo HTTP_ROOT."Members/vendorProfile/"?><?php #echo base64_encode(convert_uuencode($pin['Portfolio']['member_id']));?>/?pin_id=<?php #echo $pin['Portfolio']['id'];?>&title=Weddingin Asia&description=Opis" title="Email" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=400');return false;"><img class="so_mail_img" src="<?= base_url("assets/images/mail_grey.png") ?>"></a>
                                        <?php $senderId=0; #if(isset($_SESSION['Member']['id'])) { $senderId=$_SESSION['Member']['id']; } else { $senderId=0; }?>
                                        <input id="pinAdd" type="hidden" name="data[AdminList][sender_id]" value="<?php echo $senderId;?>">
                                    </div>
                                </a>
                            </div>
                            <div class="vendor">
                                    <?php $member = $this->Member->load($row->member_id); ?>
                                    <div class="caption-title"> 	
                                            <p class="pinned-by">
                                                    <a href="<?= base_url("Members/vendorProfile/".base64_encode(convert_uuencode($row->member_id))) ?>" rel="<?= $row->member_id ?>" class="user"><?php echo ucwords($member->business_name);?></a>
                                            </p>
                                            <p class="pinned-to">
                                                    <?php $pin_to = (!empty($member->title) && !empty($member->country_name))? $member->title . ' in '. $member->country_name : $member->title; ?>
                                                    <a href="javascript:void(0)" class="category"><?= $pin_to ?></a>
                                            </p>
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

