// $("#plans").click(function(){
//     $("#plansCard").open('toggle')
// });


//for profile image url
// var loadFile = function (event) {
//     var image = document.getElementById("output");
//     image.src = URL.createObjectURL(event.target.files[0]);
//   };

  
//change text on button click
$('#btn').on('click', function() {
  $('#changeText').text($('#changeAbout').val());
});

//for session timeout
{/* <script src="jquery-3.6.3.js"></script>
$(document).ready(function() {
  setInterval(function() {
      check_user(1);
  }, 500);
});
function check_user(id){
  console.log(id);
  $.ajax({
      type: 'post',
      url: 'user_timestamp.php',
      dataType: 'html',
      data:{ id:id },
      success: function(response){
         if(response == 'logout'){
          window.location.href='logout.php';
         }
      }
  });
} */}
