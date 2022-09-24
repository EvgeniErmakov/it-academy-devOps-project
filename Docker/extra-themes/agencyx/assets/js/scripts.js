(function ($) {
	"use strict";
		
    	    $.fn.agencyxAccessibleDropDown = function () {
			    var el = $(this);

			    /* Make dropdown menus keyboard accessible */

			    $("a", el).focus(function() {
			        $(this).parents("li").addClass("hover");
			    }).blur(function() {
			        $(this).parents("li").removeClass("hover");
			    });
			}
		jQuery(document).ready(function($){
		 	$("#agencyx-menu").agencyxAccessibleDropDown();
        }); // end document ready	
		
		
	window.addEventListener("scroll", function(event) {
    	var top = this.scrollY
		if(top >= 30){
			document.body.classList.add('scrolling');
		}else{
			document.body.classList.remove('scrolling');
		}
	}, false);



		let aghome = document.querySelector('.aghome');
		if(aghome){
		aghome.classList.add("show-axbanner");
		aghome.previousElementSibling.classList.add("has-aghome");
		}

}(jQuery));	