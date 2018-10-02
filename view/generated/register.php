<?php
    $title = 'Register';

    $styling = LoadStyling(['main', 'register', 'cards']);
    include_once 'view/header.php';
?>

<div id="body">
    <div class="right-panel panels">
        <div class="card">
            <p class="question">Where can i eat awesome pizzzza?</p>
            <div class="bottom-bar">
                <div class="location">Nerul &bull; 2km </div>
                <div class="ans-button"><a>Answer <span calss="arrow">-></span></a></div>
            </div>
        </div>
    </div>
</div>

<?php

    $scripts = LoadScripts([]);
    include_once 'view/footer.php';
?>
