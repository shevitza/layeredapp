<div id="demo" class="carousel slide" data-ride="carousel">
    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            
            <?php
            $im = $c->getImg();
            if (strlen($im) > 4) {
                echo '<img src="' . $im . '" alt="" width=100% >';
            } else {
                echo '<img src="img/cooking.jpg" alt="" width=100% >';
            }
            ?>
            
        </div>
    </div>
    <?php
    if ($prev != -1) {
        echo '<a class="carousel-control-prev" href="';
        echo 'post.php?id=' . $prev;
        echo '" data-slide="prev">';
        echo ' <span class="carousel-control-prev-icon"></span>';
        echo '</a>';
    }
    if ($next != -1) {
        echo '<a class="carousel-control-next" href="';
        echo 'post.php?id=' . $next;
        echo '" data-slide="next">';
        echo '<span class="carousel-control-next-icon"></span>';
        echo '</a>';
    }
    ?>
    <!-- Left and right controls -->
    <!--    <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>-->
</div>