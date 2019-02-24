<?php
$pageTitle = "Administration of posts";
include 'includes/header.php';
//echo '<pre>';
//print_r($list);
//echo '</pre>';
?>
<div class="container">
	<div class="row">
		<div class="col-lg-10 col-md-10 mx-auto">
			<h2>Administration of posts</h2>
		</div>
		<div class="col-lg-2 col-md-10 mx-auto">
			<a href="logout.php" class="btn">Logout</a>
		</div>

	</div>
	<div class="row">
		<div>
			<a href="new_post.php" class="btn btn-info">New Post</a>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
			<table class="table table-bordered table-hover">
				<tr>
					<th>Post name</th>
					<th>View</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php
				foreach ($list as $key => $title) {
					echo '<tr>';
					echo '<td>';
					echo $title;
					echo '</td>';
					echo '<td>';
					echo '<a href="post.php?id=' . $key . '" class="btn">';
					echo 'View';
					echo '</a>';
					echo '</td>';
					echo '<td>';
					echo '<a href="edit_post.php?id=' . $key . '" class="btn">';
					echo 'Edit';
					echo '</a>';
					echo '</td>';
					echo '<td>';
					echo '<a href="delete_post.php?id=' . $key . '" class="btn"'.
						' onclick="return confirm(\'Are you sure you want to delete this item?\');"'. '>';
					echo 'Delete';
					echo '</a>';
					echo '</td>';
					echo '</tr>';
				}
				?>
			</table>

		</div>
	</div>
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
			<?php
			if (isset($_SESSION['msg_post'])) {
				echo '<p>' . $_SESSION['msg_post'] . '</p>';
			}
			?>
		</div>
	</div>
</div>

