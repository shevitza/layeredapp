<?php
include 'includes/header.php';
include 'includes/nav.php';
?>

        <div class="container">

            <?php
//Categories and titles for links to any post
            if(count($list->getTitles())>0){
                    print_r($list->getTitles()); 
            }else{
                echo '<div>There is no posts!</div>'; 
            }
//            print_r($list->getCategories());
       
//The last post is here!
//            echo $c->getTitle() . '<br>';
//            echo $c->getAuthor() . '<br>';
//            echo $c->getContent() . '<br>';
            ?>
        </div>
<?php
            include 'includes/footer.php';
?>