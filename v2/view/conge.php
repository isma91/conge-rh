<?php
require_once("../autoload.php");
use model\Bdd;
$bdd = new Bdd();
$data = $bdd->getAllById($_GET["id"]);
if (empty($data)) {
    header('Location: index.php');
}
if (isset($_POST["updateAcquis"])) {
    $update = $bdd->updateCongeAcquis($_POST['id'], $_POST['acquis']);
    $data = $bdd->getAllById($_POST["id"]);
    if ($update) {
        $message = '<div class="success"><p>Congé modifier avec succès !!</p></div>';
    } else {
        $message = '<div class="failed"><p>Un problème est survenue !!</p></div>';
    }
}

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
    <div class="row center">
            <a class="btn waves-effect waves-light" href="index.php">Home</a>
        </div>
</div>
<?php if (isset($message)) { echo $message; } ?>
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
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>
<div class="container">
    <form action="#" method="POST" class="row">
        <div class="row">
            <div class="col s12">
            Nouveau congé acquis:
                <div class="input-field inline">
                    <input name="acquis" type="number">
                </div>
                <input type="hidden" name="id" value="<?php echo $data[0]['id']; ?>" />
            </div>
        </div>
        <div class="row center">
            <button class="btn waves-effect waves-light" name="updateAcquis" type="submit">Update Congé Acquis</button>
        </div>
    </form>
</div>

</body>
</html>