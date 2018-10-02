<?php
    $title = 'Register';

    $styling = LoadStyling(['main', 'cards', 'register']);
    include_once 'view/header.php';
?>

<div id="body">
    <div class="left-panel panels-2">
        <h1 class="heading">Sign up!</h1>
        <h2 class="heading-2">This is where communities are built!</h2>
    </div>
    
    <div class="right-panel panels-2">
        <div class="card">
            <p class="question">
                <form class="form">
                    <div class="input">
                        <input type="name" placeholder="Name *">
                    </div>
                    <div class="input">
                        <input type="email" placeholder="Email *">
                    </div>
                    <div class="input">
                        <input type="password" placeholder="Password *">
                    </div>
                    <div class="input">
                        <input type="password" placeholder="Confirm password *">
                    </div>
                </form>
            </p>

            <div class="bottom-bar">
                <div class="ans-button">
                    <a>Sign Up</a>
                </div>

                <div class="link-text">
                    Already a user <a class="location underlink-link" href="./sign-in">Sign in</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

    $scripts = LoadScripts([]);
    include_once 'view/footer.php';
?>
