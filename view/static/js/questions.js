function success (data) {

}

$('.feed-element').click(function(e) {
  console.log($(this).attr('data-question-id'));
  // this.attr('data-question-id')
  // ajax here

  $(".load-question").fadeIn();
  $(".load-question-body .question").text($(this).text())
});

$('body').keypress(e=> {
  console.log(e.originalEvent.charCode);
  if(e.originalEvent.charCode === 0) {
    $('.hidden').fadeOut();
  }
});


// TODO:
// fetch questions and display them in feed body
// get lat, long from this JS function
// https://www.w3schools.com/html/html5_geolocation.asp

// TODO:
// $('.feed-element').click() open ups the feed question,
// fetch comments for that question and display them

// console.log($(this).attr('data-question-id'));
// in this line: "data-question-id" is a special html attribute
// ie any attribute starting with "data-" is considered a valid attribute,
// store the question-id, comment-id in these attributes...
// so you can pass those as in API requests


// TODOs for API routing:
// add routing for fetching questions according to catogries
