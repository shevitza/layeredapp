<?php

namespace service;

/**
 * Description of PostService
 *
 * @author Evgenia
 */
use config;
use data;

class PostService
{

   private $conn;
	private $database;

	public function __construct(\config\Database $database) {
		$this->database = $database;
		$this->conn = $database->getConnection();
	}

	public function readPost($id) {
		$query = "SELECT * FROM post WHERE postID=?";
		$form_data = [$id];
		$statement = $this->conn->prepare($query);
		$data = new \data\Post();
		if ($statement->execute($form_data)) {
			foreach ($statement->fetchAll() as $row) {
				$data->setPostID($row['postID']);
				$data->setAuthor($row['author']);
				$data->setCategory($row['category']);
				$data->setTitle($row['title']);
				$data->setContent($row['content']);
				$data->setImg($row['img']);
				$data->setDateCreation($row['dateCreation']);
			}
		}
		return $data;
	}

	function readLastPost() {
		$query = "SELECT * FROM post ORDER BY postID DESC LIMIT 1;";
		$statement = $this->conn->prepare($query);
		$data = new \data\Post();
		if ($statement->execute()) {
			foreach ($statement->fetchAll() as $row) {
				$data->setPostID($row['postID']);
				$data->setAuthor($row['author']);
				$data->setCategory($row['category']);
				$data->setTitle($row['title']);
				$data->setContent($row['content']);
				$data->setImg($row['img']);
                                $data->setDateCreation($row['dateCreation']);
				
			}
		}
		return $data;
	}

	public function createPost($title, $author, $content) {
		$form_data = array(
			':title' => $title,
			':author' => $author,
			':content' => $content,
			':img' => 'img/cooking.jpg',
			':category' => 'math'
		);
		$query = "INSERT INTO post (title, author, content, img, category) "
			. " VALUES(:title, :author, :content, :img, :category);";

		$statement = $this->conn->prepare($query);
		$data = array();
		if ($statement->execute($form_data)) {
			$data[] = array(
				'success' => '1'
			);
		} else {
			$data[] = array(
				'success' => '0'
			);
		}
		return $data;
	}

	public function updatePost($id, $img='') {
		$title = $_POST['title'];
		$author = $_POST['author'];
		$content = $_POST['content'];
		if ($img=='') {
			$query = "UPDATE post SET  title=?, author=?, content=? WHERE postID=$id";
			$form_data = [$title, $author, $content];
		} else {
			
			$query = "UPDATE post SET  title=?, author=?, content=?, img=? WHERE postID=$id";
			$form_data = [$title, $author, $content, $img];
		}

		$statement = $this->conn->prepare($query);
		$data = array();
		if ($statement->execute($form_data)) {
			$data[] = array(
				'success' => '1'
			);
		} else {
			$data[] = array(
				'success' => '0'
			);
		}
		return $data;
	}

	public function deletepost($id) {
		$query = "DELETE FROM post WHERE postID=?";
		$form_data = [$id];

		$statement = $this->conn->prepare($query);
		$data = array();
		if ($statement->execute($form_data)) {
			$data[] = array(
				'success' => '1'
			);
		} else {
			$data[] = array(
				'success' => '0'
			);
		}
		return $data;
	}

	public function allPosts() {
		$query = "SELECT * FROM post";
		$statement = $this->conn->prepare($query);
		$data = new \data\Post();
		$data_arr = array();
		if ($statement->execute()) {
			while ($row = $statement->fetchAll()) {
				$data->setPostID($row['postID']);
				$data->setAuthor($row['author']);
				$data->setCategory($row['category']);
				$data->setTitle($row['title']);
				$data->setContent($row['content']);
				$data->setImg($row['img']);
				$data->setDateCreation($row['dateCreation']);
				array_push($data_arr, $data);
			}
		}
		return $data;
	}

}
