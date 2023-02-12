<?php
   session_start();
?>


<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Tobi Salau">
    <meta name="description" content="SizeItRight">
    <title>SizeItRight</title>
    <!-- <link rel="icon" href="oplogo.png" type="image/x-icon"> -->
    <link rel="stylesheet" href="size.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@500&display=swap"
        rel="stylesheet">


    <style>
        h1 {
            font-family: 'Pacifico', cursive;
        }

        #sign {
            font-family: 'Bebas Neue', cursive;
        }

        #qui {
            font-family: 'Bebas Neue', cursive;
        }

        #des {
            font-family: 'Bebas Neue', cursive;
        }

        .lisel {
            font-family: 'Bebas Neue', cursive;
        }

        h2 {
            font-family: 'Bebas Neue', cursive;
        }
    </style>

    <script type="module" src="back.js">
    </script>
   <script> 
    
    function showError(ab) {
        x = document.getElementsByTagName("span");
        x.innerText = ab;
        x.textContent = ab;
    }
    </script>

</head>

<body>
   
   <?php 

if (isset($_GET["error"])) {
    $errnm = $_GET["error"];
    echo '<script type="text/javascript">',
    'showError(<?php echo json_encode($errnm, JSON_HEX_TAG); ?>);',
    '</script>'
    ;
}
?>
   
    <header>
        <ul id="ups">

            <li>
                <h1 id="named"><a href="index.php">SizeItRight</a> </h1>
            </li>

        </ul>
    </header>

    <div id="anim-cont">
        <div id="anim-txt"> <a
                href="https://startups.co.uk/news/clothing-height-of-everest-sent-to-landfill-every-7-minutes/"
                target="_blank">20
                billion garments produced for fashion end up in landfill yearly. Every 16 seconds the equivalent of the
                height of the Eiffel Tower is thrown in landfill </a> </div>
    </div>
   
    <div id="page2intro" style="opacity:1">
        <section class="signin">
            <h2>Log in</h2>
            <form method="post" action="script1.php" id="loggy">
                <input type="text" class="input" name="username" placeholder="Username"><br>
                <input type="password" class="input" name="pwrd" placeholder="Password"> <br>
                <input type="submit" value="Submit" class="input">
            </form>
            <span>Hello</span>
        </section>
    </div>



    <!-- <div id="thelist">
        <ul id="select" style="padding: 0; margin: 0;">
            <li class="lisel" onclick="cloth()">
                <h2>Clothes</h2>
            </li>
            <li class="lisel">
                <h2>|</h2>
            </li>
            <li class="lisel">
                <h2>Shoes</h2>
            </li>
        </ul>
    </div> -->
    <footer id="foot">
        <!-- <hr style="position:absolute; bottom:0%; width:100%; background-color:black; height:0.2%; padding:0; margin:0;"> -->
        <p id="copy">SizeItRight 2022 - founded by Tobi Salau All rights reserved</p>
    </footer>

    <script src="back.js">
    </script>
    
</body>

