<?php include_once('./db/login.php') ?>
<!DOCTYPE html>
<html lang="pt-Br">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>GStore</title>

      <!-- Compiled and minified CSS -->		 
	  <link rel="stylesheet" href="./public/css/materialize.min.css">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="./public/css/estilo.css">
      <link rel="icon" href="./public/images/logo.png">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>

    <section>
        <article>
            <div id="login">
                <img id="img1" src="./public/images/23.png" alt="">
                <div class="row">
                    <div class="col s12 m6 offset-m3">
                    <div id="cardLog" class="card">
                        <div id="title" class="card-action">
                            <div class="center">
                                <img src="./public/images/logo.png" alt="" style="width: 150px;">
                            </div>
                        </div>
                        <div class="card-content white-text">
                            <div class="row">
                                <form class="col s12" method="post" action="/projetointregador/">
                                    <?php
                                        if(isset($msg)){
                                            echo "<b class='texto-de-erro red-text text-lighten-3'>$msg<b><br>";
                                        }
        
                                    ?>
                                        <div class="row">   
                                            <div class="row">
                                            <div class="input-field col s10 offset-s1">
                                                <input id="login_input" name="user" type="text" class="validate white-text text-darken-1">
                                                <label for="login_input" class="white-text">login</label>
                                            </div>
                                            <div class="input-field col s10 offset-s1">
                                                <input id="pass" name="password" type="password" class="validate white-text">
                                                <label for="pass" class="white-text">senha</label>
                                            </div>
                                            </div>
                                            
                                            <div class="center">
                                                <button class="btnLogin waves-effect waves-light hoverable z-depth-1" type="submit" name="action">entrar</button>
                                            </div>  
                                        </div>                                  
                                    </form>
                            </div>                
                        </div>                      
                    </div>
                    </div>
                </div>                
            </div>
        </article>
    </section>
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="./public/javascript/jquery-3.2.1.min.js"></script>
  <script src="./public/javascript/materialize.min.js"></script>
  <script src="./public/javascript/init.js"></script>
</body>
</html>