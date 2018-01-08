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
                                <a class="active" id="login-link">Login</a>
                            </div>
                            <div class="col-md-6">
                                <a id="register-link">Register</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form id="login-form" action="BackEnd/login_validation.php" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <div class="input-group">
                                    <span class="input-group-addon input-lg glyphicon glyphicon-user" aria-hidden="true"></span>
                                    <input type="text" class="form-control input-lg" placeholder="Username" name="usernameLogin" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon input-lg glyphicon glyphicon-search" aria-hidden="true"></span>
                                    <input type="password" class="form-control input-lg" placeholder="Password" name="passwordLogin" required>
                                </div>
                            </div>
                            <?php if(isset($_GET["loginError"])) { ?>
                            <h5 id="errorLogin" class="form-text text-muted" style="color: red">* Wrong credentials.</h5>
                            <?php } ?>
                            <br>
                            <button type="submit" class="btn btn-primary btn-lg center-block">Submit <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></button>
                        </form>

                        <form id="register-form" style="display:none" action="BackEnd/register_validation.php" method="post">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="firstname">Prenume *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-lg glyphicon glyphicon-user" aria-hidden="true"></span>
                                        <input type="text" class="form-control input-lg" id="firstnameReg" placeholder="First name" name="firstnameReg" required onfocusout="validate(this.id)">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastname">Nume *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-lg glyphicon glyphicon-user" aria-hidden="true"></span>
                                        <input type="text" class="form-control input-lg" id="lastnameReg" placeholder="Last name" name="lastnameReg" required onfocusout="validate(this.id)">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cno">CNP *</label>
                                <div class="input-group">
                                    <span class="input-group-addon input-lg glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <input type="text" class="form-control input-lg cnp" placeholder="1234567891234" id="cnpReg" name="cnpReg" required onfocusout="validateCNP(this.id)" >
                                </div>                            
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="username">Nume user *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-lg glyphicon glyphicon-user" aria-hidden="true"></span>
                                        <input type="text" class="form-control input-lg" id="usernameReg" placeholder="Username" name="usernameReg" required onfocusout="validate(this.id)">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Numar telefon *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-lg glyphicon glyphicon-earphone" aria-hidden="true"></span>
                                        <input type="tel" class="form-control input-lg phone" id="phoneReg" placeholder="Phone" name="phoneReg" required onfocusout="validatePhone(this.id)">
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
                                    <label for="password">Parola *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-lg glyphicon glyphicon-search" aria-hidden="true"></span>
                                        <input type="password" class="form-control input-lg" id="passwordReg" placeholder="Password" name="passwordReg" required onfocusout="validatePassword(this.id)">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="passwordConfirm">Confirmare parola *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-lg glyphicon glyphicon-search" aria-hidden="true"></span>
                                        <input type="password" class="form-control input-lg" id="confirmPasswordReg" placeholder="Confirm Password" name="confirmPasswordReg" required onfocusout="checkPassword('passwordReg', this.id)">
                                    </div>
                                </div>
                            </div>
                            <small id="registerHelp" class="form-text text-muted">* Toate campurile sunt obligatorii.</small>
                            <hr>
                            <?php if(isset($_GET["registerError"])) { ?>
                            <div class="alert alert-danger">
                                <strong>Wrong <?php echo $_GET["registerError"] ?></strong>
                            </div>
                            <?php } ?>
                            <button type="submit" class="btn btn-primary btn-lg center-block">Intrare in cont <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span></button>
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