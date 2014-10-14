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

/*$(function() {
    var images1 = $('.large_image')
      , total = images1.length
      , count = 0;
	$('.loading').show();
	images1.load(function() {
        count=count + 1;
        if (parseInt(count)>=parseInt(total)) {
            $('.loading').hide();
        }
    });
});
*/
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
							$('div#lastPostsLoader').empty();
						}
					}
				});
			} 
			
		});
		
		$(window).scroll(function(){
			a = ($(window).scrollTop());
			if (a>0) {
			   $('#back-top').show();
			} else {
				$('#back-top').hide();
			}
		});
		
		$('#back-top').click(function() {
			$('body,html').animate({
					scrollTop: 0
				}, 500) 
		});
	});	

	function lastPostFunc()
	{ 
		$('div#lastPostsLoader').html('<img src="<?php echo HTTP_ROOT.'img/'?>loader.gif">');
		$.getScript(ajax_url+"app/webroot/js/frontend/jquery.isotope.js");
		var lastid=$(".element:last").attr("id");
		$.ajax({
			type: 'POST',
			url: ajax_url+"Homes/get_next_pins/"+$(".element:last").attr("id"),
			success: function(returnedData) {
				var $newItems = $(returnedData);
				$('#board').isotope( 'insert', $newItems );
				$('div#lastPostsLoader').empty();
			}
		});
	}   

	$(document).ready(function(){
		$(".mask2").hide();
		$(".pin_ad").live('click',function(){
		var pin_id=$(this).attr('rel');
		var memId=$('#pinAdd').val();
				if(memId==0) {
					if(confirm('Please login first')) { 
						$('.log').trigger('click');
						return false;
						} 
						else{
							return false;
						}
					} else {
						<?php if($this->session->read('Member.member_type')=='general_user'){ ?>
						$.ajax({
							type: 'POST',
							url: ajax_url+"Homes/add_pin_popup/"+memId+"/"+pin_id,
							success: function(data) {
								$(".pop_outer").show();
								$('.pop_outer').html(data);
								$("#add_album_popup").show();
								$(".mask2").show();
								
							}
						});
						<?php } else { ?>
							alert("Only General Users can add Pins");
						<?php } ?>
					}
					$("#add_album_popup").show();
					if(memId!=0) {
					   <?php if($this->session->read('Member.member_type')=='general_user'){ ?>
						var $div = $('<div />').appendTo('body');
						$div.attr('class', 'mask2');
						<?php }?>
					}
		});
		$(".mask2").live('click',function(){
				$(".pop_outer").hide();
				$(this).removeClass();
		}); 	
	});

	$(document).ready(function(){
		$(".mask2").hide(); 
		$("#album_cover").hide();
		$("#edt").hide();
		$("#addAlbum").hide();
		window.onkeyup = function (event) {
			if (event.keyCode == 27) {
				$(".pop_outer").hide();
				$('#album_cover').hide();
				$("#edt").hide();
				$("#add_album_popup").hide();
				$("#addAlbum").hide();
				$('.mask2').hide();
			}
		}
		
		});

	$(document).ready(function(){
		$(".social_hover_div").hide();
		$(".share").live('hover',function(){ 
			$(".social_hover_div").show();
		});
		$(".pinterest").live('mouseleave',function(){
			$(".social_hover_div").hide();
		});
	});

	function showShare(obj,id,pin_Id,caption,member_id){ 
			$('.pin_ad').attr('rel',id);
			//alert(caption);
			var facebookLink="http://www.facebook.com/sharer.php?s=100&p[title]=Wedding+Directory&p[url]=<?php echo HTTP_ROOT?>Homes/index/&p[images][0]=<?php echo HTTP_ROOT."img/portfolio/search/"?>"+pin_Id+"&p[summary]=Our+facebook+description+that+is+used+on+the+FB+share+page.";
			var pininterest="//pinterest.com/pin/create/button/?url=<?php echo HTTP_ROOT?>Homes/index/&media=<?php echo HTTP_ROOT."img/portfolio/search/"?>"+pin_Id+"&description=Wedding%20Asia%3A%20Pinterest";
			var googleLink="https://plus.google.com/share?url=<?php echo HTTP_ROOT."img/portfolio/search/"?>"+pin_Id;
			var emailCompose="https://api.addthis.com/oexchange/0.8/forward/email/offer?url=<?php echo HTTP_ROOT."Members/vendorProfile/"?>"+member_id+"/?pin_id="+id+"&title=Hellothere&description=Opis";
			$('#facebookpass').attr('href',facebookLink);
			$('#pinterestpass').attr('href',pininterest);
			$('#googlesahre').attr('href',googleLink);
			$('#emailpass').attr('href',emailCompose);
			var pos = obj.position();
			$('#shareSocial').css({'top':(pos.top+((obj.height()-60)/2))+'px','left':(pos.left+((obj.width()-106)/2))+'px'});
			$('#shareSocial').show();
		}
	$(window).load(function(){
		window.onkeyup = function (event) {
			if (event.keyCode == 27) {
				$('#pin-modal-container').hide();
				$(".pop_outer").hide();
				$("#add_album_popup").hide();
				$('.mask1').hide();
				$('.mask').hide();
				$('.mask2').hide();
			} 
		}
		<?php if(isset($_SESSION['opnPortfolio1']) && $_SESSION['opnPortfolio1']!='') { ?> 
			$.ajax({
				type: 'POST',
				url: ajax_url+"Homes/portfolio_popup/"+<?php echo $_SESSION['opnPortfolio1']?>,
				success: function(data) {
				<?php $_SESSION['opnPortfolio1']=''; ?>
					$('.popUp').html(data);
					$('#pin-modal-container').show();
					$('.mask').show();
					$('.mask2').hide();
					$('.bod').css('overflow','auto');
				}
			}); 
		<?php  } ?>
		
		$('.zoom_outers').live('click',function(){
		$('.popup_loader').show();
		var id=$(this).attr('rel');
		$.ajax({
			type: 'POST',
			url: ajax_url+"Homes/portfolio_popup/par1:<?php echo $_GET['member_cat'];?>/par2:<?php echo $_GET['member_sub_cat'];?>/par3:<?php echo $_GET['member_country'];?>/par4:<?php echo $_GET['member_state'];?>/"+id,
			success: function(data) {
			//alert(data);
				$('.popUp').html(data);
				$('#pin-modal-container').show();
				$('.mask').show();
				$('.mask2').hide();
				$('.bod').css('overflow','auto');
				$('.popup_loader').hide();
			}
		});
		//alert(id);
	});
	
		$(".mask1").live('click',function(){		 
			   $('#pin-modal-container').hide();
			   $('.popUp').hide();
			   $('.mask2').hide();
				$(this).removeClass();
		}); 
		$(".centered pin-detail").live('click',function(e){
			e.stopPropogation();
		});
		$('.close').live('click',function(){
			$('#pin-modal-container').hide();
			$('.mask').hide();
			$('.bod').css('overflow','auto');
		});
		$('.zoom_outers').live('hover',function(){
			$(this).find('.zoom').show();
		},function(){
			$(this).find('.zoom').hide();
		});

		//$('.z_hover').hide();
		$(function() {
			$('.item a img').css("opacity","1.0"); //set initial opacity
			$('.item a img').live('hover',function() {
				$(this).stop().animate({ opacity: 0.70 }, "fast"); //on mouse hover
				//$(this).parent().parent().find('.z_hover').show();	 
			});
		});
	});
	$(document).ready(function(){

		$(".caption-hover").live('hover',function(e){
			e.stopPropagation(); 
		});
		$('.item').live('mouseleave',function() {
			$(".item a img").stop().animate({ opacity: 1.0 }, "fast"); //on mouse out
			//$('.z_hover').hide();
		});
		$("#aa").live('click',function(){
			$('#pin-modal-container').hide();
			$('.mask').hide();
			$('.mask2').hide();
			$('.bod').css('overflow','auto');
		});
		
		$("#pin-modal").live('click',function(e){
			e.stopPropagation(); 
		});
		$("#pin-modal-sidebar-right").live('click',function(e){
			e.stopPropagation(); 
		});
		
		
	});
