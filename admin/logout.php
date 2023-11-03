
    <?php
// ESTO CON COOKIE
//         setcookie("usuario","",time()-3600);
//         header("location: index.php");

        session_start();
        session_destroy();
        header("location: index.php");

    ?>

