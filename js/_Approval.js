//////////////////////////// Update button Function /////////////////////////
function _Approve(id) {
  var id = id;

  var requester_name = $("#requester_name-" + id).text();
  var request_date = $("#request_date-" + id).text();
  var time_from = $("#time_from-" + id).text();
  var time_to = $("#time_to-" + id).text();

  $.ajax({
    url: "_Action/_Approve.php",
    method: "POST",
    data: {
      id: id,
      requester_name: requester_name,
      request_date: request_date,
      time_from: time_from,
      time_to: time_to,
    },
    success: function (data) {
      Approved();
      window.setTimeout(function () {
        window.location = "View_approval.php";
      }, 5000);
    },
  });
}

/////////////////// Approved Toast ////////////////////

function Approved() {
  $.toast({
    heading: 'Approved !!',
    text: "Request Approved Successfully",
    textAlign: 'center',
    showHideTransition: 'slide',
    position: 'top-center',
    icon: 'success',
    hideAfter: 5000

  })
}


/////////////////////////// Reject button Function //////////////////////
function _Reject(id) {
  var id = id;
  if (confirm("Are you sure you want to delete !!??!!")) {
    $.ajax({
      url: "_Action/_Reject.php",
      method: "POST",
      data: {
        id: id,
      },
      success: function (data) {
        if (data == 1) {
          Rejected();
          window.setTimeout(function () {
            window.location = "View_approval.php";
          }, 5000);
        } else {
        }
      },
    });
  }
}

/////////////////// Rejected Toast ////////////////////


function Rejected() {
  $.toast({
    heading: 'Rejected !! ',
    text: "Request Rejected Successfully",
    textAlign: 'center',
    showHideTransition: 'slide',
    position: 'top-center',
    icon: 'error',
    showMethod: 'fadeIn',
    hideMethod: 'fadeOut',
    hideAfter: 5000
  })
}
