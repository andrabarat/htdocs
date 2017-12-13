<?php
    include "../global/session.php";
    if($login_session == ''){
         header("Location: /Account/Login.php");
    } else {    
        include "../global/header.php";
?>

<html>
<head>
    <title>My Profile</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
</head>
<body>
    <div class="container" style="margin-top: 10%">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <br>
                        <h3 class="text-center">Hello <?php echo $login_session?></h3>
                    </div>
                    <div class="panel-body">
                        <form action="BackEnd/logout.php" action="post">
                            <button type="submit" class="btn btn-primary btn-lg center-block">Log out <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></button>
                        </form>
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