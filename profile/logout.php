<?php
session_start();
?>
<html>
    <body>
        <?php
        session_unset();
        session_destroy();
       
        Header ('location: ../index.php');
        ?>
    </body>
</html>