<?php
    include "../global/session.php";
    if($login_session != ''){
         header("Location: /Account/MyProfile.php");
    } else {    
        include "../global/header.php";
?>

<html>
<head>
    <title>Autentificare</title>
    <link href="/css/login.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
    <script src="/js/login.js"></script>

</head>
<body>
    <div id="regContainer" class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row text-center headerForm">
                            <div class="col-md-6">
                                <a class="activeRegister" id="login-link">Autentificare</a>
                            </div>
                            <div class="col-md-6">
                                <a id="register-link">Înregistrare</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form id="login-form" action="BackEnd/login_validation.php" method="post">
                            <div class="form-group">
                                <label for="username">Nume utilizator</label>
                                <div class="input-group">
                                    <span class="input-group-addon input-lg glyphicon glyphicon-user" aria-hidden="true"></span>
                                    <input type="text" class="form-control input-lg" placeholder="Nume utilizator" name="usernameLogin" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Parolă</label>
                                <div class="input-group">
                                    <span class="input-group-addon input-lg glyphicon glyphicon-search" aria-hidden="true"></span>
                                    <input type="password" class="form-control input-lg" placeholder="Parolă" name="passwordLogin" required>
                                </div>
                            </div>
                            <h1 class="text-center">
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-warning active btn-lg">
                                        <input type="radio" name="userType" value="users" autocomplete="off" checked> Pacient
                                    </label>
                                    <label class="btn btn-warning  btn-lg">
                                        <input type="radio" name="userType" value="doctors" autocomplete="off"> Doctor
                                    </label>
                                </div>
                            </h1>
                            
                            <?php if(isset($_GET["loginError"])) { ?>
                            <h5 id="errorLogin" class="form-text text-muted" style="color: red">* Numele utilizatorului sau parola sunt greșite.</h5>
                            <?php } ?>
                            <hr>
                            <button type="submit" class="btn btn-primary btn-lg center-block">Conectează-te</button>
                        </form>

                        <form id="register-form" style="display:none" action="BackEnd/register_validation.php" method="post">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="firstname">Prenume *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-lg glyphicon glyphicon-user" aria-hidden="true"></span>
                                        <input type="text" class="form-control input-lg" id="firstnameReg" placeholder="Prenume" name="firstnameReg" required onfocusout="validate(this.id)">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastname">Nume *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-lg glyphicon glyphicon-user" aria-hidden="true"></span>
                                        <input type="text" class="form-control input-lg" id="lastnameReg" placeholder="Nume" name="lastnameReg" required onfocusout="validate(this.id)">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cnp">CNP *</label>
                                <div class="input-group">
                                    <span class="input-group-addon input-lg glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <input type="text" class="form-control input-lg cnp" placeholder="1234567891234" id="cnpReg" name="cnpReg" required onfocusout="validateCNP(this.id)" >
                                </div>                            
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="username">Nume utilizator *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-lg glyphicon glyphicon-user" aria-hidden="true"></span>
                                        <input type="text" class="form-control input-lg" id="usernameReg" placeholder="Nume utilizator" name="usernameReg" required onfocusout="validate(this.id)">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Număr de telefon *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-lg glyphicon glyphicon-earphone" aria-hidden="true"></span>
                                        <input type="tel" class="form-control input-lg phone" id="phoneReg" placeholder="Număr de telefon" name="phoneReg" required onfocusout="validatePhone(this.id)">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cno">Email *</label>
                                <div class="input-group">
                                    <input type="email" class="form-control input-lg" id="emailReg" placeholder="Email" name="emailReg" required onfocusout="validateEmail(this.id)">
                                    <span class="input-group-addon input-lg" id="basic-addon2">@exemplu.com</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="password">Parolă *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-lg glyphicon glyphicon-search" aria-hidden="true"></span>
                                        <input type="password" class="form-control input-lg" id="passwordReg" placeholder="Parolă" name="passwordReg" required onfocusout="validatePassword(this.id)">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="passwordConfirm">Confirmare parolă *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-lg glyphicon glyphicon-search" aria-hidden="true"></span>
                                        <input type="password" class="form-control input-lg" id="confirmPasswordReg" placeholder="Confirmare parolă" name="confirmPasswordReg" required onfocusout="checkPassword('passwordReg', this.id)">
                                    </div>
                                </div>
                            </div>
                            <small id="registerHelp" class="form-text text-muted">* Toate câmpurile sunt obligatorii.</small>
                            <hr>
                            <?php if(isset($_GET["registerError"])) { ?>
                            <div class="alert alert-danger">
                                <strong>Câmpul <?php echo $_GET["registerError"] ?> este greșit.</strong>
                            </div>
                            <?php } ?>
                            <button type="submit" class="btn btn-primary btn-lg center-block">Înregistrare</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php } ?>

<script>
checkError('<?php if(isset($_GET["registerError"])) echo 'ceva' ?>')
</script>    