<?php
require_once('header.php');

?>

<body>

<?php

require_once('navigation.php');

?>

<div class="container">

    <div class="blog-header">
        <h1 class="blog-title">Espace Membre</h1>
        <p class="lead blog-description">Votre coin perso</p>
    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">

            <div class="row">

                <div class="col-sm-4">


                    <div class="alert alert-success" >
                        <i class="fa fa-eye fa-3x"></i>
                        <h1 class="alert-link">100</h1> vues sur vos articles
                    </div>

                </div>

                <div class="col-sm-4">

                    <div class="alert alert-info" >
                        <i class="fa fa-file-text-o fa-3x"></i>
                        <h1 class="alert-link">5</h1> articles
                    </div>

                </div>

                <div class="col-sm-4">

                    <div class="alert alert-danger" >
                        <i class="fa fa-comments-o fa-3x"></i>
                        <h1 class="alert-link">12</h1> commentaires
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
<?php

require_once('script.php');
?>