</script>
<script type="text/javascript">
		function fbs_click(width, height) {
			var leftPosition, topPosition;
			//Allow for borders.
			leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
			//Allow for title and status bars.
			topPosition = (window.screen.height / 2) - ((height / 2) + 50);
			var windowFeatures = "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";
			u=location.href;
			t=document.title;
			window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer', windowFeatures);
			return false;
}
</script>
<style type="text/css">
	label.error { margin-bottom:0px; }
</style>
<div class="pop_outer">
</div>
<div id="bottom_container">
<?php //echo $this->element('frontend/left_sidebar_home');?> 
	<div class="pin_bodi">
		<div class="popup_loader" style="display:none;"><img  src="<?php echo HTTP_ROOT?>img/496.GIF"/></div>
	
	<?php if($this->Session->check('success')){ ?>
		<div class="response-msg success ui-corner-all">
			<?php echo $this->Session->read('success');?>
		</div>
		<?php CakeSession::Delete("success");?>
	<?php } ?>
    <div id="board">
		<div class="z_hover" id="shareSocial" style="position:absolute; z-index:1000; width:120px; height:30px;">
			 <ul class="caption-hover" >
			   <li class="pinterest">
				    <span class="share">Share</span>
				  	<!--	AddThis Button BEGIN -->
					<div class="social_hover_div" style="right:15px;" >	
						<img src="<?php echo HTTP_ROOT; ?>images/top_direction.png" class="direction_sign"></img>
						<a id="facebookpass" href="" target="_blank" onClick="return fbs_click(400, 300)"><img src="<?php echo HTTP_ROOT; ?>images/home_fb.png"></img></a>		
						<a id="googlesahre" target="_blank" href="" onclick="javascript:window.open(this.href,
						'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;"><img src="<?php echo HTTP_ROOT; ?>images/h_gplus.png"></img></a>								
						<a id="pinterestpass" href="" target="_blank" onclick="javascript:window.open(this.href,
						'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;"><img src="<?php echo HTTP_ROOT; ?>images/home_pint.png"></img></a>
						<a id="emailpass" href="" onclick="javascript:window.open(this.href,
						'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=400');return false;">
						<img src="<?php echo HTTP_ROOT; ?>images/home_email.png"></img></a><!-- <a id="emailpass" class="addthis_toolbox addthis_default_style addthis_32x32_style addthis_button_email" addthis:url="" addthis:title="'Wedding'"><img src="<?php echo HTTP_ROOT; ?>images/home_email.png"></img></a> -->
					</div>	
						<!-- AddThis Button END -->
				</li>
				<li class="plus">
					<a href="javascript:void(0)" title="Add to album" alt="Add to album" rel='' class="pin_ad">Add</a>
					<?php if(isset($_SESSION['Member']['id'])) { $senderId=$_SESSION['Member']['id']; } else { $senderId=0; }?>
					<input id="pinAdd" type="hidden" name="data[AdminList][sender_id]" value="<?php echo $senderId;?>">
				</li>
			  </ul>
		</div>
	
		<?php $i=0; foreach($pins as $pin) { $i++;?>
		<div class="element" id="<?php echo $pin['Portfolio']['id'];?>" onmouseenter="showShare($(this),<?php echo $pin['Portfolio']['id'];?>,'<?php echo $pin['Portfolio']['image'];?>','<?php echo $pin['Portfolio']['caption'];?>','<?php echo base64_encode(convert_uuencode($pin['Portfolio']['member_id']));?>');">
			<div class="item" style="width:238px; height:<?php echo $pin['Portfolio']['image_height'].'px'; ?>">
				
				<div class="zoom_outers" rel="<?php echo $pin['Portfolio']['id'];?>">
					<a href="#" class="pin-img-link">
						<!---<img style="width:35px !important; top:50px; left:97px; position:absolute;" class="loading" src="<?php //echo HTTP_ROOT?>images/4small-loading-new.GIF" />-->
						<img class="large_image" src="<?php echo HTTP_ROOT; ?>img/portfolio/search/<?php echo $pin['Portfolio']['image'];?>" alt="" width="238" height="<?php echo $pin['Portfolio']['image_height']; ?>"/>
					</a>
				</div>
				<div class="pins_align"><div class="bg_new">NEW</div></div>
					<div class="vendor">
						<div class="caption-title"> 	
							<p class="pinned-by">
								<a href="<?php echo HTTP_ROOT?>Members/vendorProfile/<?php echo base64_encode(convert_uuencode($pin['Member']['id']));?>" rel="<?php echo $pin['Member']['id']?>" class="user"><?php echo ucwords($pin['Member']['first_name'].' '.$pin['Member']['last_name']);?></a>
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

<?php if(empty($pins)) {?>
	Sorry, No records found.
<?php } ?>
<div id="lastPostsLoader"></div>
</div>