function startExam() {
   $.ajax({
      type:'get',
      url:'start_exam',
      success:function(data) {
         $("#current_question").html(data['html']);
         $('#start_exam').remove();
         $('#start_exam_div').remove();
         console.log(data['date']);
         count(data['date']);
      }
   });
}

function nextQuestion() {
   $selected = $("input[type='radio'][name='answer']:checked").val();
   console.log($selected);
   $.ajax({
      type:'GET',
      url:'next_question/{answer}',
      data : {answer : $selected},
      success:function(data) {
      if(data === '1'){
         $('#demo').remove();
         $("#current_question").html('Thank You');
      }
      else if(data != 0)
      {
         $("#current_question").html(data);
      }
      }
   });
}

function count(date) {
   // Set the date we're counting down to
   var countDownDate = new Date(date).getTime();

   // Update the count down every 1 second
   var x = setInterval(function() {

   // Get today's date and time
   var now = new Date().getTime();

   // Find the distance between now and the count down date
   var distance = countDownDate - now;

   // Time calculations for days, hours, minutes and seconds
   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
   var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
   var seconds = Math.floor((distance % (1000 * 60)) / 1000);

   // Display the result in the element with id="demo"
   document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s ";

   // document.getElementById("demo").innerHTML = days + "d " + hours + "h "
   // + minutes + "m " + seconds + "s ";
   // If the count down is finished, write some text
   if (distance < 0) {
      clearInterval(x);
      document.getElementById("demo").innerHTML = "EXPIRED";
      $("#current_question").html('Your Time Has Expired');
   }
   }, 1000);
}

$(document).ready(() => {
   $('.mrdOption').on('click' , ()=>  {
      console.log('its rum n');
      $('.mrd_sec').hide() ; 
   })

   $('.testing').on('change', (event) => {
      console.log(event.target.value);
      if(event.target.value == 3 )
      {
         
         $('.mrd_sec').slideDown(700)  ;
         
      }else 
      {
         $('.mrd_sec').slideUp(700) ;

      }

   } )
   
    $('.pic_file').on('change' , () => {
      let currentVal =  $('.pic_file').val() ;
      $('#pic_val').val($('.pic_file').val());  
      let myVal = $('.pic_file').val() ; 
      document.getElementById('pic_val').innerHTML = myVal
 
   })


   $('.consumeFile').on('change' , () => {
      let currentVal =  $('.consumeFile').val() ;
      $('#consume').val($('.consumeFile').val());  
      let myVal = $('.consumeFile').val() ; 
      document.getElementById('consume').innerHTML = myVal
 
   })

})
























