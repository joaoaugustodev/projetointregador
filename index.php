<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>GStore</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!-- Compiled and minified CSS -->		 
	  <link rel="stylesheet" href="css/materialize.css">
	  <link rel="stylesheet" href="css/materialize.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.0/css/materialize.min.css">
      
      <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.0/js/materialize.min.js"></script>
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="css/estilo.css">
    
</head>
<body>

    <section>
        <article>
            <div id="login">
                <img id="img1" src="img/23.png" alt="">
                <div class="row">
                    <div class="col s12 m6 offset-m3">
                    <div id="cardLog" class="card">
                        <div id="title" class="card-action">
                            <div class="center">
                                <img src="img/logo.png" alt="" style="width: 150px;">
                            </div>
                        </div>
                        <div class="card-content white-text">
                            <div class="row">
                                <form class="col s12" method="post">
                                    <?php
                                        if(isset($msg)){
                                            echo "<b class='red-text text-lighten-3' style='margin-left: 25%;'>$msg<b><br>";
                                        }
        
                                    ?>
                                        <div class="row">   
                                            <div class="row">
                                            <div class="input-field col s10 offset-s1">
                                                <input id="login_input" name="login" type="text" class="validate white-text text-darken-1">
                                                <label for="login_input" class="white-text">login</label>
                                            </div>
                                            <div class="input-field col s10 offset-s1">
                                                <input id="pass" name="senha" type="password" class="validate white-text">
                                                <label for="pass" class="white-text">senha</label>
                                            </div>
                                            </div>
                                            <br><br>
                                            <div class="center">
                                                <button class="btn waves-effect waves-light hoverable z-depth-1" type="submit" name="action">entrar</button>
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
  <script src="js/materialize.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
  
  <script src="init.js"></script>
</body>
</html>