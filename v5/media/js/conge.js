document.addEventListener("DOMContentLoaded", function (event) {
    var xhr = new XMLHttpRequest();
    var user = document.getElementById("user");
    var error = document.getElementById("error");
    var success = document.getElementById("success");
    var url = window.location.search;

    if (url.substr(0, 4) != "?id=") {
        window.location.href = 'index.php';
    }
    var id = window.location.search.split("?id=")[1];

    function getData(idUser) {
        xhr.open('POST', '../public_api/index.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('action=getAllById&id=' + idUser);
        xhr.onload = function () {
            if (xhr.status === 200) {
                var data = JSON.parse(xhr.response);
                var tableUser = "";
                tableUser = tableUser + "<tr><td>" + data.data[0].firstName + "</td>";
                tableUser = tableUser + "<td>" + data.data[0].lastName + "</td>";
                tableUser = tableUser + "<td>" + data.data[0].address + "</td>";
                tableUser = tableUser + "<td>" + data.data[0].address + "</td>";
                tableUser = tableUser + "<td>" + data.data[0].acquis + "</td>";
                tableUser = tableUser + "<td>" + data.data[0].pris + "</td></tr>";
                user.innerHTML = tableUser;
            } else {
                error.innerHTML = "Une erreur est survenue lors de la demande de recuperation de l'utilisateur !!";
            }
        };
    }

    getData(id);


    document.getElementById("updateAcquis").addEventListener('click', function (event) {
        event.preventDefault();
        var acquis = document.getElementById("acquis").value.trim();
        xhr.open('POST', '../public_api/index.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('action=updateAcquis&acquis=' + acquis + '&id=' + id);
        xhr.onload = function () {
            if (xhr.status === 200) {
                var data = JSON.parse(xhr.response);
                if (data.error == "") {
                    success.innerHTML = "Congé acquis modifier avec success !!";
                }
                getData(id);
            } else {
                error.innerHTML = "Une erreur est survenue lors du changement du00 conge acquis !!";
            }
        }
    })

    document.getElementById("updatePris").addEventListener('click', function (event) {
        event.preventDefault();
        var pris = document.getElementById("pris").value.trim();
        xhr.open('POST', '../public_api/index.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('action=updatePris&pris=' + pris + '&id=' + id);
        xhr.onload = function () {
            if (xhr.status === 200) {
                var data = JSON.parse(xhr.response);
                if (data.error == "") {
                    success.innerHTML = "Congé pris modifier avec success !!";
                }
                getData(id);
            } else {
                error.innerHTML = "Une erreur est survenue lors du changement du conge pris !!";
            }
        }
    })
});