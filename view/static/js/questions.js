let nearbyHtml = "";
let trendingHtml = "";
let topHtml = "";
let feedBody = document.getElementById('feed-body-div');
let commentsBody = document.getElementById('comments-div');

function questions_success (data) {
  console.log("Success : " + data);
  data = JSON.parse(data);

  if (data.status != 'SUCCESS') return;

  for(i = 0; i < data.message.length; i++)
    nearbyHtml += `<div class="feed-element" data-question-id="${i}">` + data.message[i].question + `</div>`;

  feedBody.innerHTML = nearbyHtml;

  $('.feed-element').click(function(e) {
    console.log($(this).attr('data-question-id'));
  
    $.ajax({
      type: 'POST',
      url: './api/fetch/comment',
      data: "question_id=" + $(this).attr('data-question-id'),
      success: comments_success,
      error: comments_error
    });
  
    $(".load-question").fadeIn();
    $(".load-question-body .question").text($(this).text())
  
  });
    
}


function questions_error (data) {

}

function comments_success(data) {
  console.log("SuccessComments: " + data);
  data = JSON.parse(data);

  if(data.status != 'SUCCESS') return;

  commentHtml = "";

  commentsBody.innerHTML = commentHtml;

  for(i = 0; i < data.message.length; i++)
    commentHtml += '<div class="comment-element">' + data.message[i].comment + '</div>';

  commentsBody.innerHTML = commentHtml;
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

$('body').keypress(e=> {
  console.log(e.originalEvent.charCode);
  if(e.originalEvent.charCode === 0) {
    $('.hidden').fadeOut();
  }
});