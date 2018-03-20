document.addEventListener("DOMContentLoaded", function (event) {
    var xhr = new XMLHttpRequest();
    var error = document.getElementById("error");
    var success = document.getElementById("success");
    var firstname = lastname = address = "";

    document.getElementById("createUser").addEventListener('click', function (event) {
        event.preventDefault();
        firstname = document.getElementById("firstname").value.trim();
        lastname = document.getElementById("lastname").value.trim();
        address = document.getElementById("address").value.trim();
        xhr.open('POST', '../public_api/index.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('action=createUser&firstname=' + firstname + '&lastname=' + lastname + '&address=' + address);
        xhr.onload = function () {
            if (xhr.status === 200) {
                var data = JSON.parse(xhr.response);
                if (data.error == "") {
                    success.innerHTML = "Utilisateur avec success !!";
                }
            } else {
                error.innerHTML = "Une erreur est survenue lors de l'ajout de l'utilisateur !!";
            }
        }
    })
});