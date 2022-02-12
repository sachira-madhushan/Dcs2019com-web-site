$(document).ready(function(){
  $("#About").click(function(){
  
    $(".aboutme").slideToggle();

    });


    $("#send").click(function(){
  
    $(".send").slideToggle();

    });

    $(".image").click(function(){
  
    //$("#msg").slideToggle("right");
    $('#msg').toggle("slide");

    });

    $( "#draggable" ).draggable();


  });