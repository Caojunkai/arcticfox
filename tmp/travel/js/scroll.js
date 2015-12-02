/**
 * @package Helix Framework
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2013 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/

jQuery(function($){
	


	$menu_items = $('ul.sp-megamenu-parent > li.sp-menu-item');
	
	$('ul.sp-megamenu-parent > li.sp-menu-item a').click(function(event) {
		
		var target = $(this).prop('hash');
		if(target) {
			event.preventDefault();

			$menu_items.removeClass('active');
			$(this).parent().addClass('active');

			$('html, body').animate({
				scrollTop: $(target).offset().top - $('#sp-top-bar').height()
			}, 500);
		}
	});

	//scrollspy
	$('[data-spy="scroll"]').each(function () {
		var $spy = $(this).scrollspy('refresh')
	});

});