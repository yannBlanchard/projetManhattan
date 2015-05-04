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
        <hr>
        <p class="lead blog-description">Votre coin perso</p>
    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">

            <div class="row">
                <h1 class="blog-title">DashBoard</h1>
                <hr>
                <div class="col-sm-2">
                    <div class="alert alert-warning" >
                        <i class="fa fa-eye fa-3x"><h1 class="alert-link">100</h1></i>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="alert alert-info" >
                        <i class="fa fa-file-text-o fa-3x"><h1 class="alert-link">5</h1></i>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="alert alert-purple" >
                        <i class="fa fa-comments-o fa-3x"><h1 class="alert-link">12</h1></i>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="alert alert-success" >
                        <i class="fa fa-thumbs-o-up fa-3x"><h1 class="alert-link">150</h1></i>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="alert alert-danger" >
                        <i class="fa fa-thumbs-o-down fa-3x"><h1 class="alert-link">50</h1></i>
                    </div>
                </div>


            </div>

            <div class="row" >
                <h1 class="blog-title">Mes Articles</h1>
                <hr>
                <a class="btn btn-default" href="newarticle.php"><i class="fa fa-plus"> Créer article</i></a>
                <hr>
                <div class="well blog">
                    <a href="#">
                        <div class="date warning">
                            <span class="blog-date">Sept</span>
                            <span class="blog-number">14</span>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                <div class="image">
                                    <img src="http://lorempixel.com/800/534/transport/4/" alt="">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="blog-details">
                                    <h2>Post title 4</h2>
                                    <p>
                                        Quisque ac risus nibh. Ut nisi nisi, hendrerit quis malesuada vel, laoreet quis justo. In tincidunt eget est in rhoncus. Sed non tincidunt ipsum. Curabitur commodo tempus metus ut imperdiet. Mauris nec nulla...
                                    </p>
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="alert alert-warning" ><i class="fa fa-eye">120</i></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="alert alert-purple" ><i class="fa fa-comments-o">40</i></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="alert alert-success" ><i class="fa fa-thumbs-o-up">70</i></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="alert alert-danger" ><i class="fa fa-thumbs-o-down">32</i></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
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


