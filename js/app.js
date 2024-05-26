function logout() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "logout.php", true);
    xhttp.send();
}
