<?php
require_once('header.php');

?>

<body>

<?php

require_once('navigation.php');
require_once('controler/index_controler.php');
?>

<div class="container">

    <div class="blog-header">
        <h1 class="blog-title">Manhattan's Blog</h1>
        <p class="lead blog-description">Blog d'une team de ouf</p>
    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">

            <div class="row">

                <?php
                foreach($articles as $article){
                    //foreach($article as $cle => $values){
                        echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
                            echo '<div class="well blog">';
                                echo '<a href="single.php?cle='.$article["id_article"].'">';
                                    echo '<div class="date primary">';
                                            echo '<span class="blog-date">'.date("M",strtotime($article["date_Article"])).'</span>';
                                            echo '<span class="blog-number">'.date("d",strtotime($article["date_Article"])).'</span>';
                                        echo '</div>';
                                    echo '<div class="row">';
                                                echo '<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">';
                                                    echo '<div class="image">';
                                                        echo '<img src="img/'.$article["imageArticle"].'" alt="image article">';
                                                    echo '</div>';
                                                echo '</div>';
                                                echo '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">';
                                                    echo '<div class="blog-details">';
                                                        echo '<h2>'.$article["titreArticle"].'</h2>';
                                                        echo '<p>';
                                                            echo substr($article['corpsArticle'],0,100)."...";
                                                        echo '</p>';
                                                    echo '</div>';
                                                echo '</div>';
                                    echo '</div>';
                                echo '</a>';
                            echo '</div>';
                        echo '</div>';
                }
                    ?>

            </div><!-- /.blog-main -->
            </div>
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
