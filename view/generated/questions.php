<?php
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
                    <input type="radio" name="filter-selector" checked> Near
                    <input type="radio" name="filter-selector"> Tranding
                    <input type="radio" name="filter-selector"> Top
                </div>
            </div>

            <div class="feed-body">
                <div class="feed-element" data-question-id="1">
                    this is a simple questionkb bngdfgdfjggndgjkngdgjndfgldjkflndfkgnlgnsdlkgnsdkl
                </div>
                <div class="feed-element">
                    this is a simple question
                </div>
                <div class="feed-element">
                    this is a simple question
                </div>
                <div class="feed-element">
                    this is a simple question
                </div>
                <div class="feed-element">
                    this is a simple question
                </div>
            </div>

        </div>
    </div>

</div>

<div class="load-question hidden">
    <div class="load-question-body card">
        <div class="question">asdasd</div>
        <div class="comments">
            <div class="comment-element">some comment</div>
            <div class="comment-element">some comment</div>
            <div class="comment-element">some comment</div>
            <div class="comment-element">some comment</div>
            <div class="comment-element">some comment</div>
            <div class="comment-element">some comment</div>
            <div class="comment-element">some comment</div>
            <div class="comment-element">some comment</div>
            <div class="comment-element">some comment</div>
            <div class="comment-element">some comment</div>
            <div class="comment-element">some comment</div>
            <div class="comment-element">some comment</div>
            <div class="comment-element">some comment</div>
        </div>
        <div class="add-comment">
            <form>
                <input type="text" maxlength="100">
                <input type="submit">
            </form>
        </div>
    </div>
</div>

<div class="create-question">+</div>
<div class="question-form hidden">
    <div class="card">
    <form>
        <input type="text" name="question">
        <input type="submit">
    </form>
</div>
</div>

<?php

    $scripts = LoadScripts(['questions']);
    include_once 'view/footer.php';
?>
