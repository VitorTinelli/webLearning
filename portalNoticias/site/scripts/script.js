function toggleMenu() {
    var menu = document.getElementById("menu");
    if (menu.style.display == "block") {
        menu.style.display = "none";
    } else {
        menu.style.display = "block";
    }
}

function redLogin(){
    window.location.href = "login.php";
}

function redGit(){
    window.location.href = "https://www.github.com/VitorTinelli";
}

function redInsta(){
    window.location.href = "https://www.instagram.com/VitorTinelli";
}

