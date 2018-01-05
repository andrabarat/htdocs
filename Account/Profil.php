<?php
    include "../global/session.php";
    if($login_session == ''){
         header("Location: /Account/Login.php");
    } else {    
        include "../global/header.php";
?>

<html>
<head>
    <title>Profilul meu</title>
    <link href="/css/profil.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
</head>
<body>
    
    
    
<div class="row call-to-action">
    <div class="container size text-center">    
      <div class="row">
        <div class="col-sm-5 well">
          <div class="well">
            <p><a href="#">My Profile</a></p>
          </div>
          <div class="well">
            <p><a href="#">Interests</a></p>
              <button type="button" class="btn btn-primary btn-lg btn-block">Schimba parola</button>
          </div>
          <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <p><strong>Ey!</strong></p>
            People are looking at your profile. Find out who.
          </div>
        </div>
        <div class="col-sm-7">
          <div class="row">
            <div class="col-sm-12">
              <div class="well">
                <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="well">
                <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="well">
                <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="well">
                <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
              </div>
            </div>
          </div>     
        </div>
      </div>
    </div>
    </div>     
</body>
</html>

<?php
    }
?>
