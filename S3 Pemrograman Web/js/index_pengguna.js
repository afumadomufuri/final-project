function display_toggle(id) {
    if (id == "masuk") {
        document.getElementById("daftar").style.display = "none";
        document.getElementById("masuk").style.display = "none";
        document.getElementById("akun").style.display = "inline-block";
        document.getElementById("keluar").style.display = "none";    
    } else if(id == "keluar") {
        document.getElementById("daftar").style.display = "inline-block";
        document.getElementById("masuk").style.display = "inline-block";
        document.getElementById("akun").style.display = "none";
        document.getElementById("keluar").style.display = "none";
    }
}