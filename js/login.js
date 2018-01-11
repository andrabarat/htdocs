$(function() {
    $('#login-link').click(function(e) {
		$('#register-link').removeClass('activeRegister');
		$(this).addClass('activeRegister');
        $("#login-form").delay(500).fadeIn(500);
        $("#register-form").fadeOut(500);
		e.preventDefault();
	});
    
	$('#register-link').click(function(e) {
        $('#login-link').removeClass('activeRegister');
		$(this).addClass('activeRegister');
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
        $('#login-link').removeClass('activeRegister');
        $('#register-link').addClass('activeRegister');
    }
}