<!-- *********AddThis Script Start********* -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js"></script>
<!-- *********AddThis Script End********* -->
<script type="text/javascript">
	$(document).ready(function(){
	setTimeout( function() {$('.response-msg').hide();}, 4*1000);
	
		$('#board').isotope({
		  // options
		  itemSelector : '.element',
		  layoutMode : 'masonry'
		});
	
	});
	
	<?php if(!empty($_GET['ref'])) { ?>

		var cat_id= <?php echo convert_uudecode(base64_decode($_GET['ref']));?>;
		var cat_name='<?php echo $categoryName['Category']['title'];?>';
		var country_id_sel='<?php echo $couId; ?>';
		$("#country_only").attr('value', country_id_sel).attr('selected', 'selected');
		var con_id=$('#country_only :selected').val();
		var name=$('#country_only :selected').html();
		if(name!='Choose Country')
		{
			$('.cat_loc_fill').show();
			$('.cat_loc_fill').append('<div class="row_inner large" style="display:none;"></div>');
			$('#loc_selector').html(name);
			$('.row_inner_clear').show();
		}
		$('#con_hidden').val(country_id_sel);
		
		
		//$("#country_only[value='27']").attr('selected', 'selected');
		category_search(cat_id,cat_name);
		
		var contry_id=$('#country_only :selected').val();
			var data = "country_id="+contry_id;
			var url="<?php echo HTTP_ROOT;?>Homes/ajax_state_data";
			$.ajax({
				type:'POST',
				url:url,
				data:data,
				success:function(resp){
					$('.mystate').html(resp);
					return false;
				}
		});
		
			
		$("#pannel_show_down").hide();
		$(".log_show_div").hide();
		$("#flip").addClass('in_active');
		$('.bars_icons a em').css('background-position','0px 3px');
		$('.bars_icons a em').removeAttr( 'style' );
		
		$('#user_menu_tab').addClass('active_user_bar');
		$("#user_menu_tab").css({'background': '#F3F4F5','color': '#777777'});
		$('#user_menu_tab').removeAttr( 'style' );	
		
		if($('#filter').attr('class')=='input fltr_only'){
			$('#filter').removeClass('fltr_only');
			$('#filter').css({'background': '#FF285B','color': '#ffffff','border':'1px solid #FF285B', 'font-family': 'roboto_slabregular','font-size':'12px'});
			$('#filter').css({'border-radius':'3px'});
			$("#pannel_filter").show();
			$('#pin-modal-container .row').css('margin-top','123px');
			//$(".row_inner_clear").hide();
			$('.toggle').css('margin-top','47px');
			
			
		}else{
			$("#pannel_filter").hide();
			$('#pin-modal-container .row').css('margin-top','73px');
			$('#filter').addClass('fltr_only')
			$('.toggle').css('margin-top','0px');
			$("#filter").css({'background': '#F3F4F5','color': '#777777'});
			$('#filter').removeAttr( 'style' );	
		}
		
	<?php } ?>

