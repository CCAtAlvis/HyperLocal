<?php
    $title = 'Login';

    $styling = LoadStyling(['main', 'cards', 'login']);
    include_once 'view/header.php';
?>

<div id="body">
    <div class="left-panel panels-2">
        <h1 class="heading">Sign in.</h1>
        <h2 class="heading-2">Doors to magic of community opens here!</h2>
    </div>
    
    <div class="right-panel panels-2">
        <div class="card">
            <p class="question">
                <div class="form">
                    <div class="input">
                        <input type="email" name="param" placeholder="Username or Email">
                    </div>
                    <div class="input">
                        <input type="password" name="password" placeholder="Password">
                    </div>

                    <br><br>

                    <div class="ans-button">
                        <a>Sign in</a>
                    </div>
                </div>
            </p>
            
            <div class="bottom-bar">
                <div> <a class="location underlink-link" href="./forgot-password">Forgot password ?</a> </div>

                <div class="link-text">
                    Not a user! <a class="location underlink-link" href="./sign-up">Sign up!</a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php

    $scripts = LoadScripts([]);
    include_once 'view/footer.php';
?>
