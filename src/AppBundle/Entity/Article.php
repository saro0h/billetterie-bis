<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table
 */
class Article
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column
     */
    private $title;

    /**
     * @ORM\Column
     */
    private $authorName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $authorPicture;

    /**
     * @ORM\Column(type="text")
     */
    private $authorPosition;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $authorTwitter;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function __construct()
    {
        $this->createdAt = new \Datetime();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        return $this->title = $title;
    }

    public function getAuthorName()
    {
        return $this->authorName;
    }

    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;
    }

    public function getAuthorPicture()
    {
        return $this->authorPicture;
    }

    public function setAuthorPicture($authorPicture)
    {
        $this->authorPicture = $authorPicture;
    }

    public function getAuthorPosition()
    {
        return $this->authorPosition;
    }

    public function setAuthorPosition($authorPosition)
    {
        $this->authorPosition = $authorPosition;
    }

    public function getAuthorTwitter()
    {
        return $this->authorTwitter;
    }

    public function setAuthorTwitter($authorTwitter)
    {
        $this->authorTwitter = $authorTwitter;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
}