/******/
	 $.Isotope.prototype._getCenteredMasonryColumns = function() {
	this.width = this.element.width();
	var parentWidth = this.element.parent().width();
	// i.e. options.masonry && options.masonry.columnWidth
	var colW = this.options.masonry && this.options.masonry.columnWidth ||
	// or use the size of the first item
	this.$filteredAtoms.outerWidth(true) ||
	// if there's no items, use size of container
	parentWidth;
	var cols = Math.floor( parentWidth / colW );
	cols = Math.max( cols, 1 );
	// i.e. this.masonry.cols = ....
	this.masonry.cols = cols;
	// i.e. this.masonry.columnWidth = ...
	this.masonry.columnWidth = colW;
	};
	$.Isotope.prototype._masonryReset = function() {
	// layout-specific props
	this.masonry = {};
	// FIXME shouldn't have to call this again
	this._getCenteredMasonryColumns();
	var i = this.masonry.cols;
	this.masonry.colYs = [];
	while (i--) {
	this.masonry.colYs.push( 0 );
	}
	};
	$.Isotope.prototype._masonryResizeChanged = function() {
	var prevColCount = this.masonry.cols;
	// get updated colCount
	this._getCenteredMasonryColumns();
	return ( this.masonry.cols !== prevColCount );
	};
	$.Isotope.prototype._masonryGetContainerSize = function() {
	var unusedCols = 0,
	i = this.masonry.cols;
	// count unused columns
	while ( --i ) {
	if ( this.masonry.colYs[i] !== 0 ) {
	break;
	}
	unusedCols++;
	}
	return {
	height : Math.max.apply( Math, this.masonry.colYs ),
	// fit container to columns that have been used;
	width : (this.masonry.cols - unusedCols) * this.masonry.columnWidth
	};
	};
	$(function(){
	var $container = $('#container');
	// add randomish size classes
	$container.find('.element').each(function(){
	var $this = $(this),
	number = parseInt( $this.find('.number').text(), 10 );
	if ( number % 7 % 2 === 1 ) {
	$this.addClass('width2');
	}
	if ( number % 3 === 0 ) {
	$this.addClass('height2');
	}
	});
	$container.isotope({
	itemSelector : '.element',
	masonry : {
	columnWidth : 120
	},
	getSortData : {
	symbol : function( $elem ) {
	return $elem.attr('data-symbol');
	},
	category : function( $elem ) {
	return $elem.attr('data-category');
	},
	number : function( $elem ) {
	return parseInt( $elem.find('.number').text(), 10 );
	},
	weight : function( $elem ) {
	return parseFloat( $elem.find('.weight').text().replace( /[\(\)]/g, '') );
	},
	name : function ( $elem ) {
	return $elem.find('.name').text();
	}
	}
	});
	var $optionSets = $('#options .option-set'),
	$optionLinks = $optionSets.find('a');
	$optionLinks.click(function(){
	var $this = $(this);
	// don't proceed if already selected
	if ( $this.hasClass('selected') ) {
	return false;
	}
	var $optionSet = $this.parents('.option-set');
	$optionSet.find('.selected').removeClass('selected');
	$this.addClass('selected');
	// make option object dynamically, i.e. { filter: '.my-filter-class' }
	var options = {},
	key = $optionSet.attr('data-option-key'),
	value = $this.attr('data-option-value');
	// parse 'false' as false boolean
	value = value === 'false' ? false : value;
	options[ key ] = value;
	if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
	// changes in layout modes need extra logic
	changeLayoutMode( $this, options )
	} else {
	// otherwise, apply new options
	$container.isotope( options );
	}
	return false;
	});
	$('#insert a').click(function(){
	var $newEls = $( fakeElement.getGroup() );
	$container.isotope( 'insert', $newEls );
	return false;
	});
	$('#append a').click(function(){
	var $newEls = $( fakeElement.getGroup() );
	$container.append( $newEls ).isotope( 'appended', $newEls );
	return false;
	});
	// change size of clicked element
	$container.delegate( '.element', 'click', function(){
	$(this).toggleClass('large');
	$container.isotope('reLayout');
	});
	// toggle variable sizes of all elements
	$('#toggle-sizes').find('a').click(function(){
	$container
	.toggleClass('variable-sizes')
	.isotope('reLayout');
	return false;
	});
	var $sortBy = $('#sort-by');
	$('#shuffle a').click(function(){
	$container.isotope('shuffle');
	$sortBy.find('.selected').removeClass('selected');
	$sortBy.find('[data-option-value="random"]').addClass('selected');
	return false;
	});
	}); 
	/****/

	$(document).ready(function() {
		$(window).scroll(function(){
			if($(window).scrollTop() == $(document).height() - $(window).height()){
				$.ajax({
					type: 'POST',
					url: ajax_url+"Homes/chk_next_pins_exist/"+$(".element:last").attr("id"),
					success: function(cnt) {
						if(cnt>0) {
							lastPostFunc();
						} else {
							//alert("sdf");
							//$('div#lastPostsLoader').empty();
							$('div#lastPostsLoader_empty').show();
							setTimeout(function(){$("div#lastPostsLoader_empty").fadeOut()},2000);
						}
					}
				});
			} 
			
		});
		

		var $scrollTop = $(window).scrollTop();
$('#back-top').show();
//starting bind
if( $('#back-top').length > 0 && $(window).width() > 1020) {
	
	if($scrollTop > 350){
		$(window).bind('scroll',hideToTop);
	}
	else {
		$(window).bind('scroll',showToTop);
	}
}


function showToTop(){
	
	if( $scrollTop > 350 ){
		
		$('#back-top').stop(true,true).animate({
			'bottom' : '1px'
		},350,'easeInOutCubic');	
		
		$(window).unbind('scroll',showToTop);
		$(window).bind('scroll',hideToTop);
	}

}

function hideToTop(){
	
	if( $scrollTop < 350 ){
		
		$('#back-top').stop(true,true).animate({
			'bottom' : '-30px'
		},350,'easeInOutCubic');	
		
		$(window).unbind('scroll',hideToTop);
		$(window).bind('scroll',showToTop);	
		
	}
}

//to top color
if( $('#back-top').length > 0 ) {
	
	var $windowHeight, $pageHeight, $footerHeight, $ctaHeight;
	
	function calcToTopColor(){
		$scrollTop = $(window).scrollTop();
		$windowHeight = $(window).height();
		$pageHeight = $('body').height();
		$footerHeight = $('#footer-outer').height();
		$ctaHeight = ($('#call-to-action').length > 0) ? $('#call-to-action').height() : 0;
		
		if( ($scrollTop-35 + $windowHeight) >= ($pageHeight - $footerHeight) && $('#boxed').length == 0){
			$('#back-top').addClass('dark');
		}
		
		else {
			$('#back-top').removeClass('dark');
		}
	}
	
	//calc on scroll
	$(window).scroll(calcToTopColor);
	
	//calc on resize
	$(window).resize(calcToTopColor);

}

//scroll up event
$('#back-top').click(function(){
	$('body,html').stop().animate({
		scrollTop:0
	},800,'easeOutCubic')
	return false;
});
		/*************/
		
	});	

	function lastPostFunc()
	{ 
		//$('div#lastPostsLoader').html('<img src="<?php echo HTTP_ROOT.'img/'?>lodaer_pins.GIF">');
		$('div#lastPostsLoader').show();
		//$.getScript(ajax_url+"app/webroot/js/frontend/jquery.isotope.js");
		var lastid=$(".element:last").attr("id");
		$.ajax({
			type: 'POST',
			url: ajax_url+"Homes/get_next_pins/"+$(".element:last").attr("id"),
			success: function(returnedData) {
				var $newItems = $(returnedData);
				$('#board').isotope('insert', $newItems );
				//$('div#lastPostsLoader').empty();
				$('div#lastPostsLoader').hide();
			}
		});
	}   

	$(document).ready(function(){
	
		$(".remove").live('click',function(){
			$("#login_first").hide();
			$("#login_first_ask").hide();
			$("#error_msg").hide();
			$(".mask1").hide();
			$('.log').trigger('click');
			return false;
		});
		
		$(".mask2").hide();
		$(".pin_ad").live('click',function(){
		var pin_id=$(this).attr('rel');
		var vendor_mem_id=$(this).attr('hreflang');
		var memId=$('#pinAdd').val();
				if(memId==0) {
						$(".pop_outer").show();
						$("#login_first").show();
							$("#login_first_ask").hide();
						var $div = $('<div />').appendTo('body');
						$div.attr('class', 'mask1');
						return false;                       					
							
					} 
					else {
						$('.popup_loader').show();
						<?php if($this->session->read('Member.member_type')=='general_user'){ ?>
						$.ajax({
							type: 'POST',
							url: ajax_url+"Homes/add_pin_popup/"+memId+"/"+pin_id+"/"+vendor_mem_id,
							success: function(data) { 
								$(".pop_outer").show();
								$('.pop_outer').html(data);
								$("#add_album_popup").show();
								$(".mask2").show();
								$('.popup_loader').hide();
								
							}
						});
						<?php } else { ?>
						
							$("#error_msg").show();
							var $div = $('<div />').appendTo('body');
							$div.attr('class', 'mask1');
							
						<?php } ?>
					}
					$('.popup_loader').hide();
					$("#add_album_popup").show();
					if(memId!=0) {
					   <?php if($this->session->read('Member.member_type')=='general_user'){ ?>
						var $div = $('<div />').appendTo('body');
						$div.attr('class', 'mask2');
						<?php }?>
					}
		});
		$(".mask2").live('click',function(){
				$("#add_album_popup").hide();
				$(this).removeClass();
				$('.mask1').removeClass();
				$("#error_message").hide();
				$("#error_messages").hide();
				
		}); 

		$("#addAlbumPin_cancel").live('click',function(){
				$("#add_album_popup").hide();
				$('.mask2').removeClass();
				$('.mask1').removeClass();
				$("#error_message").hide();
				$("#error_messages").hide();
				
		});
	});

	$(document).ready(function(){
		$(".mask2").removeClass(); 
		$("#album_cover").hide();
		$("#edt").hide();
		$("#addAlbum").hide();
		document.onkeyup = function (event) {
			if (event.keyCode == 27) {
				$('#login_first').hide();
					$("#login_first_ask").hide();
				$('#error_msg').hide();
				$('#album_cover').hide();
				$("#edt").hide();
				$("#add_album_popup").hide();
				$("#addAlbum").hide();
				$('.mask2').removeClass();
			}
		}
		
		});
	$(window).load(function(){
		document.onkeyup = function (event) {
			if (event.keyCode == 27) {
				$('#pin-modal-container').hide();
				$('#login_first').hide();
					$("#login_first_ask").hide();
				$('#error_msg').hide();
				$('#error_message').hide();
				$('#error_messages').hide();
				$("#add_album_popup").hide();
				$('.mask1').hide();
				$('.mask').hide();
				$('.mask2').removeClass();
				$('.body').css('overflow','auto');
			} 
		}
		<?php /* if(isset($_SESSION['opnPortfolio1']) && $_SESSION['opnPortfolio1']!='' ) { ?> 
			//alert("1");
			$('.popup_loader').show();
			
			$.ajax({
				type: 'POST',
				url: ajax_url+"Homes/portfolio_popup/"+<?php echo $_SESSION['opnPortfolio1']?>,
				success: function(data) {
				<?php $_SESSION['opnPortfolio1']=''; ?>
				
					$('.popup_loader').hide();
					$('.popUp').html(data);
					$('#pin-modal-container').show();
					$('.mask').show();
					$('.mask2').removeClass();
					$('.body').css('overflow','hidden');
					$("#pin-modal-container").focus();
				}
			}); 
		<?php  } */ ?>
		
		<?php if($this->Session->check('port_redirect')) { ?>
		//alert("2");
			$('.popup_loader').show();
			 $('body').css('cursor', 'wait');

			var id=$(this).attr('rel');
			$.ajax({
				type: 'POST',
				url: ajax_url+"Homes/portfolio_popup/par1:<?php echo $_GET['member_cat'];?>/par2:<?php echo $_GET['member_sub_cat'];?>/par3:<?php echo $_GET['member_country'];?>/par4:<?php echo $_GET['member_state'];?>/<?php echo $this->Session->read('port_redirect'); ?>",
				success: function(data) {
				
					$('.popup_loader').hide();
					$('.popUp').html(data);
					$('#pin-modal-container').show();
					$('.mask').show();
					$('.mask2').removeClass();
					$('.body').css('overflow','hidden');
					$('body').css('cursor', 'auto');
					$("#pin-modal-container").focus();

				}
			});
			
		<?php CakeSession::Delete("port_redirect"); } ?>
		
		$('.zoom_outers, .videos_click').live('click',function(){ 
		
		$('.popup_loader').show();
		 $('body').css('cursor', 'wait');
		var id=$(this).attr('rel');
		$.ajax({
			type: 'POST',
			url: ajax_url+"Homes/portfolio_popup/par1:<?php echo $_GET['member_cat'];?>/par2:<?php echo $_GET['member_sub_cat'];?>/par3:<?php echo $_GET['member_country'];?>/par4:<?php echo $_GET['member_state'];?>/"+id,
			success: function(data) {
			
				$('.popup_loader').hide();
				
				$('.popUp').show();
				$('.popUp').html(data);
				
				if (($('#pannel_filter').css('display')=='block') || ($('#pannel_show_down').css('display')=='block') || ($('.log_show_div').css('display')=='block')) {
					$('#pin-modal-container .row').css('margin-top','123px');
				} else {
					$('#pin-modal-container .row').css('margin-top','73px');
				}
				
				$('#pin-modal-container').show();
				$('.mask').show();
				$('.mask2').removeClass();
				$('.body').css('overflow','hidden');
				$('body').css('cursor', 'auto');
				$("#pin-modal-container").focus();

			}
		});
		
	});
	
	<?php if(!empty($_GET['rel_pin'])) { ?>
	//alert("3");
		$('.popup_loader').show();
		 $('body').css('cursor', 'wait');
		var id='<?php echo convert_uudecode(base64_decode($_GET['rel_pin'])); ?>';
		$.ajax({
			type: 'POST',
			url: ajax_url+"Homes/portfolio_popup/par1:<?php echo $_GET['member_cat'];?>/par2:<?php echo $_GET['member_sub_cat'];?>/par3:<?php echo $_GET['member_country'];?>/par4:<?php echo $_GET['member_state'];?>/"+id,
			success: function(data) {
			
				$('.popup_loader').hide();
				
				$('.popUp').show();
				$('.popUp').html(data);
				
				if (($('#pannel_filter').css('display')=='block') || ($('#pannel_show_down').css('display')=='block') || ($('.log_show_div').css('display')=='block')) {
					$('#pin-modal-container .row').css('margin-top','123px');
				} else {
					$('#pin-modal-container .row').css('margin-top','73px');
				}
				
				$('#pin-modal-container').show();
				$('.mask').show();
				$('.mask2').removeClass();
				$('.body').css('overflow','hidden');
				$('body').css('cursor', 'auto');
				$("#pin-modal-container").focus();

			}
		});
	<?php } ?>
	
		$(".mask1").live('click',function(){	 
			   $('#pin-modal-container').hide();
			   $('#add_album_popup').hide();
			   $('#error_message').hide();
			   $('#error_messages').hide();
			   $('.popUp').hide();
			   $('.mask').hide();
			   $('.mask2').removeClass();
			   $('#login_first').hide();
			   	$("#login_first_ask").hide();
			   $(this).hide();
				
		}); 
		$(".centered pin-detail").live('click',function(e){
			e.stopPropogation();
		});

		$('.zoom_outers').live('hover',function(){
			$(this).find('.zoom').show();
		},function(){
			$(this).find('.zoom').hide();
		});

		$(function() {
			$('.item .pin-img-link img').css("opacity","1.0"); //set initial opacity
			$('.item .pin-img-link img').live('hover',function() { 
				$(this).stop().animate({ opacity: 0.70 }, "fast"); //on mouse hover
			});
			
			
			$('.isptop_social a img').live('mouseenter',function() {
				if($(this).attr('class')=='so_add_img')
				{
					$(this).attr('src',ajax_url+'images/add_pink.png');
				}
				if($(this).attr('class')=='fbsharebutton')
				{
					$(this).attr('src',ajax_url+'images/facebook_pink.png');
				}
				if($(this).attr('class')=='so_google_img')
				{
					$(this).attr('src',ajax_url+'images/google_pink.png');
				}
				if($(this).attr('class')=='so_pint_img')
				{
					$(this).attr('src',ajax_url+'images/pinterest_pink1.png');
				}
				if($(this).attr('class')=='so_mail_img')
				{
					$(this).attr('src',ajax_url+'images/mail_pink.png');
				}	
				if($(this).attr('class')=='videos_click_img')
				{
					$(this).attr('src',ajax_url+'images/video_pink.png');
				}
			});
			
			$('.isptop_social a img').live('mouseout',function() {
				if($(this).attr('class')=='so_add_img')
				{
					$(this).attr('src',ajax_url+'images/add_grey.png');
				}
				if($(this).attr('class')=='fbsharebutton')
				{
					$(this).attr('src',ajax_url+'images/facebook_grey.png');
				}
				if($(this).attr('class')=='so_google_img')
				{
					$(this).attr('src',ajax_url+'images/google_grey.png');
				}
				if($(this).attr('class')=='so_pint_img')
				{
					$(this).attr('src',ajax_url+'images/pinterest_grey.png');
				}
				if($(this).attr('class')=='so_mail_img')
				{
					$(this).attr('src',ajax_url+'images/mail_grey.png');
				}
				
				if($(this).attr('class')=='videos_click_img')
				{
					$(this).attr('src',ajax_url+'images/video_grey.png');
				}
				//$(this).parent().parent().find('.z_hover').show();	 
			});
			
			
			$('.isptop_social').live('click',function(){
			    return false;
			})
		});
	});
	$(document).ready(function(){
       
		$(".caption-hover").live('hover',function(e){
			e.stopPropagation(); 
		});
		$('.item').live('mouseleave',function() {
			$(".item .pin-img-link img").stop().animate({ opacity: 1.0 }, "fast"); //on mouse out
			//$('.z_hover').hide();
		});
		$("#aa").live('click',function(){
			$('#pin-modal-container').hide();
			$('.mask').hide();
			$('.mask2').hide();
			$('.body').css('overflow','auto');
		});
		
		$("#pin-modal").live('click',function(e){
			e.stopPropagation(); 
		});
		$("#pin-modal-sidebar-right").live('click',function(e){
			e.stopPropagation(); 
		});
		
	});
	
	$(document).ready(function(){
	$('#fbsharebutton_img').live('click',function(e){
		var image_name=$(this).attr('rel');
		e.preventDefault();
		FB.ui(
		{
		method: 'feed',
		name: 'Weddingin.asia',
		link: 'http://www.weddingin.asia',
		//source: 'https://www.youtube.com/v/rp4UwPZfRis',
		source: '',
		picture: 'http://weddingin.asia/img/portfolio/search/'+image_name,
		caption: '',
		description: '',
		message: ''
		});
	});
});

