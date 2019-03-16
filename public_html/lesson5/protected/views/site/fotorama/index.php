<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 17.01.2019
 * Time: 22:07
 */

use yii\imagine\Image;
use app\assets\Fotorama;
Fotorama::register($this);
?>
<div>
    <h3>FOTORAMA TEST</h3>
    <div>
        <div class="fotorama" data-auto="false">
            <img src="images/forest.jpg">
            <img src="images/kingfisher.jpg">
            <img src="images/nature.jpg">
            <img src="images/mountain.jpg">
            <img src="images/ping.png">
        </div>
    </div>
    <script type="text/javascript">
        var fotoramaStart = true;
    </script>
</div>
