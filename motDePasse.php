<?php
/**
 * Created by PhpStorm.
 * User: austepha
 * Date: 18/05/2015
 * Time: 09:08
 *
 * Cette vue permet à l'utilisateur de redéfinir son mot de passe.
 *
 */

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

            <form action = 'controler/inscription_controler.php' method = "POST">
                <div class="container">
<section id="login">
    <div class="container">

    	<div class="row">
    	    <div class="col-xs-12">
        	    <div class="form-wrap">
                    <h1>Redéfinir le mot de passe</h1>
                    <form role="form" action="javascript:;" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="pseudo" class="sr-only">Pseudo</label>
                            <input type="pseudo" name="pseudo" id="pseudo" class="form-control" placeholder="Votre pseudo de connexion">
                        </div>
                        <div class="form-group">
                            <label for="mdp" class="sr-only">Mot de passe</label>
                            <input type="mdp" name="mdp" id="mdp" class="form-control" placeholder="Votre nouveau mot de passe">
                        </div>
                        <input type="submit" id="modifier" class="btn btn-custom btn-lg btn-block" value="modifier">
                    </form>
                    <hr>
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

            </form>
        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <?php
            require_once('sidebar.php');
            ?>
        </div><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</div><!-- /.container -->
<?php
require_once('script.php');
?>