document.addEventListener("DOMContentLoaded", function (event) {
    var xhr = new XMLHttpRequest();
    var error = document.getElementById("error");
    var success = document.getElementById("success");
    
    xhr.open('POST', '../public_api/index.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('action=');
    xhr.onload = function () {
        if (xhr.status === 200) {
            var data = JSON.parse(xhr.response);
        } else {
            error.innerHTML = "Une erreur est survenue lors de la demande de recuperation de l'utilisateur !!";
        }
    };
});