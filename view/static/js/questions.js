let nearbyHtml = "";
let trendingHtml = "";
let topHtml = "";

function questions_success (data) {
  console.log("Success : " + data);
  data = JSON.parse(data);

  if (data.status != 'SUCCESS') return;

  for(i = 0; i < data.message.length; i++) {
    nearbyHtml += `<div class="feed-element" data-question-id="${i}">` + data.message[i].question + `</div>`;
  }

  $('feed-body-div').innerHtml = nearbyHtml;
}


function questions_error (data) {

}

function comments_success(data) {

}

function comments_error(data) {

}

$('input[name=filter-selector]').click(function(e) {
  var category = document.querySelector('input[name="filter-selector"]:checked').value;
  console.log('category ' + category);
  switch (category) {
    case 'Near':
      if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var lat = position.coords.latitude;
          var long = position.coords.longitude;
          $.ajax({
            type: 'POST',
            url: './api/fetch/question/nearby',
            data: `latitude=${lat}&longitude=${long}`,
            success: questions_success,
            error: questions_error
          });
        });
      }
      break;  
    case 'Trending':
      $.ajax({
        type: 'POST',
        url: './api/fetch/question/trending',
        success: questions_success,
        error: questions_error
      });
      break;
    case 'Top':
      $.ajax({
        type: 'POST',
        url: './api/fetch/question/top',
        success: questions_success,
        error: questions_error
      });
      break;
    default:
      break;
  }
});

$('.feed-element').click(function(e) {
  console.log($(this).attr('data-question-id'));
  // this.attr('data-question-id')
  // ajax here

  $.ajax({
    type: 'POST',
    url: './api/fetch/comments',
    data: `question_id=$(this).attr('data-question-id')`,
    success: comments_success,
    error: comments_error
  });

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
