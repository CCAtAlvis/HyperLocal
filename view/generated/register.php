<?php
    if($login === "LOGIN" && $user_id)
        header("Location: ./questions");

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
                    <div class="error"></div>
                    <div class="input">
                        <input type="text" name="username" placeholder="Username">
                    </div>
                    <div class="input">
                        <input type="email" name="email" placeholder="Email">
                    </div>
                    <div class="input">
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <div class="input">
                        <input type="password" name="confpass" placeholder="Confirm password">
                    </div>
                </form>
            </p>

            <div class="bottom-bar">
                <div class="ans-button">
                    <a class="sign-up">Sign Up</a>
                </div>

                <div class="link-text">
                    Already a user <a class="location underlink-link" href="./sign-in">Sign in</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

    $scripts = LoadScripts(['register']);
    include_once 'view/footer.php';
?>
