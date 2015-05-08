
$.get('prix.php', {
  one : $('.input').val(), 
  two : $('.argent').val()
}).done(function(data){
  j=0 
  var resultats_yay = jQuery.parseJSON( data );
  $('.input').val(resultats_yay[0])
  $('.argent').val(resultats_yay[1])
})


  $('.ouii').click(function(){
    val= $('.input').val();
      if(val>0){
         $('.input').val(val-1)
      }
  })