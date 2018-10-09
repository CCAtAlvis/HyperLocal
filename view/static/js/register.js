var url = "./api/register";
var data = '';

const error = function() {
}

const success = function(data, textStatus, xhr) {
    console.log(data);
    var json = JSON.parse(data);
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
