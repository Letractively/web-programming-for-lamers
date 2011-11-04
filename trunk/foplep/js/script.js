
		
	$(document).ready( function() {

		
		
		$.preload( [    'institucional_off.jpg', 'institucional_on.jpg',
						'presidencia_off.jpg', 'presidencia_on.jpg',
						'comisiones_off.jpg', 'comisiones_on.jpg',
						'consejo_off.jpg', 'consejo_on.jpg',
						'contacto_off.jpg', 'contacto_on.jpg',						
						'home_off.jpg', 'home_on.jpg'], {
			base:'img/menu/',
			ext:'.jpg',
			threshold: 2
		});
		
		
		$('#profile-content').jScrollPane();
		$('.ceebox').ceebox({titles : false});		
				
		$('#loginbutton').click(function(e) {
			e.preventDefault();
			$('#loginbox').toggle();
			$('#loginbox').css('top', $(this).position().top + 18 );
			$('#loginbox').css('left', $(this).position().left - 163 );			
		});
		
		$('#loginform-tiny .close').click(function() {
			$('#loginbox').hide();		   
		});

		
		var popupParagraph = $('<p style="position:absolute; background-color:#efe; font-family:Trebuchet MS; border:1px solid #000; font-size:12px; z-index:200; display:none;">Hola :D</p>');
		popupParagraph.appendTo('html');
		
		$('[popup]').mousemove( function (e) {
			
			var popupText = $(this).attr('popup');
			popupParagraph.html(popupText);

			popupParagraph.css('top', e.pageY+"px");
			popupParagraph.css('left', e.pageX+"px");
			
			if ($(this).attr('popupcolor')) {
				popupParagraph.css('background-color', $(this).attr('popupcolor'));
			}
			
			popupParagraph.show();			

		});
		
		$('[popup]').mouseleave( function () {
			popupParagraph.hide();			
		});		
		
		/*
		$('#menu a').not('.current').mouseenter( function() {
			$(this).stop();										 
			$(this).animate({ color: "#98e655" }, 600);			
		});
		
		$('#menu a').not('.current').mouseout( function() {
			$(this).stop();
			$(this).animate({ color: "#000" }, 200);			
		});
		*/
		
		var menuopen = false;
		
		$('.popup-button').click(function(e) {
			e.preventDefault();
			
			var selector = $(this).attr('menu');
			
			openmenu(selector);

		});
		
		
		function openmenu(selector) {
			
						if (!menuopen) {
							
							$('#'+selector).stop();
							
							var left = ($(document).width() / 2) - $('#'+selector).width() / 2;
							var top = ($(window).height() / 2) - $('#'+selector).height() / 2;			
							$('#'+selector).css("top", $(window).scrollTop()-$('#'+selector).height());
							$('#'+selector).css("left", left+"px");
							$('#'+selector).fadeTo(0, 1.0);			
							$('#'+selector).show();
							$('#'+selector).animate({"top" : $(window).scrollTop()+top+"px"}, 600);
							
							menuopen = true;
							
						}
						
		}		

		
		$('.closeblack').click( function () {

			$('#updateavatar').stop();
			$('#editprofile1').stop();
			$('#editprofile2').stop();
			$('#editprofile3').stop();			
			$('#preferences').stop();
			$('#opportunity').stop();
			$('#viewopportunities').stop();			
			$('#changepassword').stop();

			$('#viewopportunities').fadeTo(100, 0.0);
			$('#updateavatar').fadeTo(100, 0.0);			
			$('#editprofile1').fadeTo(100, 0.0);
			$('#editprofile2').fadeTo(100, 0.0);
			$('#editprofile3').fadeTo(100, 0.0);
			$('#opportunity').fadeTo(100, 0.0);			
			$('#preferences').fadeTo(100, 0.0);
			$('#changepassword').fadeTo(100, 0.0, function () {
				$('#updateavatar').hide();															
				$('#editprofile1').hide();
				$('#editprofile2').hide();
				$('#editprofile3').hide();		
				$('#opportunity').hide();				
				$('#preferences').hide();		
				$('#changepassword').hide();
				$('#viewopportunities').hide();
				
				menuopen = false;
			});
			

		});
		
		
		
		$('#changepassword-save').click( function() {
			
			$('#changepassword-save').hide();
			$('#changepassword-log').html('<p style="color:#009900;">Updating...<p>');
			
			$.ajax({
			   type: "POST",
			   url: "action/user.php?a=changepassword",
			   dataType: "html",
			   data: ({ oldpassword1 : $('input[name="oldpassword1"]').attr('value'),
						oldpassword2 : $('input[name="oldpassword2"]').attr('value'),
						newpassword1 : $('input[name="newpassword1"]').attr('value'),
						newpassword2 : $('input[name="newpassword2"]').attr('value')	
					 }),
			   success: function(msg){
				   
					$('#changepassword-save').show();
					
					if (msg) {
						$('#changepassword-log').html(msg);
					} else {
						$('#changepassword-log').html('<p style="color:#009900;">New password saved<p>');
						setTimeout( function () {
							$('.closeblack').trigger('click');
							$('#changepassword-log').html('');
							
							$('input[name="oldpassword1"]').attr('value', '');
							$('input[name="oldpassword2"]').attr('value', '');
							$('input[name="newpassword1"]').attr('value', '');
							$('input[name="newpassword2"]').attr('value', '');
						}, 600);
					}
			   }
			 });
					 
		});
		
		
		
		$('#preferences-save').click( function() {
			
			var pref = 0;
			
			$('#preferences-save').hide();
			$('#preferences-log').html('<p style="color:#009900;">Updating...<p>');

			$('#preferences input[name="preferences[]"]:checked').map( function() {
				if ($(this).attr('value')) {
					pref = pref + parseInt($(this).attr('value'));
				}
			});		
			
			$.ajax({
			   type: "POST",
			   url: "action/user.php?a=preferences",
			   dataType: "html",
			   data: ({ preferences : pref }),
			   success: function(msg){
				   
					$('#preferences-save').show();
					
					if (msg) {
						$('#preferences-log').html(msg);
					} else {
						$('#preferences-log').html('<p style="color:#009900;">Preferences saved<p>');
						setTimeout( function () {
							$('.closeblack').trigger('click');
							$('#preferences-log').html('');
							
						}, 600);
					}
			   }
			 });
					 
		});	
		
		
		
		
		$('#opportunity-save').click( function() {
			
			var area_list = "";
			
			$('#opportunity-save').hide();
			$('#opportunity-log').html('<p style="color:#009900;">Updating...<p>');

			$('#opportunity input[name="area[]"]:checked').map( function() {
				if ($(this).attr('value')) {
					area_list = area_list + $(this).attr('value') + ",";
				}
			});	
			
			$.ajax({
			   type: "POST",
			   url: "action/user.php?a=opportunity",
			   dataType: "html",
			   data: ({ area : area_list,
					  	title: $('input[name="title"]').attr('value'),
					  	age: $('select[name="age"]').attr('value'),
					  	duration: $('select[name="duration"]').val(),
					  	location: $('select[name="country"]').val() + ", " + $('input[name="city"]').attr('value'),
						description: $('textarea[name="description"]').val(),
						ngo: $('input[name="ngo"]').attr('value'),
						tags: $('input[name="tags"]').attr('value')						
					  
				}),
			   success: function(msg){
				   
					$('#opportunity-save').show();
					
					if (msg) {
						$('#opportunity-log').html(msg);
					} else {
						$('#opportunity-log').html('<p style="color:#009900;">Volunteer Opportunity Created<p>');
						setTimeout( function () {
							$('.closeblack').trigger('click');
							$('#opportunity-log').html('');
							
						}, 600);
					}
			   }
			 });
					 
		});			
		
		

		$('#editprofile1-save').click( function() {
			editprofile1save(0);
		});	

		$('#editprofile1-next').click( function() {
			editprofile1save(2); 
		});	
		
		$('#editprofile2-save').click( function() {
			editprofile2save(0); 
		});
		
		$('#editprofile2-back').click( function() {
			editprofile2save(1); 
		});
		
		$('#editprofile2-next').click( function() {
			editprofile2save(3); 
		});		
		
		$('#editprofile3-save').click( function() {
			editprofile3save(0); 
		});
		
		$('#editprofile3-back').click( function() {
			editprofile3save(2); 
		});		
		
		
		
		
		function editprofile1save(next) {
	
					$('#editprofile1-save').hide();
					$('#editprofile1-next').hide();					
					$('#editprofile1-log').html('<p style="color:#009900;">Updating...<p>');
					
					$.ajax({
					   type: "POST",
					   url: "action/user.php?a=editprofile1",
					   dataType: "html",
					   data: ({ firstname : $('input[name="firstname"]').attr('value'),
								lastname : $('input[name="lastname"]').attr('value'),
								occupation : $('input[name="occupation"]').attr('value'),
								msn : $('input[name="msn"]').attr('value'),
								skype : $('input[name="skype"]').attr('value'),
								gtalk : $('input[name="gtalk"]').attr('value'),
								country : $('input[name="country"]').attr('value'),
								city : $('input[name="city"]').attr('value'),
								state : $('input[name="state"]').attr('value'),
								email : $('input[name="email"]').attr('value')							
							 }),
					   success: function(msg){
		
							$('#editprofile1-save').show();
							$('#editprofile1-next').show();
								
							if (msg) {
								$('#editprofile1-log').html(msg);

							} else {
								$('#editprofile1-log').html('<p style="color:#009900;">Info updated<p>');
								setTimeout( function () {
									$('.closeblack').trigger('click');
									$('#editprofile1-log').html('');								
									
									
									if (next) {
										setTimeout( function () { openmenu("editprofile"+next); }, 200);
									} else {
										setTimeout( function () { location.reload(true); }, 200);
									}
		
									
								}, 600);
							}
					   }
					 });	
					
					
		}
		
		
		function editprofile2save(next) {
			
					$('#editprofile2-save').hide();
					$('#editprofile2-next').hide();
					$('#editprofile2-back').hide();
					
					$('#editprofile2-log').html('<p style="color:#009900;">Updating...<p>');
					
					$.ajax({
					   type: "POST",
					   url: "action/user.php?a=editprofile2",
					   dataType: "html",
					   data: ({ education : $('textarea[name="education"]').val(),
								work : $('textarea[name="work"]').val(),
								interest : $('textarea[name="interest"]').val(),
								quote : $('textarea[name="quote"]').val()
							 }),
					   success: function(msg){
		
							$('#editprofile2-save').show();
							$('#editprofile2-next').show();
							$('#editprofile2-back').show();
									
							if (msg) {
								$('#editprofile2-log').html(msg);
							} else {
								$('#editprofile2-log').html('<p style="color:#009900;">Info updated<p>');
								setTimeout( function () {
									$('.closeblack').trigger('click');
									$('#editprofile2-log').html('');
									
									if (next) {
										setTimeout( function () { openmenu("editprofile"+next); }, 200);
									} else {
										setTimeout( function () { location.reload(true); }, 200);
									}							
									
								}, 600);
							}
					   }
					 });
					
		}
		
		
		
		function editprofile3save(next) {
					var area_list = "";
					

					
					$('#editprofile3-save').hide();
					$('#editprofile3-back').hide();
					$('#editprofile3-log').html('<p style="color:#009900;">Updating...<p>');
					
					$('#editprofile3 input[name="area[]"]:checked').map( function() {
						if ($(this).attr('value')) {
							area_list = area_list + $(this).attr('value') + ",";
						}
					});
					

					
					$.ajax({
					   type: "POST",
					   url: "action/user.php?a=editprofile3",
					   dataType: "html",
					   data: ({ areas : area_list }),
					   success: function(msg){
							$('#editprofile3-save').show();
							$('#editprofile3-back').show();
									
							if (msg) {
								$('#editprofile3-log').html(msg);
							} else {
								$('#editprofile3-log').html('<p style="color:#009900;">Info updated<p>');
								setTimeout( function () {
									$('.closeblack').trigger('click');
									$('#editprofile3-log').html('');									

									
									if (next) {
										setTimeout( function () { openmenu("editprofile"+next); }, 200);
									} else {
										setTimeout( function () { location.reload(true); }, 200);
									}						
									
								}, 600);
							}
					   }
					 });
					
		}			
		
		
		$('#useravatar').mouseover( function() {
			$('#updateavatar-button').css('top', ($(this).position().top + $(this).height() - $('#updateavatar-button').height()) + "px");
			$('#updateavatar-button').css('left', ($(this).position().left + $(this).width() - $('#updateavatar-button').width()) +  "px");
			
			$('#updateavatar-button').show();
			
		});
		
		$('#useravatar').mouseout( function() {			
			$('#updateavatar-button').hide();
		});
		
		
		
		$('#searchform-submit').click( function() {
			$('#searchform').submit();
		});
		
		
		
		
		
		
		
		
		
		
		
		
		$("#twitter").getTwitter({
			userName: "CrossTheLine1",
			numTweets: 4,
			loaderText: "Loading tweets...",
			slideIn: true,
			slideDuration: 0,
			showHeading: false,
			headingText: "",
			showProfileLink: false,
			showTimestamp: true
		});		
		
		

	});










