function test(){
    alert("test")
}

function hideLoginForm(){
    if(document.getElementById("login_form").style.display == "none" ){
        document.getElementById("login_form").style.display = "block";
    }else{
        document.getElementById("login_form").style.display = "none";
    }
}