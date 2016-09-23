$(document).ready(function(){
  var firstPinoutUrl = "images/piABPinout.png"; //I KNOW!
  var secondPinoutUrl = "images/piAPlusBPlusB2Three.png";
  var actualSelection = 0;
  var firstPinOutTitle = "Raspberry Pi Model A and B";
  var secondPinOutTitle = "Raspberry Pi Model A+, B+, 2 and 3"
  $("#pinoutImage").click(function(){
    if(actualSelection == 0)
    {
      $(this).attr("src", firstPinoutUrl);
      $("#pinout").text(firstPinOutTitle);
      actualSelection++;
    }else if(actualSelection == 1)
    {
      $(this).attr("src", secondPinoutUrl);
      $("#pinout").text(secondPinOutTitle);
      actualSelection = 0;
    }
  });
});
