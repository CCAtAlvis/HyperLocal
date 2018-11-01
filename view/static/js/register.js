var url = "./api/register";
var data = '';

const error = function() {
}

const success = function(data, textStatus, xhr) {
  console.log(data);
  var res = JSON.parse(data);
  if (res.status === 'SUCCESS') {
    window.location = './sign-in';
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
