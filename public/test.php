<script>
  $(function(){
      $(".button").on("click",function(){
          $('.ul').append('<li>'+ "<h1>HTML CODE </h1>" + '<?php $array = ["array1", "array2"]; echo("PHP CODE - " . $array[0] ); ?>' + '</li>');
      });
  });
</script>