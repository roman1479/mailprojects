function typeochered(){
  var data = $(this).serialize();
  var type = "type";
  $.ajax({
    type: "POST",
    url: "../models/function.php",
    data: {"data": data, "type": type},
    success: function(result){
      $('#type').html(result);
    }
  });
}
typeochered();
function nomerok(lett, idtype){
  var data = $(this).serialize();
  var type = "nomerok";
  var idtype = idtype;
  var letter = lett;
  $.ajax({
    type: "POST",
    url: "../models/function.php",
    data: {"data": data, "type": type, "idtype": idtype, "letter": letter},
    success: function(result){
      $('#conclusiontalon').html(result);
    }
  });
}
function ochered(){
  var data = $(this).serialize();
  var type = "ochered";
  $.ajax({
    type: "POST",
    url: "../models/function.php",
    data: {"data": data, "type": type},
    success: function(result){
      $('#result').html(result);
    }
  });
}
window.setInterval(ochered, 3000);
function seeusers(){
  var data = $(this).serialize();
  var type = "seeuser";
  $.ajax({
    type: "POST",
    url: "../models/function.php",
    data: {"data": data, "type": type},
    success: function(result){
      $('#resultuser').html(result);
    }
  });
}
window.setInterval(seeusers, 1000);
function insertochered(idwindow){
  var data = $(this).serialize();
  var type = "insertwin";
  var idwindow = idwindow;
  $.ajax({
    type: "POST",
    url: "../models/function.php",
    data: {"data": data, "type": type,"idwindow": idwindow},
    success: function(result){
      $('#music').html(result);
    }
  });
}
