<?php
require_once('header.php');

?>

<body>

<?php

require_once('navigation.php');

?>

<div class="container">

    <div class="blog-header">
        <h1 class="blog-title">Manhattan's Blog</h1>
        <p class="lead blog-description">Blog d'une team de ouf</p>
    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">


                    <div class="container">
                        <h1>Inscription</h1>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <div class="input-group col-sm-12 col-xs-6 col-sm-8 col-lg-12 col-md-8"> <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                        <input type="text" class="form-control input-lg" name="nom" id="nom" placeholder="Nom" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Prénom</label>
                                    <div class="input-group col-sm-12 col-xs-6 col-sm-8 col-lg-12 col-md-8"> <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                        <input type="text" class="form-control input-lg" name="prenom" id="prenom" placeholder="Prenom" required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group col-sm-12 col-xs-6 col-sm-8 col-lg-12 col-md-8"> <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                        <input type="text" class="form-control input-lg" name="email" id="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Pseudo</label>
                                    <div class="input-group col-sm-12 col-xs-6 col-sm-8 col-lg-12 col-md-8"> <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                        <input type="text" class="form-control input-lg" name="pseudo" id="pseudo" placeholder="Pseudo" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Mot de passe</label>
                                    <div class="input-group col-sm-12 col-xs-6 col-sm-8 col-lg-12 col-md-8"> <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                        <input type="text" class="form-control input-lg" name="mdp" id="mdp" placeholder="Password" required data-toggle="popover" title="Password Strength" data-content="Enter Password...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Confirmer votre mot de passe</label>
                                    <div class="input-group col-sm-12 col-xs-6 col-sm-8 col-lg-12 col-md-8"> <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                        <input type="password" class="form-control input-lg" name="confirm" id="confirm" placeholder="Confirm Password" required>
                                    </div>
                                </div>
                                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary pull-right">
                            </div>
                        </div>

            </div>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <?php
                require_once('sidebar.php');
            ?>
        </div><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</div><!-- /.container -->

<footer class="blog-footer">
    <p>
    <ul class="pager">
        <li><a href="#">Previous</a></li>
        <li><a href="#">Next</a></li>
    </ul>

    <a href="#">Back to top</a>
    </p>
</footer>

<?php
require_once('footer.php');

?>
