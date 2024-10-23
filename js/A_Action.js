//////////////////////////// Buttom Update on the table Function /////////////////////////
function update_row(id) {
  var id = id;
  $("#requester_name-" + id).attr("contenteditable", "true");
  $("#requester_name-" + id).css("border", "2px solid #581845");

  $("#requester_num-" + id).attr("contenteditable", "true");
  $("#requester_num-" + id).css("border", "2px solid #581845");

  $("#location-" + id).attr("contenteditable", "true");
  $("#location-" + id).css("border", "2px solid #581845");

  $("#request_date-" + id).attr("contenteditable", "true");
  $("#request_date-" + id).css("border", "2px solid #581845");

  $("#time_from-" + id).attr("contenteditable", "true");
  $("#time_from-" + id).css("border", "2px solid #581845");

  $("#time_to-" + id).attr("contenteditable", "true");
  $("#time_to-" + id).css("border", "2px solid #581845");

  $("#description-" + id).attr("contenteditable", "true");
  $("#description-" + id).css("border", "2px solid #581845");

  event.preventDefault();
  $("#Save-" + id).prop("disabled", false);
  $("#Delete-" + id).prop("disabled", false);
}

/////////////////////////// Save Botton Function //////////////////////
function Save_row(id) {
  var id = id;
  var requester_name = $("#requester_name-" + id).text();
  var requester_num = $("#requester_num-" + id).text();
  var location = $("#location-" + id).text();
  var request_date = $("#request_date-" + id).text();
  var time_from = $("#time_from-" + id).text();
  var time_to = $("#time_to-" + id).text();
  var description = $("#description-" + id).text();
  $.ajax({
    url: "_Action/_Update.php",
    method: "POST",
    data: {
      id: id,
      requester_name: requester_name,
      requester_num: requester_num,
      location: location,
      request_date: request_date,
      time_from: time_from,
      time_to: time_to,
      description: description,
    },
    success: function (data) {
      if (data == 1) {
        Saved();
        window.setTimeout(function () {
          window.location = "A_Edit.php";
        }, 5000);
      } else {
        Error();
        $("#requester_name-" + id).attr("contenteditable", "false");
        $("#requester_num-" + id).attr("contenteditable", "false");
        $("#location-" + id).attr("contenteditable", "false");
        $("#request_date-" + id).attr("contenteditable", "false");
        $("#time_from-" + id).attr("contenteditable", "false");
        $("#time_to-" + id).attr("contenteditable", "false");
        $("#description-" + id).attr("contenteditable", "false");
      }
      event.preventDefault();
      $("#Save-" + id).prop("disabled", true);
      $("#Delete-" + id).prop("disabled", true);
    },
  });
}
/////////////////// Saved Toast ////////////////////
function Saved() {
  $.toast({
    heading: 'Saved !!',
    text: "Request Updated Successfully",
    textAlign: 'center',
    showHideTransition: 'slide',
    position: 'top-center',
    icon: 'success',
    hideAfter: 5000

  })
}
/////////////////// Error Toast ////////////////////
function Error() {
  $.toast({
    heading: 'Error !! ',
    text: "Request not Updated",
    textAlign: 'center' ,
    showHideTransition: 'slide',
    position: 'top-center',
    icon: 'error',
    showMethod: 'fadeIn',
    hideMethod: 'fadeOut',
    hideAfter: 5000
  })
}


/////////////////// Delete Botton Function ////////////////////
function Delete_row(id) {
  var id = id;
  if (confirm("Are you sure you want to delete !!??!!")) {
    $.ajax({
      url: "_Action/_Delete.php",
      method: "POST",
      data: {
        id: id,
      },
      success: function (data) {
        if (data == 1) {
          Deleted();
          window.setTimeout(function () {
            window.location = "A_Edit.php";
          }, 5000);
        } else {
          Error();
        }
        $("#Save-" + id).prop("disabled", true);
        $("#Delete-" + id).prop("disabled", true);
      },
    });
  } else {
    $("#Save-" + id).prop("disabled", true);
    $("#Delete-" + id).prop("disabled", true);
  }
  document.getElementById("demo").innerHTML = txt;
}

/////////////////// Delete Toast ////////////////////
function Deleted() {
  $.toast({
    heading: 'Done !!',
    text: "Request Deleted Successfully",
    textAlign: 'center',
    showHideTransition: 'slide',
    position: 'top-center',
    icon: 'error',
    showMethod: 'fadeIn',
    hideMethod: 'fadeOut',
    hideAfter: 5000

  })
}
