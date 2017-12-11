<?php
    include "../global/session.php";
    if($login_session != ''){
         header("Location: /Account/MyProfile.php");
    } else {    
        include "../global/header.php";
?>

<html>
<head>
    <title>Login</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>

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
                                    <label for="firstname">First name *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-lg glyphicon glyphicon-user" aria-hidden="true"></span>
                                        <input type="text" class="form-control input-lg" id="firstnameReg" placeholder="First name" name="firstnameReg" required onfocusout="validate(this.id)">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastname">Last name *</label>
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
                                    <label for="username">Username *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-lg glyphicon glyphicon-user" aria-hidden="true"></span>
                                        <input type="text" class="form-control input-lg" id="usernameReg" placeholder="Username" name="usernameReg" required onfocusout="validate(this.id)">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone Number *</label>
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
                                    <span class="input-group-addon input-lg" id="basic-addon2">@example.com</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="password">Password *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-lg glyphicon glyphicon-search" aria-hidden="true"></span>
                                        <input type="password" class="form-control input-lg" id="passwordReg" placeholder="Password" name="passwordReg" required onfocusout="validatePassword(this.id)">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="passwordConfirm">Confirm Password *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon input-lg glyphicon glyphicon-search" aria-hidden="true"></span>
                                        <input type="password" class="form-control input-lg" id="confirmPasswordReg" placeholder="Confirm Password" name="confirmPasswordReg" required onfocusout="checkPassword('passwordReg', this.id)">
                                    </div>
                                </div>
                            </div>
                            <small id="registerHelp" class="form-text text-muted">* All fields are required.</small>
                            <hr>
                            <?php if(isset($_GET["registerError"])) { ?>
                            <div class="alert alert-danger">
                                <strong>Wrong <?php echo $_GET["registerError"] ?></strong>
                            </div>
                            <?php } ?>
                            <button type="submit" class="btn btn-primary btn-lg center-block">Sign up <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php } ?>

<style>
#regContainer{
    margin-top: 10%;
    border-radius: 15px;
    padding-top: 10px;
    padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
}
.headerForm{
    font-size: 30px;
    text-decoration: none; 
}
.col-md-6 > a {
    font-weight: bold;
    color: #2dc997;
}
.col-md-6 > a:hover {
    font-weight: bold;
    text-decoration: none; 
    cursor: pointer;
    color: #2dc997;
}
.active{
    transition: font-size 0.5s;
    font-size: 40px;
    color: #285e4d !important;
}
.glyphicon{
    top: 0px;
}
.error{
    border: 1px solid red;
}
.passed{
    border: 1px solid green;
}
</style>
<script>
$(function() {
    $('#login-link').click(function(e) {
		$('#register-link').removeClass('active');
		$(this).addClass('active');
        $("#login-form").delay(500).fadeIn(500);
        $("#register-form").fadeOut(500);
		e.preventDefault();
	});
    
	$('#register-link').click(function(e) {
        $('#login-link').removeClass('active');
		$(this).addClass('active');
        $("#register-form").delay(500).fadeIn(500);
 		$("#login-form").fadeOut(500);
		e.preventDefault();
	});

});
    
function validateCNP(elem){
    var value=document.getElementById(elem).value;
    if(value.length==13){
        $("#"+elem).removeClass('error');
        $("#"+elem).addClass('passed');
    } else {
        $("#"+elem).removeClass('passed');
        $("#"+elem).addClass('error');
    }
}
    
function validate(elem){
    var value=document.getElementById(elem).value;
    if(value.length>1){
        $("#"+elem).removeClass('error');
        $("#"+elem).addClass('passed');
    } else {
        $("#"+elem).removeClass('passed');
        $("#"+elem).addClass('error');
    }
}

function validateEmail(elem){
    var value=document.getElementById(elem).value;
    if(value.length>1){
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(re.test(value) == true){
            $("#"+elem).removeClass('error');
            $("#"+elem).addClass('passed');
        }
    } else {
        $("#"+elem).removeClass('passed');
        $("#"+elem).addClass('error');
    }
}
    
function validatePhone(elem){
    var value=document.getElementById(elem).value;
    if(value.length==12){
        var re =/^[\s()+-]*([0-9][\s()+-]*){6,20}$/;
        if(re.test(value) == true){
            $("#"+elem).removeClass('error');
            $("#"+elem).addClass('passed');
        }
    } else {
        $("#"+elem).removeClass('passed');
        $("#"+elem).addClass('error');
    }
}

function validatePassword(elem){
    var value=document.getElementById(elem).value;
    if(value.length>=5){
        $("#"+elem).removeClass('error');
        $("#"+elem).addClass('passed');
    } else {
        $("#"+elem).removeClass('passed');
        $("#"+elem).addClass('error');
    }
}
    
function checkPassword(elem1, elem2){
    var firstField = document.getElementById(elem1);
    var secoondField = document.getElementById(elem2);
    if(secoondField.value != firstField.value){
        $("#"+elem2).addClass('error');
        $("#"+elem2).removeClass('passed');
    } else {
        $("#"+elem2).removeClass('error');
        $("#"+elem2).addClass('passed');
    }
}


$(document).ready(function(){
    $('.cnp').mask('0000000000000');
    $('.phone').mask('0000-000-000');
});

function checkError(elem){
    if(elem!=''){
        document.getElementById('login-form').style.display="none";
        document.getElementById('register-form').style.display="block";
        $('#login-link').removeClass('active');
        $('#register-link').addClass('active');
    }
}
checkError('<?php if(isset($_GET["registerError"])) echo 'ceva' ?>')
</script>    