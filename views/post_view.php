<?php
$pageTitle = "Blog";
include 'includes/header.php';
include 'includes/nav.php';
?>
<?php
include 'views/carousel.php';
?>


<?php
//echo 'url(';'img/celuvki1.jpg')">
//$im=$c->getImg();
//echo "url('".URL.'/'.$im."')";
?>
	
<!--Main Content -->
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
			<?php
			echo '<h2>' . $c->getTitle() . '</h2>';
			echo "<p><i>" . $c->getAuthor() . "</i></p>";
			echo "<p>" . $c->getContent() . "</p>";		
			?>	
		</div>
	</div>
</div>
<?php
include 'includes/footer.php';

