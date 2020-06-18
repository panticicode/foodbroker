<!DOCTYPE html>

<html lang="en">

<head>

<title>jQuery Get the data-id Attribute</title>






</head>

<body>
<p>If you click on the "Hide" button, I will disappear.</p>

<button id="hide">Hide</button>
<button id="show">Show</button>
 



<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>

$(function() {
   	$("#hide").click(function(){
 	 $("p").hide();
});

$("#show").click(function(){
  $("p").show();
}); 
});
 </script>
    </body>

    </html>

