var oldPassword = document.getElementById("old_password");
var newPassword = document.getElementById("new_password");
var confirmPassword = document.getElementById("confirm_password");

var showOldPassword = document.getElementById("show_old_password");
var showNewPassword = document.getElementById("show_new_password");
var showConfirmPassword = document.getElementById("show_confirm_password");


var eyeOldPassword = document.getElementById("eye_old_password");
var eyeNewPassword = document.getElementById("eye_new_password");
var eyeConfirmPassword = document.getElementById("eye_confirm_password");

function showOldEye(){
    if(oldPassword.value != ""){
        showOldPassword.style.display = "block";
    }
    else{
        showOldPassword.style.display = "none";
    }
}
function showNewEye(){
    if(newPassword.value != ""){
        showNewPassword.style.display = "block";
    }
    else{
        showNewPassword.style.display = "none";
    }
}
function showConfirmEye(){
    if(confirmPassword.value != ""){
        showConfirmPassword.style.display = "block";
    }
    else{
        showConfirmPassword.style.display = "none";
    }
}
function toggleOldPassword(){    
    if (oldPassword.type === "password") {
        oldPassword.type = "text";
        eyeOldPassword.classList.remove("fa-eye-slash")
        eyeOldPassword.classList.add("fa-eye")
        } else {
        oldPassword.type = "password";
        eyeOldPassword.classList.remove("fa-eye")
        eyeOldPassword.classList.add("fa-eye-slash")
    }
}
function toggleNewPassword(){    
    if (newPassword.type === "password" || confirmPassword.type === "password") {
        newPassword.type = "text";
        confirmPassword.type = "text";
        eyeNewPassword.classList.remove("fa-eye-slash")
        eyeNewPassword.classList.add("fa-eye")
        eyeConfirmPassword.classList.remove("fa-eye-slash")
        eyeConfirmPassword.classList.add("fa-eye")
        } else {
        newPassword.type = "password";
        confirmPassword.type = "password";
        eyeNewPassword.classList.remove("fa-eye")
        eyeNewPassword.classList.add("fa-eye-slash")
        eyeConfirmPassword.classList.remove("fa-eye")
        eyeConfirmPassword.classList.add("fa-eye-slash")
    }
}
