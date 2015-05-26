<?php
/**
 * Created by PhpStorm.
 * User: thaonzo
 * Date: 13/04/2015
 * Time: 15:19
 */
?>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
require_once
<script type="text/javascript">
    var pseudo = '<?php echo $_SESSION['pseudo']; ?>';
    var ip = '<?php echo get_client_ip(); ?>';
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/manhattan.js"></script>
</body>
</html>