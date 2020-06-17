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
        $(".main").delay(350).fadeOut(1000,() => {
        	/**Section Category **/
           $("#category").delay(750).fadeIn(1000,() => {
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
					$(evt.currentTarget).closest(".img-thumbnail").dimBackground().addClass("showBackground").css("padding", "20px 0 0").find("h3").append(`
			        	<div class="row seek">
							<form><hr class="mt-4">
								<div class="form-group" style="margin-bottom: 0" id="input-container">
									<label for="input">ODABERITE KOLICINU:</label>
						            <input type="number" class="form-control" id="input" step="0.1" min="0" value="0.0">
						            <span id="kg">KG</span>
						        </div>
						        <button id="dodaj" class="btn btn-danger btn-block mt-4" type="button">
			                		<i class="fas fa-shopping-cart" style="position:relative; margin-right:40%"><span>Dodaj</span>
			                		</i>
			                	</button>
		                	</form>
		                </div>	
			        `)
	  				preventClick = true
	  			}	
			})
			$(document).on("click", "#dodaj", (evt) => {
				if(preventClick)
	  			{
					$(".seek").remove()
					$(".img-thumbnail").undim().removeClass("showBackground").css("padding", "30px 0 0")
					preventClick = false
				}
				//let voce = $(".img-thumbnail h3").html()
				$(".table tbody").prepend(`
					<tr>
				      	<th scope="row">
				      		<i class="fa fa-times-circle deleteRow" aria-hidden="true"></i>
						</th>
				      	<td>
				      		<a href="#">
								<img class="img-fluid" src="https://via.placeholder.com/70x100">
							</a>
				      	</td>
				      	<td>JABUKE</td>
				      	<td>24.990 RSD</td>
				      	<td style="width: 10%">
				      		<input id="input-korpa" type="number" step="0.1" min="0" class="form-control">	
				      	</td>
				      	<td>24.990 RSD</td>
				    </tr>
				`)
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
				        $(".seek").remove()
				        $(evt.currentTarget).undim().removeClass("showBackground").css("padding", "30px 0 0") 
				        preventClick = false
				    }    
			    },
			})
			/**Section Category **/
        })
    })
	/**Section Main **/
	/**Section Cart **/
	$("button").on("click", () => {
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
        $("#order").show()
    })
	/**Section Cart **/
	/**Section Order**/
	$("#order #backToPrev").on("click", () => {
		$("#order").hide()
		$("#cart").show()
	})
})


