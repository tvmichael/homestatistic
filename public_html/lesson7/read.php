<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 11.04.2019
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>READ LOG</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>READ LOG</h2>
<hr>
<pre>
    <?php
    echo file_get_contents( getcwd().'/mylog.txt' );
    ?>
</pre>
<hr>
<p>END</p>
</body>
</html>

