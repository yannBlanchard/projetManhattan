<?php
require_once('header.php');

?>

<body>

<?php

require_once('navigation.php');
require_once('controler/single_controler.php');
?>

<div class="container">

    <div class="blog-header">
        <h1 class="blog-title">Manhattan's Blog</h1>
        <p class="lead blog-description">Blog d'une team de ouf</p>
    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">


            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php

                    echo '<div class="well blog">
                        <a href="#">
                            <div class="date primary">
                                <span class="blog-date">'.date("M",strtotime($article[0]["date_Article"])).'</span>
                                <span class="blog-number">'.date("d",strtotime($article[0]["date_Article"])).'</span>
                            </div>

                        </a>
                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                <div class="image">
                                    <img src="img/'.$article[0]["imageArticle"].'"  width="100%" alt="">
                                </div>
                                <h1>'.$article[0]["titreArticle"].'</h1>
                                <h5>By '.$article[0]["Mem_pseudo"].'</h5>
                                <p>'.$article[0]["corpsArticle"].'</p>
                            </div>

                        </div>
                    </div>';
                    ?>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <?php
                        require_once('comments.php');
                        ?>
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