$(document).ready(function(){
	$('#fbsharebutton_vid').live('click',function(e){
		var image_name=$(this).attr('rel');
		//alert(image_name);
		e.preventDefault();
		FB.ui(
		{
		method: 'feed',
		name: 'Weddingin.asia',
		link: 'http://www.weddingin.asia',
		source: 'https://www.youtube.com/watch?v='+image_name,
		picture: '',
		caption: '',
		description: 'https://www.youtube.com/watch?v='+image_name,
		message: ''
		});
	});
	
	
$('#fbsharebutton_vid_vimeo').live('click',function(e){
		var image_name=$(this).attr('rel');
		//alert(image_name);
		e.preventDefault();
		FB.ui(
		{
		method: 'feed',
		name: 'Weddingin.asia',
		link: 'http://www.weddingin.asia',
		source: 'http://vimeo.com/'+image_name,
		picture: '',
		caption: '',
		description: 'http://vimeo.com/'+image_name,
		message: ''
		});
	});	
	
	
	setTimeout(function(){$(".add_album_message").fadeOut()},2000);
	
	
	/********18july14_share_count*************/
		$('.goog_p_c').live('click',function(e){
			var id=$(this).attr('rel');
			
			$.ajax({
			type: 'POST',
			url: ajax_url+"Members/googleplus_share/"+id
			
			});
		
		});
		
		
		$('.pint_p_c').live('click',function(e){
			var id=$(this).attr('rel');
			
			$.ajax({
			type: 'POST',
			url: ajax_url+"Members/pint_share/"+id
			
			});
		
		});
		
		
		$('.gmail_p_c').live('click',function(e){
			var id=$(this).attr('rel');
			
			$.ajax({
			type: 'POST',
			url: ajax_url+"Members/gmail_share/"+id
			
			});
		
	});
	/**********/
});
	/****************18july14**************/
		
		function facebook_count_share(id){
				
			$.ajax({
				type: 'POST',
				url: ajax_url+"Members/facebook_share/"+id
				
				});
		}
		
	
	/*************************************/
