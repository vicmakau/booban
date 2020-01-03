<!-- Boobannet 
By Victor KM
github.com/victorKM 
see readme.md
-->


<?php

  session_start();


?>

<!DOCTYPE html>
<html>
<head>


    <title>Booban | Tech spot</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">



    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

   



    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="assets/css/footer.css">



    <link href='https://fonts.googleapis.com/css?family=PT Sans' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Courgette' rel='stylesheet'>


    
</head>


<body>
  
  <nav class="navbar navbar-default navigation-clean-button">


      <div class="container-fluid">
        
          <div class="navbar-header"><a class="navbar-brand" href="index.php">Booban Team</a>
              <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
          </div>


          <div class="collapse navbar-collapse" id="navcol-1">

              <ul class="nav navbar-nav">


                  
                  <li role="presentation"><a href="#">BLOG</a></li>
                  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">HIRE US <span class="caret"></span></a>


                      <ul class="dropdown-menu" role="menu">
                          <li role="presentation"><a href="#">Grahics design</a></li>
                          <li role="presentation"><a href="#">App Development</a></li>
                          <li role="presentation"><a href="#">Video & Photography</a></li>
                      </ul>


                  </li>


              </ul>

              <p class="navbar-text navbar-right actions">

                <?php 

                if(isset($_SESSION["member_email"])) 

                    echo '<a href = "member.php">'.$_SESSION["member_email"].'</a>'; 

                else 

                  echo "<a href = 'login.php'>Log In</a>"; ?>


                <?php

                if(isset($_SESSION["member_email"])) 

                    echo '<a href = "logout.php"><u><b>logout</b></u></a>';


                else

                 echo '<a class="btn btn-default action-button" role="button" href="signup.php">Sign Up</a></p>';

               ?>


          </div>


      </div>


  </nav>