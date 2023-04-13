function showMenu() {
    pobre = 0 
    if (document.getElementById("menu").style.display == "none"){
        document.getElementById("menu").style.display = "block";
        pobre = 1
        console.log(pobre)
    } else{
        document.getElementById("menu").style.display = "block";
        pobre = 0
    }
}
