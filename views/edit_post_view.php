<?php
if (!isset($_SESSION['editor']) || ($_SESSION['editor'] != 1)) {
	header('Location:' . URL . '/login.php');
}
$pageTitle = "Edit Post";
include 'views/includes/header.php';
$id = $_GET['id'];
?>
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
			<h2>Edit Post</h2>
			<div>
				<a href="all.php" class="btn btn-info">All Posts</a>
			</div>
			<div class="bs-component"> 
				<form  method="post" action="update_post.php?id=<?php echo $id; ?>" name="sentMessage" id="contactForm" enctype="multipart/form-data">
					<div class="control-group">
						<div class="form-group floating-label-form-group controls">
							<label>Title</label>

							<?php
							$title = trim($c->getTitle());
							$title = htmlspecialchars($title);
							echo '<input type="text" class="form-control" placeholder="Title" id="name" required data-validation-required-message="Please enter post title!" name="title" value="' . $title . '">';
							?>								  
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<div class="control-group">
						<div class="form-group floating-label-form-group controls">
							<label>Author</label>
							<?php
							$author = trim($c->getAuthor());
							$author = htmlspecialchars($author);
							echo '<input type="text" class="form-control" placeholder="Author" id="author" required data-validation-required-message="Please enter post title!" name="author" value="' . $author . '">';
							?>
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<div class="control-group">
						<div class="form-group floating-label-form-group controls">
							<label>Picture</label>
							<input type="file" class="form-control" placeholder="Picture" id="img" name="img"  value="">

							<div style="width:100px;" >
								<?php
								$img = $c->getImg();
								echo '<img class="thumb" src="' . URL . '/' . $img . '" alt="">';
								?>
							</div>

							<p class="help-block text-danger"></p>
						</div>
					</div>
					<div class="control-group">
						<div class="form-group floating-label-form-group controls">
							<label>Content</label>
							<textarea rows="10" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a content." name="content"> <?php
								echo htmlspecialchars($c->getContent());
								?></textarea>
							<p class="help-block text-danger"></p>
						</div>
						<br>
						<div id="success"></div>
						<div class="form-group">
							<input type="reset" class="btn btn-primary" id="send" value="Reset">  
							<input type="submit" class="btn btn-primary" id="send" value="Send" name="submit">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
//	include 'views/includes/footer.php';

	
