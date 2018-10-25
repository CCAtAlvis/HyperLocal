<?php
    $title = 'Hi there';

    $styling = LoadStyling(['home', 'body', 'header', 'cards']);
    include_once 'view/header.php';
?>

<div id="body">
    <div class="left-panel panels">
        <h1 id="heading">Build your own <br>community.</h1>
        <p id="para">Connect with people around you. Easily.</p>
        <div id="link"><a href="./about">Know more</a></div>
    </div>

    <div class="right-panel panels">
        <div class="card">
            <p class="question">Where can i eat awesome pizzzza?</p>
            <div class="bottom-bar">
                <div class="location">Nerul &bull; 2km </div>
                <!-- <div class="ans-button"><a>Answer <span calss="arrow">-></span></a></div> -->
            </div>
        </div>
    </div>
</div>

<?php

    $scripts = LoadScripts([]);
    include_once 'view/footer.php';
?>
