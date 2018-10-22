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
