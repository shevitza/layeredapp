<?php
namespace data;
/**
 * Description of Post
 *
 * @author Evgenia
 */
class Post
{
    private $postID;
    private  $title;
    private $content;
    private $author;
    private $img;
    private $category;
    private $dateCreation;
    public function __construct($title='', $content='', $author='', $category='')
    {
        $this->author=$author;
        $this->title=$title;
        $this->content=$content;
        $this->category=$category;
    }
    function getPostID()
    {
        return $this->postID;
    }

    function getTitle()
    {
        return $this->title;
    }

    function getContent()
    {
        return $this->content;
    }

    function getAuthor()
    {
        return $this->author;
    }

    function getImg()
    {
        return $this->img;
    }

    function getCategory()
    {
        return $this->category;
    }

    function setPostID($postID)
    {
        $this->postID = $postID;
    }

    function setTitle($title)
    {
        $this->title = $title;
    }

    function setContent($content)
    {
        $this->content = $content;
    }

    function setAuthor($author)
    {
        $this->author = $author;
    }

    function setImg($img)
    {
        $this->img = $img;
    }

    function setCategory($category)
    {
        $this->category = $category;
    }

    function getDateCreation()
    {
        return $this->dateCreation;
    }

    function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }



    
}
