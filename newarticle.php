<?php
/**
 * Cette vue permet d'avoir le visuel pour la création d'un article.
 */
//if(!(isset($_SESSION)))
//header("location: index.php");
require_once('header.php');

?>

<body>

<?php

require_once('navigation.php');

$titre="";
$img="";
$corps="";

if(isset($_GET['cle'])) {
    require_once('controler/single_controler.php');
    $titre=$article[0]["titreArticle"];
    $img=$article[0]["imageArticle"];
    $corps=$article[0]["corpsArticle"];
}
?>

<div class="container">

    <div class="blog-header">
        <div class="col-sm-8">
            <h1 class="blog-title">Créer un article</h1>
            <hr>
                <form action = 'controler/article_controler.php' method = "POST" enctype="multipart/form-data">
                <!--<form role="form" runat="server" action="controler/article_controler.php" method="POST" enctype= "multipart/form-data">-->
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                            <input type="hidden" class="form-control" name="src" value="article">
                            <?php
                            echo '<input type="hidden" class="form-control" name="image" value='.$img.'>';

                            echo '<input type="titre" class="form-control" name="titrearticle" value="'.$titre.'" placeholder="Entrez titre">
                            <input type="hidden" class="form-control" name="cle" value='.(isset($_GET['cle'])?$_GET['cle']:"").'>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Contenu</label>
                                <textarea name="contenuarticle" class="form-control" rows="3" id ="corps" placeholder="...">'.$corps.'</textarea>

                            </div>
                        </div>
                        <div  class="form-group">
                            <label>Image d\'article</label>
                            <input id="imgInp" type="file" name="imagearticle" value="'.(($img==="") ? 'img/defaut_article.jpg' : 'img/'.$img).'">
                            <p class="help-block">Glissez votre image ici</p>
                            <img id="blah" src="'.(($img==="") ? 'img/defaut_article.jpg' : 'img/'.$img).'" width="20%" height="20%"></img>
                        </div>

                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success" name="submitArticle" value="ok" id="submitArticle">Valider</button>
                    </div>
                </form>';
                       ?>
        </div>
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

