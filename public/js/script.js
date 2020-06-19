$(() => {
	let left 
	if($(window).innerWidth() > 575)
	{
		left = "70px"
	}
	else
	{
		left = "30px"
	}
	/**Section Main **/
    $(".main img").on("click", () => {
        $(".main").delay(350).fadeOut(1000)
    })
    /**For Redirect only**/
	$(window).on("load", () => {
    /**Section Category **/
       	$("#category").delay(500).fadeIn(1000,() => {
            $(".bordered").animate({
            	left: left
            }, 750, () => {
            	$(".bordered").animate({
	            	left: "25px"
	            },750, () => {
	            	let showBackground = () => {
	            		$(".category").css({
						   background: "#efebeb",
						   border: "2px solid #cccccc",
						   borderRadius: "25px",
						   margin: "0 15px"
		            	}, 900)
	            	}
	            	$(".category").delay(750).queue(showBackground)
	            })
            })
        })
       	$("#cat-10").delay(750).fadeIn(1500, () => {
       		$(".img-thumbnail").animate({
            	padding: "30px 0 0"
            }, 750)
            $("#cat-10").animate({
            	maxWidth: "60%",
					marginLeft: "100px"
            }, 750)
       	}) 
       	$("#cat-1").on({
       		mouseenter: (evt) => {
			    if(!('ontouchstart' in window))
				{
			        $(".bordered.col-lg-1").css({
			        	flex: "0 0 10.333333%",
    					maxWidth: "10.333333%"
			        }) 
			    }       
		    },         
		    mouseleave: (evt) => {
			    if(!('ontouchstart' in window))
				{   
			        $(".bordered.col-lg-1").css({
			        	flex: "0 0 6.333333%",
    					maxWidth: "6.333333%"
			        })
			    }    
		    }
       	})
		$("#block-thumbnail a img").on({                         
		    mouseenter: (evt) => {
			    if(!('ontouchstart' in window))
				{
			        $(evt.currentTarget).css({
			            width: "8vw",
			            padding: "5px"
			        }) 
			    }    
		    },         
		    mouseleave: (evt) => {
		    if(!('ontouchstart' in window))
				{	
			        $(evt.currentTarget).css({
			            width: "6vw",
			            padding: "0"
			        })
			    }    
		    },
		    click: (evt) => {
			    if(!('ontouchstart' in window))
			    {	
			        $(".bordered.col-lg-1").css({
			        	flex: "0 0 6.333333%",
    					maxWidth: "6.333333%"
			        })   
			    }  
		    },
		    touchstart: (evt) => {
	            $(".bordered.col-2").css({
	                flex: "0 0 16.666667%",
	                maxWidth: "16.666667%"
	            })
	            $(evt.currentTarget).css({
		            padding: "5px"
		        })
	        },
	        touchend: (evt) => {
	            $(".bordered.col-2").css({
	                flex: "0 0 12.666667%",
	                maxWidth: "12.666667%"
	            })
	            $(evt.currentTarget).css({
		            padding: "0"
		        })
	        }
		})
			let preventClick = false

		$(".figure-img").on('click', (evt) => {
			if(!preventClick)
  			{
				$(evt.currentTarget).closest(".img-thumbnail").dimBackground().addClass("showBackground").css("padding", "20px 0 0").find(".seek").show()
  				preventClick = true
  			}	
		})
		$(".img-thumbnail").on({                         
		    mouseenter: (evt) => {
		        $(evt.currentTarget).css("cursor","zoom-in")
		    },            
		    mouseleave: (evt) => {
		        $(evt.currentTarget).css("cursor","zoom-out")
		    },
		    mouseleave: (evt) => {
			    if(preventClick)
  				{	
			        $(evt.currentTarget).undim().removeClass("showBackground").css("padding", "30px 0 0").find(".seek").hide()
			        preventClick = false
			    }    
		    },
		})
		$(document).on("click", ".btn-danger", (evt) => {
			if(preventClick)
  			{
				$(".img-thumbnail").undim().removeClass("showBackground").css("padding", "30px 0 0").find(".seek").hide()
				preventClick = false
			}
		})
		/**Section Category **/
    })
    /**For Redirect only**/
	/**Section Main **/
	/**Section Cart **/
	$(".btn-success").on("click", () => {
		$("#category").hide()
		$("#cart").show(500) 
	})
	$("#cart #backToPrev").on("click", () => {
		$("#cart").hide()
		$("#category").show()
	}) 
	if($(window).innerWidth() < 576)
	{
		$("#small-screen button").addClass("btn-block")
	}
	$('body').on('click', '.deleteRow', (evt) => {
		$(evt.currentTarget).parents('tr').remove()
	})
	$("#nastavi button").on("click", () => {
        $("#cart").hide()
        $("#order").show(500)
    })
	/**Section Cart **/
	/**Section Order**/
	$("#order #backToPrev").on("click", () => {
		$("#order").hide()
		$("#cart").show(500)
	})

	/**Pagination**/
	 $(window).on("load", (evt) => {
	 	$(".seek").hide()
        $(".pagination .page-item").removeClass('disabled')
    })
})


