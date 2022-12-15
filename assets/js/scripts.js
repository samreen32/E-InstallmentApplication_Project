// $("#plans").click(function(){
//     $("#plansCard").open('toggle')
// });


//for profile image url
var loadFile = function (event) {
    var image = document.getElementById("output");
    image.src = URL.createObjectURL(event.target.files[0]);
  };

  //change text on button click
  $('#btn').on('click', function() {
    $('#changeText').text($('#changeAbout').val());
  });