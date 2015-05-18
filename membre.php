<?php
/**
 * Cette vue permet d'avoir le visuel du panel d'un membre (lorsqu'il est connecté).
 */
//if(!(isset($_SESSION)))
    //header("location: index.php");
require_once('header.php');

?>

<body>

<?php

require_once('navigation.php');
require_once('controler/page_membre_controler.php');
?>

<div class="container">

    <div class="blog-header">
        <h1 class="blog-title">Espace Membre</h1>
        <hr>
            <div class="form-group">
                <form action="controler/change_avatar.php" method="POST" enctype="multipart/form-data">
                    <label>Changer Avatar</label><br>
                    <span class="btn btn-default btn-file">
                    <input id="imgInp" type="file" name="newavatar" value="">Importer</input>
                    </span>
                    <p class="help-block">Preview</p>
                    <img id="blah" src="<?php echo file_exists('img/'.$_SESSION['pseudo'].'.jpg')?'img/'.$_SESSION['pseudo'].'.jpg':(file_exists('img/'.$_SESSION['pseudo'].'.png')?'img/'.$_SESSION['pseudo'].'.png':'img/default.jpg');?>" width="20%" height="20%"></img>
                    <hr>
                    <input type="submit" class="btn btn-info" name="submit" value="Modifier">
                </form>
            </div>
        <hr>

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
                <?php
                foreach($articles as $article) {
                            echo '<div class="well blog">
                            <a href="#">
                                <div class="date warning">
                                    <span class="blog-date">'.date("M",strtotime($article["date_Article"])).'</span>
                                    <span class="blog-number">'.date("d",strtotime($article["date_Article"])).'</span>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <div class="image">
                                            <img src="img/'.$article["imageArticle"].'" alt="">
                                        </div>
                                    </div>';

                            echo '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <div class="blog-details">';
                            echo '<a href="newarticle.php?cle='.$article["id_article"].'"> <h2>'.$article["titreArticle"].'</h2></a>';
                            echo '<p>' . $article['corpsArticle'] . '</p>';
                            echo '<div class="row">

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
                        </div>';
                }
                ?>
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
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });
</script>

