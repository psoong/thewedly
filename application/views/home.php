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
                                </a>
                            </div>
                            <div class="vendor">
                                    <?php $member = $this->Member->load($row->member_id); ?>
                                    <div class="caption-title"> 	
                                            <p class="pinned-by">
                                                    <a href="<?= base_url("Members/vendorProfile/".base64_encode(convert_uuencode($row->member_id))) ?>" rel="<?= $row->member_id ?>" class="user"><?php echo ucwords($member->business_name);?></a>
                                            </p>
                                            <p class="pinned-to">
                                                    <a href="javascript:void(0)" class="category"><?= $member->title . ' in '. $member->country_name ?></a>
                                            </p>
                                            <div class="clear-left"></div>
                                    </div>
                            </div>	
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <span style="text-align:centre;">Sorry, No records found.</span>
            <?php endif; ?>
        </div>
    </div>
</div>

