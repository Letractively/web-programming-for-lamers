

	jQuery.fn.fadeButton = function(par, action){
			
			
			var parDefault = {
				cursor : "pointer",
				fadeInDuration : 100,
				fadeOutDuration : 600,
			}
			
			param = $.extend(parDefault, par);
			
			if (param.height) this.css('height', param.height+'px');
			if (param.width) this.css('width', param.width+'px');
			if (param.cursor) this.css('cursor', param.cursor);
			
			this.css('background-image', 'url('+param.src1+')');
			
			
			this.css('overflow', 'hidden');
			this.append("<div><img /></div>");
			
			$("div > img", this).attr('src', param.src2);
			$("div", this).css('display', 'none');


			this.mouseover( function() {
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