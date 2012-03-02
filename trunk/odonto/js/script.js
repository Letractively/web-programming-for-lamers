
		
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
				glassText: ['Servicios', 'Nosotros', 'Ultimos Avances']
		});
		
		
		
		
		$(".servicio").mousemove( function() {
										   
			var target = $('.servicioText', this);
			
			if (target.css('display') == 'none') {

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










