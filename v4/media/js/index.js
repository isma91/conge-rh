document.addEventListener("DOMContentLoaded", function (event) {
    var xhr = new XMLHttpRequest();
    var error = document.getElementById("error");
    var users = document.getElementById("users");
    var tableUser = "";
    var user = "";
    
    xhr.open('POST', '../public_api/index.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('action=getData');
    xhr.onload = function () {
        if (xhr.status === 200) {
            var data = JSON.parse(xhr.response);
            if (data.error == "") {
                tableUser = "";
                user = "";
                for (var key = 0; key < data.data.length; key++) {
                    user = data.data[key];
                    if (user.active == 1) {
                        tableUser = tableUser + "<tr><td>" + user.firstName + "</td>";
                        tableUser = tableUser + "<td>" + user.lastName + "</td>";
                        tableUser = tableUser + "<td>" + user.address + "</td>";
                        tableUser = tableUser + "<td>" + user.address + "</td>";
                        tableUser = tableUser + "<td>" + user.acquis + "</td>";
                        tableUser = tableUser + "<td>" + user.pris + "</td>";
                        if (user.newcomer == 0) {
                            tableUser = tableUser + "<td><a href='conge.php?id=" + user.id + "' >Modifier</td>";
                        } else {
                            tableUser = tableUser + "<td></td>";
                        }
                        tableUser = tableUser + "<td><button class='btn waves-effect waves-light delete' name='deleteUser' id='delete_" + user.id + "'>Supprimer</button></td></tr>";
                    }
                }
                users.innerHTML = tableUser;
            } else {
                error.innerHTML = data.error;
            }
        } else {
            error.innerHTML = "Une erreur est survenue lors de la demande de recuperation des utilisateurs !!";
        }
    };
});