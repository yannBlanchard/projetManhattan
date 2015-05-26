<?php
/**
 * Created by PhpStorm.
 * User: thaonzo
 * Date: 26/05/2015
 * Time: 11:09
 */

if (isset($_SESSION['pseudo'])) {
    echo '<hr><button type="button" class="btn btn-success">
            <i class="glyphicon glyphicon-thumbs-up"></i></button>
            |
            <button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-thumbs-down"></i></button>';

}
?>