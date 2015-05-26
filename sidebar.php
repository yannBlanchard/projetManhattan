<?php
/**
 * Created by PhpStorm.
 * User: thaonzo
 * Date: 13/04/2015
 * Time: 16:01
 * Cette vue est le visuel de la partie droite de l'interface.
 * Elle affiche les articles par mois.
 */

?>

<div class="sidebar-module sidebar-module-inset">
    <h4>Rechercher</h4>
    <form action="search.php" method="GET">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="rechercher ...">
          <span class="input-group-btn">
            <input class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
          </span>
        </div><!-- /input-group -->
    </form>
</div>
<?php
    if(isset($_SESSION['pseudo'])) {
        echo
        '<div class="sidebar-module" >
    <h4 ><i class="fa fa-bell" ></i > Notifications</h4 >

    <div class="alert alert-purple" role = "alert" >
        <h3 > New Comment</h3 >
        <div class="pull-right" >
            <button class="btn btn-xs btn-success" ><i class="fa fa-check" ></i ></button >
            <button class="btn btn-xs btn-danger" ><i class="fa fa-close" ></i ></button >
        </div >
        <p class="lead" > Blabla</p >

    </div >
    <div class="alert alert-info" role = "alert" >...</div >
    <div class="alert alert-warning" role = "alert" >...</div >
    <div class="alert alert-danger" role = "alert" >...</div >

</div>';
}
?>
<div class="sidebar-module">
    <h4>Archives</h4>
    <ol class="list-unstyled">
        <li><a href="search.php?archive=2015-04">April 2015</a></li>
        <li><a href="search.php?archive=2015-03">March 2015</a></li>
        <li><a href="search.php?archive=2015-02">February 2015</a></li>
        <li><a href="search.php?archive=2015-01">January 2015</a></li>
        <li><a href="search.php?archive=2014-12">December 2014</a></li>
        <li><a href="search.php?archive=2014-11">November 2014</a></li>


         </ol>
</div>
<div class="sidebar-module">
    <h4>Suivez-nous!</h4>
    <ol class="list-unstyled">
        <li><a href="#">GitHub</a></li>
        <li><a href="#">Twitter</a></li>
        <li><a href="#">Facebook</a></li>
    </ol>
</div>

