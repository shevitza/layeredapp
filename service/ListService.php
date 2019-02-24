<?php
namespace service;

/**
 * Description of ListService
 *
 * @author Evgenia
 */
class ListService
{
  
	private $titles = array();
	private $categories = array();
	private $conn;
	private $database;

	public function __construct(\config\Database $database) {
		$this->database = $database;
		$this->conn = $database->getConnection();
	}

	function getTitles() {
		$query = "SELECT postID, title FROM post";
		$statement = $this->conn->prepare($query);
		$temp=array();
		if ($statement->execute()) {
			foreach ($statement->fetchAll() as $row) {
				$id=$row['postID'];
				$temp[$id]=$row['title'];
			}
		}
		$this->setTitles($temp);
		return $this->titles;
	}
	function getID() {
		$query = "SELECT postID FROM post";
		$statement = $this->conn->prepare($query);
		$temp=array();
		if ($statement->execute()) {
			foreach ($statement->fetchAll() as $row) {
				
				$temp[]=$row['postID'];
			}
		}
		$this->setTitles($temp);
		return $this->titles;
	}

	function getCategories() {
		$query = "SELECT DISTINCT category FROM post";
		$statement = $this->conn->prepare($query);
		if ($statement->execute()) {
			foreach ($statement->fetchAll() as $row) {
				$this->categories[] = $row['category'];
			}
		}

		return $this->categories;
	}
	function setTitles($titles) {
		$this->titles = $titles;
	}

	
	function getTitlesByCategory($cat) {
		$query = "SELECT postID, title FROM post WHERE category='$cat'";
		$statement = $this->conn->prepare($query);
		$this->setTitles(array());
		if ($statement->execute()) {
			foreach ($statement->fetchAll() as $row) {
				$id=$row['postID'];
				$this->$titles[$id]=$row['title'];
			}
		}
		return $this->titles;
	}

}
