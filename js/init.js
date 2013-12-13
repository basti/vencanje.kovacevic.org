$(document).ready(function(){				
	$("a[rel='gallery']").colorbox({transition:"fade"});				
});


// cycle init
  $(function() {
	var index = 0, hash = window.location.hash;
	if (hash) {
		index = /\d+/.exec(hash)[0];
		index = (parseInt(index) || 1) - 1; // slides are zero-based
	}

    $('#content-left').cycle({
        fx:     'blindX', // You can choose effect do you like, for reference : http://www.malsup.com/jquery/cycle/browser.html
        speed:  'slow',
        timeout: 0,
        pager:  '#nav',
		startingSlide: index,
		after: function(curr,next,opts) {
			if(opts.currSlide + 1 == 1) {
				window.location.hash = "";
			}
			else {
				window.location.hash = opts.currSlide + 1;
			}
		},
        pagerAnchorBuilder: function(idx, slide) {
            // return sel string for existing anchor
            return '#nav li:eq(' + (idx) + ') a';
        }
    });
	$('#gallery-page').cycle({
        fx:     'fade', // You can choose effect do you like, for reference : http://www.malsup.com/jquery/cycle/browser.html
        speed:  'slow',
        timeout: 0,
        pager:  '#gallery-nav',
        pagerAnchorBuilder: function(idx, slide) {
            // return sel string for existing anchor
            return '#gallery-nav li:eq(' + (idx) + ') a';
        }
    });
});

// Cufon init
Cufon.replace('h1') ('h2') ('h3') ('h4') ('h5') ('#nav li a') ('#logo');
