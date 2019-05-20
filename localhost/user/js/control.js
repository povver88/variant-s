$(function () {
	"use strict";
	$('.title_box').click(function () {

		$(this).toggleClass('open');
		$(this).next('.list_link').toggleClass('open');

	});

	$('#slider_price').slider({
		max: 1000,
		min: 0,
		range: true,
		values: [190,728],
		slide: function( event, ui	) {
			$('input[name="minPrice"]').val( '$' + ui.values[0]	);
			$('input[name="maxPrice"]').val( '$' + ui.values[1]	);
		}
	});

    $('input[name="minPrice"]').val('$' + $('#slider_price').slider('values', 0) );
		$('input[name="maxPrice"]').val('$' + $('#slider_price').slider('values', 1));
		
		$('#cart, .title_cart').click(function() {
			$('#cart_box').toggleClass('open');
		})

		$('#search_button').click(function(){
			$('#search_panel').toggleClass('open');
		});


	});
document.addEventListener("DOMContentLoaded", function () {
	var q = document.querySelectorAll(".cb");
	for (var i in q) {
		if (+i < q.length) {
			q[i].addEventListener("click", function () {
				let c = this.classList,
					p = "pristine";
				if (c.contains(p)) {
					c.remove(p);
				}
			});
		}
	}
});