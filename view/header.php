<?php 
    $title .= " | HyperLocal";
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $title;?></title>

    <!-- meta tags follows -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- link all the required css files below -->
    <!-- load main stylesheet -->
    <!-- <link rel="stylesheet" media="screen" href="view/static/css/main.css" /> -->

    <!-- load all other dynamically loaded styles -->
    <?= $styling;?>

    <!-- <link rel="stylesheet" media="screen" href="static/css/bootstrap.min.css" /> -->
    <!-- <link rel="stylesheet" media="screen" href="static/css/bootstrap.grid.min.css" /> -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous"> -->

    <!-- lets load some fonts! -->
    <!-- serif fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT|Vidaloka" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Alegreya|EB+Garamond|Old+Standard+TT|Playfair+Display|Vidaloka|Domine|Arapye|Cantata+One|Arbutus+Slab" rel="stylesheet">

    <!-- few sans serifs -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300|Open+Sans|Raleway|Roboto" rel="stylesheet">

    <!-- some handwriting fonts -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Charmonman|Parisienne|Sacramento" rel="stylesheet">

    <!-- and fianlly some display fonts -->
    <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative|Fredericka+the+Great|Poiret+One|Unica+One|Abril+Fatface" rel="stylesheet">

</head>
<body>

<!-- actual body of the page follows -->

<header id="header">
    <div id="logo"></div>

    <nav id="navbar">
        <div class="nav-item">
            <a data-hover="home" href="./home">home</a>
        </div>

<?php
    if($login !== "LOGIN" || !$user_id) {
?>
        <div class="nav-item">
            <a data-hover="about" href="./about">about</a>
        </div>

        <div class="nav-item">
            <a data-hover="sign up" href="./sign-up">sign up</a>
        </div>

        <div class="nav-item ans-button">
            <a data-hover="sign in" href="./sign-in">sign in</a>
        </div>
<?php
    } else {
?>
        <div class="nav-item">
            <a data-hover="questions" href="./questions">questions</a>
        </div>

        <div class="nav-item">
            <a data-hover="profile" href="./profile">profile</a>
        </div>

        <div class="nav-item ans-button">
            <a data-hover="sign out" href="./sign-out">sign out</a>
        </div>
<?php
    }
?>
    </nav>
</header>
