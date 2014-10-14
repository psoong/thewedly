<?php  echo $this->Html->script('newadmin/sidebar_position.js');?>
<div id="page-layout">
	<div id="page-content">
		<div id="page-content-wrapper">
			<div class="inner-page-title">
				<h2>Registered Users Listing</h2>  
                 <div class="editorial_link">
                 <a href="<?php echo HTTP_ROOT.'admin/Users/dashboard' ;?>">Admin</a> &gt;
                 	<a href="#">User Management
                    </a> 
                    &gt; Users List	
                </div>
                
                <a onclick="" href="<?php echo HTTP_ROOT.'admin/Users/add_user' ;?>" class="ui-state-default ui-corner-all float-right ui-button" style="margin-top:-10px;">Add New User</a>
				
			</div>
			<?php if($this->Session->check('success')){ ?>
				<div class="response-msg success ui-corner-all">
					<span>Success message</span>
					<?php echo $this->Session->read('success');?>
				</div>
				<?php $this->Session->delete('success'); ?>
			<?php } ?>
            
            <?php if($this->Session->check('error')){ ?>
				<div class="response-msg error ui-corner-all">
					<span>Error message</span>
					<?php echo $this->Session->read('error');?>
				</div>
				<?php $this->Session->delete('error'); ?>
			<?php } ?>
			
          
            <?php echo $this->element('adminElements/table_head');?>
            
			<div class="content-box content-box-header" id="pagingDivParent" style="border:none;">            
				<?php echo $this->element('adminElements/users/users_list');?>
			</div>
            
			<div class="clearfix"></div>
			
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div class="clear"></div>