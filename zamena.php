<div id="circle-container_1">Средний балл <div class="contador_1">
</div><!-- .contador --> <script>
  var $numero_1 = <?= $shetchik_1?>;
$(".contador_1").html($numero_1);

$inicio_porcentagem_1 = 0;
$fim_porcentagem_1 = $('.contador_1').html();

setInterval(function(){ 
  $(".contador_1").html($inicio_porcentagem_1);
  if($inicio_porcentagem_1 < $fim_porcentagem_1){
  	$inicio_porcentagem_1 = $inicio_porcentagem_1 + 1;
  }
}, 4);
</script> %</div>
        <script src="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/0.5.6/dist/progressbar.js">

        </script>
      <script>
        var
         circleBar4 = new ProgressBar.Circle('#circle-container_1', {
    color: 'red',
    strokeWidth: 2,
    trailWidth: 10,
    trailColor: 'black',
    easing: 'easeInOut'
});

circleBar4.animate(<?=$circle_1?>, {
    duration: 1500
});
</script>