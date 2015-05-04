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
                    foreach($article as $infosArticle){
                        echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
                            echo '<div class="well blog">';
                                echo '<a href="#">';
                                    echo '<div class="date primary">';
                                            echo '<span class="blog-date">'.$infosArticle["date_Aticle"].'</span>';
                                            echo '<span class="blog-number">8</span>';
                                        echo '</div>';
                                    echo '<div class="row">';
                                                echo '<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">';
                                                    echo '<div class="image">';
                                                        echo '<img src="img/'.$infosArticle["imageArticle"].'" alt="image article">';
                                                    echo '</div>';
                                                echo '</div>';
                                                echo '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">';
                                                    echo '<div class="blog-details">';
                                                        echo '<h2>'.$infosArticle["titreArticle"].'</h2>';
                                                        echo '<p>';
                                                            echo $infosArticle['corpsArticle'];
                                                        echo '</p>';
                                                    echo '</div>';
                                                echo '</div>';
                                    echo '</div>';
                                echo '</a>';
                            echo '</div>';
                        echo '</div>';
                }
                    ?>






            <!--


                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="well blog">
                        <a href="#">
                            <div class="date primary">
                                <span class="blog-date">Oct</span>
                                <span class="blog-number">8</span>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                    <div class="image">
                                        <img src="http://lorempixel.com/800/534/sports/1/" alt="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="blog-details">
                                        <h2>Post title 1</h2>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tristique libero et est iaculis, id placerat nisi luctus. Aenean volutpat risus non fermentum feugiat. Etiam facilisis arcu ante, sed molestie diam mollis vel...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class
                     ="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="well blog">
                        <a href="#">
                            <div class="date">
                                <span class="blog-date">Sept</span>
                                <span class="blog-number">28</span>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                    <div class="image">
                                        <img src="http://lorempixel.com/800/534/nature/4/" alt="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="blog-details">
                                        <h2>Post title 2</h2>
                                        <p>
                                            Vestibulum commodo quis lacus vel eleifend. Donec sapien turpis, lobortis ut fringilla nec, congue vitae massa. Sed ullamcorper urna congue elit sodales feugiat ut sed nisl. Ut egestas a mauris non pharetra...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="well blog">
                        <a href="#">
                            <div class="date success">
                                <span class="blog-date">Sept</span>
                                <span class="blog-number">23</span>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                    <div class="image">
                                        <img src="http://lorempixel.com/800/534/people/4/" alt="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="blog-details">
                                        <h2>Post title 3</h2>
                                        <p>
                                            Cras rhoncus elementum libero et rutrum. Sed lorem lectus, mollis pellentesque sollicitudin molestie, eleifend sed augue. Ut a consequat purus. Fusce sit amet turpis est...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="well blog info">
                        <a href="#">
                            <div class="date">
                                <span class="blog-date">Sept</span>
                                <span class="blog-number">9</span>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                    <div class="image">
                                        <img src="http://lorempixel.com/800/534/city/4/" alt="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="blog-details">
                                        <h2>Post title 5</h2>
                                        <p>
                                            Morbi tellus nisl, lacinia sit amet dui ut, suscipit pharetra tellus. Nulla in rutrum magna. Donec dui diam, feugiat rhoncus vehicula ut, mollis et turpis. Donec erat tortor, tincidunt in condimentum sed...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="well blog">
                        <a href="#">
                            <div class="date danger">
                                <span class="blog-date">Sept</span>
                                <span class="blog-number">2</span>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                    <div class="image">
                                        <img src="http://lorempixel.com/800/534/food/4/" alt="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="blog-details">
                                        <h2>Post title 6</h2>
                                        <p>
                                            Ut tempor ligula et suscipit aliquam. Quisque in venenatis massa. Fusce imperdiet erat ac magna aliquet aliquam. Morbi fermentum est felis. Duis ultricies, lectus at facilisis tristique...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>-->

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
