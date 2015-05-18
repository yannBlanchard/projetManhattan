<!--
* Cette vue permet d'avoir le visuel du pied page du blog.
*/
-->
<footer class="blog-footer">
    <p>
    <ul class="pager">
        <?php
            if($_GET['page']>1)
                echo '<li><a href="index.php?page='.($_GET['page']-1).'">Previous</a></li>';

            echo '<li><a href="index.php?page='.($_GET['page']+1).'">Next</a></li>';
        ?>
    </ul>
    <a href="#">Back to top</a>
    </p>
</footer>

