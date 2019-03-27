function cari_toggle() {
    document.getElementById("fakultas").style.display = "inline-block";
    document.getElementById("cari_buku").style.display = "none";
    document.getElementById("hasil_cari").style.display = "none";
}
function fakultas_toggle(x) {
    // alert(x);
    document.getElementById("fakultas").style.display = "none";
    document.getElementById("cari_buku").style.display = "inline-block";
    document.getElementById("hasil_cari").style.display = "inline-block";
}