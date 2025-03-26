function DisplayNone(name) {
    document.getElementById("login").style.display = "none";
    document.getElementById("register").style.display = "none";
    document.getElementById(name).style.display = "block";
}

function hiddin(){
    const $password = document.getElementById("password");
    if($password.type === "password"){
        $password.type = "text";
    } else {
        $password.type = "password";
    }
}