<?php
/**
 * Created by PhpStorm.
 * User: austepha
 * Date: 13/04/2015
 * Time: 11:28
 *
 * Page qui permet à un utilisateur de se connecter.
 */

?>

<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="aonblaste">


    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/manhattan.css" rel="stylesheet">

</head>
<body>


<div class="blog-masthead">
    <div class="container">
<div class="container">
     <h3>Inscription</h3>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Nom</label>
                <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Requested nom" required value="Nom">
                </div>
            </div>
            <div class="form-group">
                <label>Prénom</label>
                <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                    <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Requested prenom" required value="Prénom">
                </div>
            </div>
            <div class="form-group">
                <label>Email</label>
                <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Requested email" required value = "Email.email@gmail.com">
                </div>
            </div>
           <div class="form-group">
                <label>Pseudo</label>
                <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                    <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Requested pseudo" required value="Pseudo">
                </div>
            </div>
           <div class="form-group">
                <label>Mot de passe</label>
                <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                    <input type="text" class="form-control" name="mdp" id="mdp" placeholder="Password" required data-toggle="popover" title="Password Strength" data-content="Enter Password...">
                </div>
            </div>
            <div class="form-group">
                <label>Confirmer votre mot de passe</label>
                <div class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-resize-vertical"></span></span>
                    <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Confirm Password" required>
                </div>
            </div>
            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary pull-right">
        </div>
    </div>
</div>
</body>
</html>