$(() => {
	let left 
	if($(window).innerWidth() > 575)
	{
		left = "60px"
	}
	else
	{
		left = "30px"
	}
	/**NAVIGATION**/
	if($(window).innerWidth() < 576)
    {
        $("#hideOnSmallScreen").hide()
        $("nav #hideOnSmallScreen a").hide()
        $("nav a.logo p").hide()
        $("nav #navBarMenu").click((evt) => {
	       	$("footer p").toggleClass("hideWhenReady")
	       	$("nav a.logo p").fadeToggle(500)
	    })
    }
    if($(window).innerWidth() > 575)
    {
        $(".bordered.col-lg-1").css({
        	flex: "0 0 6.333333%",
			maxWidth: "6.333333%"
        })
        $("#block-left-thumbnail a img").css({
        	width: "8vw",
        	marginLeft: 0
        })
        $("nav ul.navbar-nav li.register").css({
        	position: "absolute",
  			left: "15px"
  		})
  		$(window).scroll((evt) => {
  			let width  = $(window).width(),
				height = $(window).height()
			if ($(evt.currentTarget).scrollTop() > 0) {
			    $("nav #hideOnSmallScreen").fadeOut(750)
			    if(width > height)
				{
					$("nav .hideOnSmallScreen").fadeOut(750)
				}
			} else {
			    $("nav #hideOnSmallScreen").fadeIn(500)
			    $("nav .hideOnSmallScreen").fadeIn(500)
			}		
		})
		$("nav#navbar").addClass("fixed-top")
		/**Bellow is for dashboard img index blade**/
		//$(".img-fluid").css("padding", "7px")
    }
    /**NAVIGATION**/
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
	            	left: left
	            },750, () => {
	            	let showBackground = () => {
	            		$(".category #cat-10 .row:eq(1)").css({
						   background: "#E3EFF9",
						   border: "2px solid #cccccc",
						   borderRadius: "25px"
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
            $(".img-thumbnail").css("text-align", "center")
            $("#cat-10").animate({
            	maxWidth: "60%",
    			marginLeft: "175px"
            }, 750)
       	}) 
        	
		$("#block-left-thumbnail a img").on({                         
		    mouseenter: (evt) => {
			    if(!('ontouchstart' in window))
				{
			        $(evt.currentTarget).addClass("cat-Border")
			    }    
		    },         
		    mouseleave: (evt) => {
		    if(!('ontouchstart' in window))
				{	
			        $(evt.currentTarget).removeClass("cat-Border")
			    }    
		    },
		    click: (evt) => {
			    if(!('ontouchstart' in window))
			    {	
			        $(".bordered.col-lg-1").css({
			        	flex: "0 0 6.333333%",
    					maxWidth: "6.333333%"
			        }) 
			        $("#block-thumbnail a img").css({
			        	width: "8vw"
			        })
			        $("#cat-1").css("height", "554px")
			    }  
		    },
		    /*touchstart: (evt) => {
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
	        }*/
		})
			let preventClick = false

		// $(".figure-img").on('click', (evt) => {
		// 	if(!preventClick)
  // 			{
  // 				$("section.category #cat-10").css("opacity", 1)
		// 		$(evt.currentTarget).closest(".img-thumbnail").dimBackground().addClass("showBackground").find(".seek").show()
  // 				preventClick = true
  // 			}	
		// })
		$(".img-thumbnail").on({                         
		    mouseenter: (evt) => {
		        $(evt.currentTarget).css("cursor","zoom-in")
		    },            
		    mouseleave: (evt) => {
		        $(evt.currentTarget).css("cursor","zoom-out")
		    },
		    // mouseleave: (evt) => {
			   //  if(preventClick)
  				// {	
			   //      $(evt.currentTarget).undim().removeClass("showBackground").css("padding", "30px 0 0").find(".seek").hide()
			   //      preventClick = false
			   //  }    
		    // },
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
	/**Pagination**/
	 $(window).on("load", (evt) => {
	 	$(".seek").hide()
        $(".pagination .page-item").removeClass('disabled')
    })
})


