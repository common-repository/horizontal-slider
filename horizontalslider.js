
// JavaScript Document



jQuery(window).load(function() {
	
	var trantime = Number(jQuery("#time").val());
//Set Default State of each portfolio piece
	jQuery(".pagingh").show();
	jQuery(".pagingh a:first").addClass("active");
		
	//Get size of images, how many there are, then determin the size of the image reel.
	var imageWidth = jQuery(".windowh").width();
	var imageSum = jQuery(".image_reelh img").size();
	var imageReelWidth = imageWidth * imageSum;
	
	//Adjust the image reel to its new size
	jQuery(".image_reelh").css({'width' : imageReelWidth});
	
	//pagingh + Slider Function
	rotate = function(){	
		var triggerID = jQueryactive.attr("rel") - 1; //Get number of times to slide
		var image_reelhPosition = triggerID * imageWidth; //Determines the distance the image reel needs to slide

		jQuery(".pagingh a").removeClass('active'); //Remove all active class
		jQueryactive.addClass('active'); //Add active class (the jQueryactive is declared in the rotateSwitch function)
		
		//Slider Animation
		jQuery(".image_reelh").animate({ 
			left: -image_reelhPosition
		}, 500 );
		
	}; 
	
	//Rotation + Timing Event
	rotateSwitch = function(){		
		play = setInterval(function(){ //Set timer - this will repeat itself every 3 seconds
			jQueryactive = jQuery('.pagingh a.active').next();
			if ( jQueryactive.length === 0) { //If pagingh reaches the end...
				jQueryactive = jQuery('.pagingh a:first'); //go back to first
			}
			rotate(); //Trigger the pagingh and slider function
		}, trantime); //Timer speed in milliseconds (3 seconds)
	};
	
	rotateSwitch(); //Run function on launch
	
	//On Hover
	jQuery(".image_reelh a").hover(function() {
		clearInterval(play); //Stop the rotation
	}, function() {
		rotateSwitch(); //Resume rotation
	});	
	
	//On Click
	jQuery(".pagingh a").click(function() {	
		jQueryactive = jQuery(this); //Activate the clicked pagingh
		//Reset Timer
		clearInterval(play); //Stop the rotation
		rotate(); //Trigger rotation immediately
		rotateSwitch(); // Resume rotation
		return false; //Prevent browser jump to link anchor
	});	
	


});




