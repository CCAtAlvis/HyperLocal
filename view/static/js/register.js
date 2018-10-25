var url = "./api/register";
var data = '';

const error = function() {
}

const success = function(data, textStatus, xhr) {
  if (res.status === 'SUCCESS') {
    location.reload();
  } else {
    $(".error").fadeIn();
    $(".error").text(res.message);
  }
}

$('.sign-up').click(() => {
  $.ajax({
  type: 'POST',
  url: url,
  data: $('form').serialize(),
  success: success,
  error: error
});

});
