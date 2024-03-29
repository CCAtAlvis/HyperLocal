<?php
    if(!isset($_SESSION['login']))
        header("Location: ./sign-in");

    $title = "Questions";

    $styling = LoadStyling(['main', 'questions']);
    include_once "view/header.php";
?>

<div id="body">
    <div class="left-panel panels-2">
        <h1 class="heading">The Community.</h1>
        <h2 class="heading-2">Ask and answer questions that matters to you!</h2>
    </div>

    <div class="right-panel panels-2">
        <div class="feed">
            <div class="feed-head">
                <div class="feed-heading">Questions</div>

                <div class="feed-filter">
                    <input type="radio" name="filter-selector" value="Near" checked> Near &nbsp; &nbsp; &nbsp;
                    <input type="radio" name="filter-selector" value="Top"> Top &nbsp; &nbsp; &nbsp;
                    <input type="radio" name="filter-selector" value="Trending"> New
                </div>
            </div>

            <div class="feed-body" id="feed-body-div">
            </div>

        </div>
    </div>

</div>

<div class="load-question hidden">
    <div class="load-question-body card">
        <div class="question">Sample Question</div>
        <div id="question-poster"> </div>
        <div id="question-options">
            <form id="rate-question" onsubmit="rate_question(event)">
                <input type="hidden" name="create_id" value=""> 
                <input type="number" name="rating" min="1" max="5" value="1" >
                <input type="submit" value="rate">
            </form>            
        </div>

        <div class="comments" id="comments-div">
            <div class="comment-element">some comment</div>
            <div class="comment-element">some comment</div>
            <div class="comment-element">some comment</div>
            <div class="comment-element">some comment</div>
            <div class="comment-element">some comment</div>
        </div>
        <div>
            <form class="add-comment" id="insert-comment-form" onsubmit="create_comment(event)">
                <input type="hidden" name="question_id" value="">
                <input type="text" id="question-comment" name="comment" maxlength="100" class="comment-input">
                <input type="submit" value="Comment">
            </form>
        </div>
    </div>
</div>

<div class="create-question">+</div>
<div class="question-form hidden">
    <div class="card">
        <form id="create-question-form" onsubmit="create_question(event)">
            <input type="hidden" id="question-form-lat" name="latitude" value="">
            <input type="hidden" id="question-form-long" name="longitude" value="">
            <textarea name="question" placeholder="Ask your question"></textarea>
            <input type="submit" value="Ask Question">
        </form>
    </div>
</div>

<?php

    $scripts = LoadScripts(['questions']);
    include_once 'view/footer.php';
?>
