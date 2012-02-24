

	jQuery.fn.fadeButton = function(par, action){
			
			var obj = this;
			
			var parDefault = {
				cursor : "pointer",
				fadeInDuration : 100,
				fadeOutDuration : 600,
			}
			
			var param = $.extend(parDefault, par);
			
			
			var size_img = new Image();
			
			size_img.onload = function() {
				
				if (param.height) {
					obj.css('height', param.height+'px');
				} else {
					obj.css('height', size_img.height+'px');					
				}
						
				if (param.width) { 
					obj.css('width', param.width+'px');				
				} else {
					obj.css('width', size_img.width+'px');					
				}
			
			}
			
			size_img.src = param.src1;			

			if (param.cursor) this.css('cursor', param.cursor);
			
			this.css('background-image', 'url('+param.src1+')');
			
			
			this.css('overflow', 'hidden');
			this.append("<div><a style='display:block; width:100%; height:100%;'><img /></a></div>");

			$("div > a", this).attr('href', param.href);
			$("div > a > img", this).attr('src', param.src2);
			$("div", this).css('display', 'none');


			this.mouseenter( function() {
				$('div', this).stop();								   
				$('div', this).fadeTo(param.fadeInDuration, 1.0);							 
			});
			
			this.mouseleave( function() {
				$('div', this).stop();									
				$('div', this).fadeTo(param.fadeOutDuration, 0.0);
			});
			
			if (action) {
				if ($.isFunction(action)) {
					
					this.click(action);	
					
				} else if (typeof ation == "string") {
					
				}
				
			}
			

	}