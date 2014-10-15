window.fbAsyncInit = function() {
  FB.init({
    appId      : '646730485446032',
    xfbml      : true,
    status     : true,
    version    : 'v2.1'
  });
};

(function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "//connect.facebook.net/en_US/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));

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
$(document).ready(function(){
    $('#board').isotope({
        // options
        itemSelector : '.element',
        layoutMode : 'masonry'
    });
    function image_opacity_effect(){
        $('.item .pin-img-link img').hover(function(){ $(this).stop().animate({ opacity: 0.70 }, "fast"); });
        $('.item .pin-img-link img').mouseout(function(){ $(this).stop().animate({ opacity:1 }, "fast"); });
    }
    image_opacity_effect();
    var waiting = false;
    var page = 1;
    $(window).scroll(function(){
            if($(window).scrollTop() == $(document).height() - $(window).height()){
                if(!waiting){
                    waiting = true;
                    page++;
                    $('div#lastPostsLoader').show();
                    $.post(ajax_url+"load_portfolio/"+(page+1),null,function(data){
                        if(data.response === 1){
                            $('#board').isotope('insert', $(data.content) );
                            $('div#lastPostsLoader').hide();
                            image_opacity_effect();
                        }else{
                            $('div#lastPostsLoader').hide();
                            $('div#lastPostsLoader_empty').show();
                            setTimeout(function(){$("div#lastPostsLoader_empty").fadeOut()},1000);
                        }
                        waiting = false;
                    },'json');
                }
            } 
    });
    $('#fbsharebutton_img').click(function(){
           var sharing = $(this).attr("rel");
           FB.ui({
            method: 'share_open_graph',
            action_type: 'og.likes',
            action_properties: JSON.stringify({
                object: sharing,
            })
          }, function(response){ console.log(response); });
    });
    function facebook_count_share(){ console.log("here"); }
});

