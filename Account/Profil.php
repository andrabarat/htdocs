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
    <div class="container size">    
      <div class="row">
        <div class="col-sm-5 well">
          <div class="well">
              <h3><a href="#"><strong>Profilul meu</strong></a></h3>
              <h4><strong>Nume: </strong></h4>
              <h4><strong>Prenume: </strong></h4>
              <h4><strong>Nr. telefon: </strong></h4>
              <h4><strong>Email: </strong></h4>
          </div>
          <div class="well">
              <button type="button" class="btn btn-primary btn-lg btn-block">Schimba parola</button>
          </div>
        </div>
        <div class="col-sm-7">
          <div class="row">
            <div class="col-sm-12">
              <div class="well">
                  <h3><a href="#"><strong>Programarile mele</strong></a></h3>
                <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="well">
                  <h3><a href="#"><strong>Abonamentele mele</strong></a></h3>
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
