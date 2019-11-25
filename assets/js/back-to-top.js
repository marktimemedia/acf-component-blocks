/*
Name: Back To Top
Author: Marktime Media
Author URI: http://marktimemedia.com
Version: 0.1
License: GPLv2

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License version 2,
 as published by the Free Software Foundation.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
 GNU General Public License for more details.

 The license for this software can likely be found here:
 http://www.gnu.org/licenses/gpl-2.0.html
*/

(function($) {

	$(document).ready(function() {

		var duration = 300;

		$('.back-to-top').on( 'click', function(e) {

			e.preventDefault();

			$('html, body').animate({scrollTop: 0}, duration);

				return false;

			});

		});

})( jQuery );
