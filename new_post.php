<?php
session_start();
if (!isset($_SESSION['editor']) || ($_SESSION['editor'] != 1)) {
		header('Location:'.URL.'/login.php');
}
$pageTitle = "New Post";
include 'views/includes/header.php';
?>
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
			<div class="bs-component"> 
				<form  method="post" action="add_post.php" name="sentMessage" id="contactForm">
					<div class="control-group">
						<div class="form-group floating-label-form-group controls">
							<label>Title</label>
							<input type="text" class="form-control" placeholder="Title" id="name" required data-validation-required-message="Please enter post title!" name="title">
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<div class="control-group">
						<div class="form-group floating-label-form-group controls">
							<label>Author</label>
							<input type="text" class="form-control" placeholder="Author" id="aothor" required data-validation-required-message="Please enter post title!" name="author">
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<div class="control-group">
						<div class="form-group floating-label-form-group controls">
							<label>Content</label>
							<textarea rows="10" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a content." name="content"> </textarea>
							<p class="help-block text-danger"></p>
						</div>
						<br>
						<div id="success"></div>
						<div class="form-group">
							<input type="reset" class="btn btn-primary" id="send" value="Reset">  
							<input type="submit" class="btn btn-primary" id="send" value="Send">
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
	<?php
	include 'views/includes/footer.php';
	