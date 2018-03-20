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
    <script src="../media/js/conge.js"></script>
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
<div class="failed" id="error"></div>
<div class="success" id="success"></div>
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
        <tbody id="user">
        </tbody>
    </table>
</div>
<div class="container">
    <form method="POST" class="row">
        <div class="row">
            <div class="col s12">
            Nouveau congé acquis:
                <div class="input-field inline">
                    <input name="acquis" type="number" id="acquis">
                </div>
            </div>
        </div>
        <div class="row center">
            <button class="btn waves-effect waves-light" name="updateAcquis" id="updateAcquis">Update Congé Acquis</button>
        </div>
    </form>
</div>
<div class="container">
    <form method="POST" class="row">
        <div class="row">
            <div class="col s12">
            Nouveau congé pris:
                <div class="input-field inline">
                    <input name="pris" type="number" id="pris">
                </div>
            </div>
        </div>
        <div class="row center">
            <button class="btn waves-effect waves-light" name="updatePris" id="updatePris">Update Congé Pris</button>
        </div>
    </form>
</div>
</body>
</html>