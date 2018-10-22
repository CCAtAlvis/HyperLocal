var url = "./api/login";
var data = '';

const error = function(data, textStatus, xhr) {
}

const success = function(data, textStatus, xhr) {
    console.log(data);
    var res = JSON.parse(data);
    if (res.status === 'SUCCESS') {
      location.reload();
    } else {

    }
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
