<?php
require_once("../autoload.php");
use model\User;
$user = new User();
$data = $user->getData();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="" />
    <title>Congé RH</title>
    <link media="all" type="text/css" rel="stylesheet" href="../media/css/font.css" />
    <link media="all" type="text/css" rel="stylesheet" href="../media/css/materialize.min.css" />
    <link media="all" type="text/css" rel="stylesheet" href="../media/css/google_material_icons.css" />
    <link media="all" type="text/css" rel="stylesheet" href="../media/css/style.css" />
</head>
<body>
<div class="container">
    <div class="row center">
        <h1>Welcome to Congé RH !!</h1>
    </div>
</div>
<div class="container">
    <table class="highlight centered">
        <thead>
            <tr>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Date d'entrée</th>
                <th>Congés acquis</th>
                <th>Congés pris</th>
                <th>Modifier</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($data as $array) {
        ?>
                <tr>
                <td><?php echo $array["firstName"]; ?></td>
                <td><?php echo $array["lastName"]; ?></td>
                <td><?php echo $array["address"]; ?></td>
                <td><?php echo $array["dateBegin"]; ?></td>
                <td><?php echo $array["acquis"]; ?></td>
                <td><?php echo $array["pris"]; ?></td>
                <td><a href="conge.php?id=<?php echo $array['id']; ?>">Modifier</a></td>
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>