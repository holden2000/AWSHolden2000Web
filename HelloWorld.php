
<?php
    echo "Hello World!";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
    ?>
