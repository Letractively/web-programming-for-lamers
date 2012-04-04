
		
	$(document).ready( function() {


/*
		$.preload( [ 'img_left/1.jpg', 'img_left/2.jpg', 'img_left/3.jpg', 'img_left/4.jpg', 
					'img_right/1.png', 'img_right/2.png', 'img_right/3.png', 'img_right/4.png'], {
			base:'img/',
			ext:'',
			threshold: 2
		});
	*/
		
		

		$("#slider").easySlider({
				auto: true, 
				continuous: true,
				prevId: 'prevBtn',
				nextId: 'nextBtn',
				prevText: '',
				nextText: '',
				pause: 4000,
				glassText: ['Servicios', 'Ultimos Avances', 'Nosotros']
		});
		
		
		
		
		$(".servicio").mousemove( function() {
										   
			var target = $('.servicioText', this);
			var targetImg = $('.servicioImg', this);
			
			if (target.css('display') == 'none') {

				targetImg.attr("src",function() {
					var name=$(this).attr("name");
					return "img/block/" + name +"Color.png";
				});
				
				target.fadeTo(0, 0.61);
				target.animate({ 					
					'margin-top' : '-112',
					'height' : '72'
					}, 200															   
				);
			}
			
				
		});
		
		
		$(".servicio").mouseleave( function() {
			
			var target = $('.servicioText', this);
			var targetImg = $('.servicioImg', this);
			
			targetImg.attr("src",function() {
					var name=$(this).attr("name");
					return "img/block/" + name +"BN.png";
				});
				
			target.fadeTo(250, 0.0, function() {
				target.css('margin-top', '-40px');
				target.css('height', '0px');
				target.hide();
				
				target.clearQueue();
			});
			
		

		});
		
		$(".servicio").click( function() {
		//	$("a.link", this).trigger("click");
		//	document.location.href = $("a.link", this).attr("href");
		document.location.href = $("base").attr("href") + $("a.link", this).attr("href");
		});

	});

(function($) {
  var cache = [];
  // Arguments are image paths relative to the current page.
  $.preLoadImages = function() {
    var args_len = arguments.length;
    for (var i = args_len; i--;) {
      var cacheImage = document.createElement('img');
      cacheImage.src = arguments[i];
      cache.push(cacheImage);
    }
  }
})(jQuery)
