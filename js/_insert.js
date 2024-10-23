$(function () {
  $("#datetimepicker6").datetimepicker({
    format: "YYYY-MM-DD",
  });
  $("#datetimepicker7").datetimepicker({
    stepping: 30,
    enabledHours: [8, 9, 10, 11, 12, 13, 14, 15, 16],
    datepicker: true,
    ampm: true, // FOR AM/PM FORMAT
    format: "hh:mm A",
  });
  $("#datetimepicker8").datetimepicker({
    stepping: 30,
    enabledHours: [9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
    datepicker: false,
    ampm: false, // FOR AM/PM FORMAT
    format: "hh:mm A",
  });
});

function insert() {
  var requester_name = $("#R_name").val();
  var requester_num = $("#R_num").val();
  var location = $("#location").val();
  var request_date = $("#Date").val();
  var time_from = $("#D_from").val();
  time_from = convert_time(time_from);
  var time_to = $("#D_to").val();
  time_to = convert_time(time_to);
  var desc = $("#Description").val();
  var res = check_input(
    requester_name,
    requester_num,
    location,
    request_date,
    time_from,
    time_to,
    desc
  );
  /*alert(requester_name);
	alert(requester_num);
	alert(request_date);
	alert(time_from);
	alert(time_to);*/
  if (res == false) {
    $("#R_name").css("border", "1px solid red");
    $("#R_num").css("border", "1px solid red");
    $("#location").css("border", "1px solid red");
    $("#Date").css("border", "1px solid red");
    $("#D_from").css("border", "1px solid red");
    $("#D_to").css("border", "1px solid red");
    $("#Description").css("border", "1px solid red");
    $("#alert_danger").fadeIn();
    setTimeout(function () {
      $("#alert_danger").fadeOut();
    }, 1500);
  } else {
    $.ajax({
      url: "_Action/_insert.php",
      method: "POST",

      data: {
        requester_name: requester_name,
        requester_num: requester_num,
        request_date: request_date,
        location: location,
        time_from: time_from,
        time_to: time_to,
        desc: desc,
      },
      dataType: "html",
      async: false,
      crossDomain: true,
      success: function (data) {
        //
        if (data == 1) {
          $("#alert_success").fadeIn();
          setTimeout(function () {
            $("#alert_success").fadeOut();
          }, 1500);
          setTimeout(function () {
            window.location = "Edit.php";
          }, 2000);
        } else {
          $("#error").fadeIn();
          setTimeout(function () {
            $("#error").fadeOut();
          }, 1500);
        }
      },
    });
  }
}

/// to convert AM PM impoooooooooooooooooooooooooortant
function convert_time(time) {
  var time = time;
  var hours = Number(time.match(/^(\d+)/)[1]);
  var minutes = Number(time.match(/:(\d+)/)[1]);
  var AMPM = time.match(/\s(.*)$/)[1];
  if (AMPM == "PM" && hours < 12) hours = hours + 12;
  if (AMPM == "AM" && hours == 12) hours = hours - 12;
  var sHours = hours.toString();
  var sMinutes = minutes.toString();
  if (hours < 10) sHours = "0" + sHours;
  if (minutes < 10) sMinutes = "0" + sMinutes;
  return sHours + ":" + sMinutes + ":00";
}

///////////// Check input Function////////////////
function check_input(id, str) {
  var id = id;
  var str = str;
  if (!str.trim()) {
    return false;
  } else {
    return true;
  }
}
