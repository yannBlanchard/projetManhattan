<?php
require_once('header.php');

?>

<body>

<?php

require_once('navigation.php');

?>

<div class="container">


    <div class="row">

        <div class="col-sm-8 blog-main">


            <div class="container">
                <h1 class="">Connexion</h1>
                <hr>
                <div class="row">
                    <div class="col-lg-6">

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

                        <input type="submit" name="submit" id="submit" value="Connexion" class="btn btn-success pull-right">
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

