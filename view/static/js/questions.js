let questionsHtml = "";
let feedBody = document.getElementById('feed-body-div');
let commentsBody = document.getElementById('comments-div');

function questions_success (data) {
  console.log("Questions: " + data);
  data = JSON.parse(data);
  nearbyHtml = "";

  if (data.status != 'SUCCESS') return;

  for(i = 0; i < data.message.length; i++)
    nearbyHtml += `<div class="feed-element" onclick="feed_click(this)" 
      data-question-id="${data.message[i].question_id}"
      data-question-poster="${data.message[i].username}">
      ${data.message[i].question} 
      </div>`;

  feedBody.innerHTML = nearbyHtml;
}

function questions_error (data) {
  alert('Some error!');
}

function comments_success(data) {
  console.log("Comments: " + data);
  data = JSON.parse(data);

  if(data.status != 'SUCCESS') return;
  commentHtml = "";
  commentsBody.innerHTML = commentHtml;

  for(i = 0; i < data.message.length; i++)
    commentHtml += '<div class="comment-element">' + data.message[i].comment + '</div>';

  commentsBody.innerHTML = commentHtml;
}

function comments_error(data) {
  alert('some error');
}

$('input[name=filter-selector]').click(function(e) {
  var category = document.querySelector('input[name="filter-selector"]:checked').value;
  // console.log('category ' + category);
  feedBody.innerHTML = '';
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

$(document).ready(function() {
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var lat = position.coords.latitude;
      var long = position.coords.longitude;
      
      $('#question-form-lat').attr('value', lat);
      $('#question-form-long').attr('value', long);
    });
  } else {
    alert('Please enable location!');
  }

  $('.create-question').click(function() {
    $('.question-form').fadeIn();
  });
});

function feed_click(_this) {
  var question_id = _this.getAttribute('data-question-id');
  var question_poster = _this.getAttribute('data-question-poster');
  // console.log(_this.getAttribute('data-question-id'));
  $.ajax({
    type: 'POST',
    url: './api/fetch/comment',
    data: "question_id=" + question_id,
    success: comments_success,
    error: comments_error
  });

  $(".load-question").fadeIn();
  $("#comments-div").text('');
  $(".load-question-body .question").text(_this.innerHTML);
  $(".load-question-body #question-poster").text(question_poster);
  $(".form-add-comment input[name=question_id]").attr('value', question_id);

}


function create_question (e) {
  e.preventDefault();
  $.ajax({
    type: 'POST',
    url: './api/create/question',
    data: $("#create-question-form").serialize() ,
    success: insert_questions_success,
    error: questions_error
  });
}

function insert_questions_success(data) {
  console.log(data);
  document.getElementById("create-question-form").reset();
  $(".hidden").fadeOut();
  window.location = "./questions"
}

function create_comment (e) {
  e.preventDefault();
  $.ajax({
    type: 'POST',
    url: './api/create/comment',
    data: $("#insert-comment-form").serialize() ,
    success: insert_comment_success,
    error: questions_error
  });
}

function insert_comment_success(data) {
  console.log(data);
  var comment = document.getElementById("question-comment").value;
  document.getElementById("insert-comment-form").reset();

  commentHtml = commentsBody.innerHTML;
  commentHtml += '<div class="comment-element">' + comment + '</div>';
  commentsBody.innerHTML = commentHtml;
}

$('body').keypress(e=> {
  // console.log(e.originalEvent);
  if(e.originalEvent.key === "Escape") {
    $('.hidden').fadeOut();
  }
});
