<?php
require_once("../autoload.php");
use controller\UserController;
if (isset($_POST["createUser"])) {
    $user = new UserController();
    $add = $user->add($_POST['firstname'], $_POST["lastname"], $_POST["address"]);
    if ($add["error"] !== "") {
        $message = '<div class="failed"><p>' . $add["error"] . '</p></div>';
    } else {
        $message = '<div class="success"><p>Utilisateur ajouté avec succès !!</p></div>';
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
    <script src="../media/js/register.js"></script>
</head>
<body>
<div class="container">
    <div class="row center">
        <h1>Welcome to Congé RH !!</h1>
    </div>
</div>
<div class="container">
    <nav>
        <div class="nav-wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="active"><a href="register.php">Add User</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="failed" id="error"></div>
<div class="success" id="success"></div>
<?php if (isset($message)) { echo $message; } ?>
<div class="container">
    <form action="#" method="POST" class="row">
        <div class="row">
            <div class="col s12">
            Firstname:
                <div class="input-field inline">
                    <input name="firstname" type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
            Lastname:
                <div class="input-field inline">
                    <input name="lastname" type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
            Address:
                <div class="input-field inline">
                    <input name="address" type="text">
                </div>
            </div>
        </div>
        <div class="row center">
            <button class="btn waves-effect waves-light" name="createUser" type="submit">Create User</button>
        </div>
    </form>
</div>
</body>
</html>