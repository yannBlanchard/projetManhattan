<?php
/**
 * Created by PhpStorm.
 * User: thaonzo
 * Date: 14/04/2015
 * Time: 09:35
 */

?>

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

            <div class="row">
                <div class="col-lg-5">
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object dp img-circle" src="img/defaut_user.jpg" style="width: 100px;height:100px;">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Yann Blanchard <small> Paris</small></h4>
                            <h5>Zinzin de l'espace <a href="">Facebook</a></h5>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object dp img-circle" src="img/defaut_user.jpg" style="width: 100px;height:100px;">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Audrey Stephan<small> Paris</small></h4>
                            <h5> Tueuse de libellules <a href="">Facebook</a></h5>


                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object dp img-circle" src="img/defaut_user.jpg" style="width: 100px;height:100px;">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Thomas Aonzo <small> Paris</small></h4>
                            <h5>Capitaine Abnadonné <a href="">Facebook</a></h5>

                        </div>
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
require_once('footer.php');
require_once('script.php');
?>
