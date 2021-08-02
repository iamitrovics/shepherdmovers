//@prepros-prepend modernizr.js
//@prepros-prepend bootstrap4\bootstrap.bundle.js
//@prepros-prepend easing.js
//@prepros-prepend skip-link-focus-fix.js
//@prepros-prepend moment\moment-with-locales.min.js
//@prepros-prepend jquery.fancybox.min.js
//@prepros-prepend bootstrap-select.js
//@prepros-prepend jquery-ui.min.js
//@prepros-prepend sliding-menu.js

(function($) {
	jQuery(document).ready(function() {
        setTimeout(function () {
            $(".page-wrapper").css({"padding-top": $("#menu_area").height()});
        }, 600);
		// Sticky header
		jQuery(window).scroll(function() {
		  if ($(this).scrollTop() > 60){  
		      $('#menu_area').addClass("sticky");
		    }
		    else{
		      $('#menu_area').removeClass("sticky");
		    }
		});

        $(document).on('click', '#city-more .bookbtn', function(event) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: $($.attr(this, 'href')).offset().top - 80
            }, 500);
        });

        $('#cookie-notice').addClass('slide-up');

        $('#close-notice, #accept-cookie').click(function(e) {
            e.preventDefault();
            $("#cookie-notice").removeClass("slide-up");
            $("#cookie-notice").addClass("slide-down");
        });

		// desktop multilevel menu
		$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
	      	if (!$(this).next().hasClass('show')) {
	        $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
	      }
	      var $subMenu = $(this).next(".dropdown-menu");
	      $subMenu.toggleClass('show');
	      $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
	        $('.dropdown-submenu .show').removeClass("show");
	      });
	      return false;
	    })

	    // mobile multilevel menu
        $("#menu").slidingMenu();

	 	jQuery("#top__mobile .menu-btn").click(function(){
	    	jQuery(".menu-overlay").addClass("active-overlay");
            jQuery('.main-menu-sidebar').addClass("menu-active");
	    });
	   
	    jQuery('.main-menu-sidebar .close-menu-btn, .menu-overlay').click(function(){
	        jQuery('.main-menu-sidebar').removeClass("menu-active");
	        jQuery(".menu-overlay").removeClass("active-overlay");
	    });

	    // date picker
	    // $(".date-picker-input").datepicker({
        //     minDate: '0'
        // });


        $(function () {
            
                var date1 = new Date('05/05/2021');
                var date2 = new Date('05/20/2021');

                var date3 = new Date('06/05/2021');
                var date4 = new Date('06/20/2021');

                var date5 = new Date('07/05/2021');
                var date6 = new Date('07/20/2021');                
                    
                $(".date-picker-input").datepicker({
                    minDate: '0',
                    showOtherMonths: true,
                    selectOtherMonths: true, 
                    
                    
                    beforeShowDay: function( date ) {
                        var highlight = date >= date1 && date <= date2
                        var highlight2 = date >= date3 && date <= date4
                        var highlight3 = date >= date5 && date <= date6
                        if( highlight || highlight2 || highlight3 ) {
                             return [true, "event", 'Tooltip text'];
                        } else {
                             return [true, '', ''];
                        }
                    }
            
                });

        });

        $('.date-picker-input').on('click', function(e) {
          e.preventDefault();
          $(this).attr("autocomplete", "off");  
       });

       $(".date-picker-input").attr("autocomplete", "off");        

	    //scroll to anchored
        $(document).on('click', '#top-cta a.go-down', function(event) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: $($.attr(this, 'href')).offset().top - 80
            }, 500);
        });

        // Fancybox
        $('#blog-page [data-fancybox="gallery"]').fancybox();
	
		//$('#top-cta .features-list .feature-box h3').matchHeight();

        $(function() {
            $('.quote-cta--single a.btn-cta').click(function() {
              if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                  $('html, body').animate({
                    scrollTop: target.offset().top - 100
                  }, 1000);
                  return false;
                }
              }
            });
          }); 
          
          $('.full-content a').attr("target","_blank");

	});
})(jQuery);
