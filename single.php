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
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="well blog">
                        <a href="#">
                            <div class="date primary">
                                <span class="blog-date">Oct</span>
                                <span class="blog-number">8</span>
                            </div>

                        </a>
                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                <div class="image">
                                    <img src="http://lorempixel.com/800/534/sports/1/"  width="100%" alt="">
                                </div>
                                <h1>Yoyo title 1</h1>
                                <h5>By Mktotoy</h5>
                                <p>Lorem</p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <?php
            require_once('comments.php');
            ?>

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
