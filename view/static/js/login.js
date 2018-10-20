var url = "./api/login";
var data = '';

const error = function(data, textStatus, xhr) {
}

const success = function(data, textStatus, xhr) {
    console.log(data);
    var json = JSON.parse(data);
}

$('.sign-in').click(() => {
  // console.log($('form').serialize());
  // console.log("adasdads");
  $.ajax({
  type: 'POST',
  url: url,
  data: $('form').serialize(),
  success: success,
  error: error
});

});