</script>
<style type="text/css">
	label.error { margin-bottom:0px; }
	#bottom_container {
	width: 100% !important;
	padding: 0px 0px 0px 0px !important;
}
</style>
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
	
	<div class="pop_inner log_block_width margin_adjust"  id="login_first_ask">
		<div class="login_block log_block_width z_space main_ab_cntr">
			
				<div class="edt_pop_block_inner">
					<div class="head_block_width rec_g">
						
						<h2 class="login_heading jne_lbek"><label>To ask a question, you will first need to login as a registered user</label></h2>
					</div>

					<div class="cover_bottom_block head_block_width adj_wdh_delne">
						<input type="submit" value="OK" class="remove">
					</div>
				</div>
		</div>
	</div>
	
		<div class="pop_inner log_block_width" id="error_msg">
			<div class="login_block log_block_width z_space main_ab_cntr">
				
					<div class="edt_pop_block_inner">
						<div class="head_block_width rec_g">
							
							<h2 class="login_heading jne_lbek"><label>Only general users can add pins only!</label></h2>
						</div>

						<div class="cover_bottom_block head_block_width adj_wdh_delne">
							<input type="submit" value="OK" class="remove">
						</div>
					</div>
			</div>
		</div>
</div>
<div id="bottom_container">
<?php $user_login=$this->session->read('Member.id');?> 
	<div class="pin_bodi toggle toggle_margin_top" style="<?php if(!empty($_GET['ref'])) { ?>margin-top: 47px;<?php }?>">
	  
		<!--<div class="popup_loader" style="display:none;"><img  src="<?php //echo HTTP_ROOT?>img/496.GIF"/></div>-->
	<div id="board_main">
		<?php if(!empty($pins)) {?>
			<div id="board">
				<?php $i=0; foreach($pins as $pin) { $i++;?>
				<div class="element bx_shdw" id="<?php echo $pin['Portfolio']['id'];?>">
					<?php if($pin['Portfolio']['pin_type']=='video') { ?>
						<div class="item" style="width:236px; height:300px;">
					<?php } else if($pin['Portfolio']['pin_type']=='audio') { ?>
						<div class="player_adujst_back item" style="width:236px; height:277px;">
					<?php } else { ?>
						<div class="item" style="width:236px; height:<?php echo ($pin['Portfolio']['image_height']+48).'px'; ?>">
					<?php } ?>
						<div class="zoom_outers" rel="<?php echo $pin['Portfolio']['id'];?>">
							<a href="javascript:void(0)" class="pin-img-link">
								<?php if($pin['Portfolio']['pin_type']=='video') {?>
							
							
							
								
									<?php $new_url=explode('=',$pin['Portfolio']['video']); 
											
											if($new_url[0]=='www.youtube.com/watch?v'){			
																						
											$new_url=$new_url[1];?>
											<object width="236" height="250">
												<param name="movie" value="http://www.youtube.com/v/<?php echo $new_url;?>?hl=en_US&amp;version=3"></param>
												<param name="allowFullScreen" value="true"></param>
												<param name="allowscriptaccess" value="always"></param>
												<embed src="http://www.youtube.com/v/<?php echo $new_url;?>?hl=en_US&version=3" type="application/x-shockwave-flash" width="236" height="250" allowscriptaccess="always" allowfullscreen="true"></embed>
											</object>  
								
										<?php } else { 
										$new_url_vimeo=explode('/',$pin['Portfolio']['video']);  ?>
										<iframe src="//player.vimeo.com/video/<?php echo $new_url_vimeo[1]; ?>" width="236" height="250" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
										<?php /* ?><object width="236" height="250">
        						<param name="allowfullscreen" value="true" />
        						<param name="allowscriptaccess" value="always" />
       						 <param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=<?php echo $new_url_vimeo[1]; ?>&amp;server=vimeo.com&amp;color=00adef&amp;fullscreen=1" />
        						<embed src="http://vimeo.com/moogaloop.swf?clip_id=<?php echo $new_url_vimeo[1]; ?>&amp;server=vimeo.com&amp;color=00adef&amp;fullscreen=1"
            				type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="236" height="250"></embed>
   							 </object>
							 <?php */ ?>
										
									<?php } ?>		
							
							<?php } else if($pin['Portfolio']['pin_type']=='audio') { ?>
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
												mp3:"<?php echo HTTP_ROOT?>img/portfolio/audio/<?php echo $pin['Portfolio']['audio'];?>",
											}, {
												cssSelectorAncestor: "#cp_container_1",
												swfPath: "<?php echo HTTP_ROOT ?>js/frontend",
												supplied: "mp3",
												wmode: "window"
											});
										});
										</script>
							
							<?php } else { ?>
								<img class="large_image" src="<?php echo HTTP_ROOT; ?>img/portfolio/search/<?php echo $pin['Portfolio']['image'];?>" alt="" width="236" height="<?php echo ($pin['Portfolio']['image_height']); ?>"/>
							<?php } ?>
							</a>
						   
						   <div class="isptop_social <?php if($pin['Portfolio']['pin_type']=='audio') { echo "pin_hover_play_mr"; }?>">
							<?php if($pin['Portfolio']['pin_type']=='video') {?>
								<?php $new_url=explode('=',$pin['Portfolio']['video']); 
	
										
									if($new_url[0]=='www.youtube.com/watch?v'){			
											$new_url=$new_url[1];
											?>
											<a hreflang="<?php echo $pin['Member']['id']?>" href="javascript:void(0)" class="pin_ad" rel='<?php echo $pin['Portfolio']['id'];?>' title="Add to Album"><img class="so_add_img" src="<?php echo HTTP_ROOT; ?>images/add_grey.png"></a>
											<a href="javascript:void(0)"><img src="<?php echo HTTP_ROOT; ?>images/facebook_grey.png"  rel="<?php echo $new_url ?>" class="fbsharebutton" id="fbsharebutton_vid" onclick="facebook_count_share(<?php echo $pin['Member']['id']?>)"/><a>
											<a rel="<?php echo $pin['Member']['id']?>" class="goog_p_c" href="https://plus.google.com/share?url=http://youtube.com/watch?v=<?php echo $new_url[1]; ?>" title="Google+" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;"><img class="so_google_img" src="<?php echo HTTP_ROOT; ?>images/google_grey.png"></a>
											<a rel="<?php echo $pin['Member']['id']?>" class="pint_p_c" href="//pinterest.com/pin/create/button/?url=<?php echo HTTP_ROOT?>Homes/index/&media=http://img.youtube.com/vi/<?php echo $new_url ?>/mqdefault.jpg&description=Wedding%20In%20Asia%3A%20<?php echo $pin['Category']['title']; ?>%20in%20<?php echo $pin['Member']['CountryLocation']['country_name']; ?>"" title="Pinterest" target="_blank" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;"><img class="so_pint_img" src="<?php echo HTTP_ROOT; ?>images/pinterest_grey.png"></a>
											<a rel="<?php echo $pin['Member']['id']?>"  class="gmail_p_c" href="https://api.addthis.com/oexchange/0.8/forward/email/offer?url=<?php echo HTTP_ROOT."Members/vendorProfile/"?><?php echo base64_encode(convert_uuencode($pin['Portfolio']['member_id']));?>/?pin_id=<?php echo $pin['Portfolio']['id'];?>&title=Weddingin Asia&description=Opis" title="Email" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=400');return false;"><img class="so_mail_img" src="<?php echo HTTP_ROOT; ?>images/mail_grey.png"></a>
											
											<a  rel="<?php echo $pin['Portfolio']['id'];?>" class="videos_click" href=""><img src="<?php echo HTTP_ROOT; ?>images/video_grey.png" class="videos_click_img"></a>
									<?php } else { 
											
											$new_url_vimeo=explode('/',$pin['Portfolio']['video']);  ?>												
												
											<a hreflang="<?php echo $pin['Member']['id']?>" href="javascript:void(0)" class="pin_ad" rel='<?php echo $pin['Portfolio']['id'];?>' title="Add to Album"><img class="so_add_img" src="<?php echo HTTP_ROOT; ?>images/add_grey.png"></a>
											<a href="javascript:void(0)"><img src="<?php echo HTTP_ROOT; ?>images/facebook_grey.png"  rel="<?php echo $new_url_vimeo[1]; ?>" class="fbsharebutton" id="fbsharebutton_vid_vimeo" onclick="facebook_count_share(<?php echo $pin['Member']['id']?>)"/><a>
											<a rel="<?php echo $pin['Member']['id']?>"  class="goog_p_c" href="https://plus.google.com/share?url=http://vimeo.com/<?php echo $new_url_vimeo[1]; ?>" title="Google+" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;"><img class="so_google_img" src="<?php echo HTTP_ROOT; ?>images/google_grey.png"></a>
											<a  rel="<?php echo $pin['Member']['id']?>" class="pint_p_c" href="//pinterest.com/pin/create/button/?url=<?php echo HTTP_ROOT?>Homes/index/&media=http://www.weddingin.asia/images/no_vo.png&description=Wedding%20In%20Asia%3A%20http://vimeo.com/<?php echo $new_url_vimeo[1]; ?>"" title="Pinterest" target="_blank" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;"><img class="so_pint_img" src="<?php echo HTTP_ROOT; ?>images/pinterest_grey.png"></a>
											<a rel="<?php echo $pin['Member']['id']?>"  class="gmail_p_c" href="https://api.addthis.com/oexchange/0.8/forward/email/offer?url=http://vimeo.com/<?php echo $new_url_vimeo[1]; ?>&title=Weddingin Asia&description=Opis" title="Email" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=400');return false;"><img class="so_mail_img" src="<?php echo HTTP_ROOT; ?>images/mail_grey.png"></a>
											
											<a  rel="<?php echo $pin['Portfolio']['id'];?>" class="videos_click" href=""><img src="<?php echo HTTP_ROOT; ?>images/video_grey.png" class="videos_click_img"></a>
									
									<?php } ?>									
									
									
									
									<?php if(isset($_SESSION['Member']['id'])) { $senderId=$_SESSION['Member']['id']; } else { $senderId=0; }?>
									<input id="pinAdd" type="hidden" name="data[AdminList][sender_id]" value="<?php echo $senderId;?>">
							<?php } else { ?>
									<a hreflang="<?php echo $pin['Member']['id']?>" href="javascript:void(0)" title="Add to Album" rel='<?php echo $pin['Portfolio']['id'];?>' class="pin_ad"><img class="so_add_img" src="<?php echo HTTP_ROOT; ?>images/add_grey.png"></a>
									<a href="javascript:void(0)"><img src="<?php echo HTTP_ROOT; ?>images/facebook_grey.png"  rel="<?php echo $pin['Portfolio']['image'] ?>" class="fbsharebutton" id="fbsharebutton_img" onclick="facebook_count_share(<?php echo $pin['Member']['id']?>)" /><a>
									
									<a rel="<?php echo $pin['Member']['id']?>"  class="goog_p_c" href="https://plus.google.com/share?url=<?php echo HTTP_ROOT."img/portfolio/search/"?><?php echo $pin['Portfolio']['image'];?>" title="Google+"  onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;"><img class="so_google_img" src="<?php echo HTTP_ROOT; ?>images/google_grey.png"></a>
									<a  rel="<?php echo $pin['Member']['id']?>" class="pint_p_c" href="//pinterest.com/pin/create/button/?url=<?php echo HTTP_ROOT?>Homes/index/&media=<?php echo HTTP_ROOT."img/portfolio/search/"?><?php echo $pin['Portfolio']['image'];?>&description=Wedding%20In%20Asia%3A%20<?php echo $pin['Category']['title']; ?>%20in%20<?php echo $pin['Member']['CountryLocation']['country_name']; ?>"" title="Pinterest" target="_blank" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;"><img class="so_pint_img" src="<?php echo HTTP_ROOT; ?>images/pinterest_grey.png"></a>
									<a rel="<?php echo $pin['Member']['id']?>"  class="gmail_p_c" href="https://api.addthis.com/oexchange/0.8/forward/email/offer?url=<?php echo HTTP_ROOT."Members/vendorProfile/"?><?php echo base64_encode(convert_uuencode($pin['Portfolio']['member_id']));?>/?pin_id=<?php echo $pin['Portfolio']['id'];?>&title=Weddingin Asia&description=Opis" title="Email" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=400');return false;"><img class="so_mail_img" src="<?php echo HTTP_ROOT; ?>images/mail_grey.png"></a>
								
									<?php if(isset($_SESSION['Member']['id'])) { $senderId=$_SESSION['Member']['id']; } else { $senderId=0; }?>
									<input id="pinAdd" type="hidden" name="data[AdminList][sender_id]" value="<?php echo $senderId;?>">
							<?php } ?>
						   </div>                   
						  </div>
						 
							<div class="vendor">
								<div class="caption-title"> 	
									<p class="pinned-by">
										<a href="<?php echo HTTP_ROOT?>Members/vendorProfile/<?php echo base64_encode(convert_uuencode($pin['Member']['id']));?>" rel="<?php echo $pin['Member']['id']?>" class="user"><?php echo ucwords($pin['Member']['business_name']);?></a>
									</p>
									<p class="pinned-to">
										<a href="javascript:void(0)" class="category"><?php if(!empty($_GET['member_cat']) || !empty($_GET['member_country']) || !empty($_GET['member_sub_cat']) || !empty($_GET['member_state'])){ echo $pin['Member']['WeddingsubCategory']['title']; } else { echo $pin['Category']['title']; }?> in <?php echo $pin['Member']['CountryLocation']['country_name']; ?></a>
									</p>
									<div class="clear-left"></div>
								</div>
							</div>	
					
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="popUp"></div>
				    <div id="lastPostsLoader" style="display:none;bottom:8px;left: 47%;position: absolute; z-index: 2147483647;">
						<div class="loader_status">
							<img class="chart_loading8" src="<?php echo HTTP_ROOT?>img/ajax-loader.GIF"/>
							<span class="ldr_sn">Loading...</span>
						</div>
					</div>
					
					<div id="lastPostsLoader_empty" style="display:none;bottom:8px;left: 47%;position: absolute; z-index: 2147483647;">
						<div class="loader_status" style="width: 123px;padding-left:8px;">
							<span class="ldr_sn">No more result...</span>
						</div>
					</div>
				
			</div>
		<?php } else {?>
			<?php if(empty($_GET['ref'])) { ?>
				<span style="text-align:centre;">Sorry, No records found.</span>
		<?php } }?>
	</div>

<?php if($this->Session->check('success')){ ?>
			<div class="add_album_message vendor_sucess_message" style="display:block; right: 43%; top: 45px;z-index: 999999;">
			<div class="regist_pop_login_block">
				<div class="new_login_inner sent_rev_mes">
					<?php echo $this->Session->read('success');?>
				</div>
			</div>
			</div>
	<?php CakeSession::Delete("success");?>
<?php } ?>