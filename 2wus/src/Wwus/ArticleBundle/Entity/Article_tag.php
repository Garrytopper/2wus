<?php

namespace Wwus\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article_tag
 *
 * @ORM\Table(name="article_tag")
 * @ORM\Entity(repositoryClass="Wwus\ArticleBundle\Repository\Article_tagRepository")
 */
class Article_tag
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
    * @ORM\ManyToOne(targetEntity="Wwus\ArticleBundle\Entity\Tags")
    * @ORM\JoinColumn(nullable=false)
    */
    private $tag;

    /**
     * @ORM\ManyToOne(targetEntity="Wwus\ArticleBundle\Entity\Article")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tag
     *
     * @param \stdClass $tag
     *
     * @return Article_tag
     */
    public function setTag(Tag $tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return \stdClass
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set article
     *
     * @param string $article
     *
     * @return Article_tag
     */
    public function setArticle(Article $article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return string
     */
    public function getArticle()
    {
        return $this->article;
    }
}
