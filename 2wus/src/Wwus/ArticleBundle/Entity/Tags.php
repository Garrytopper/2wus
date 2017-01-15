<?php

namespace Wwus\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tags
 *
 * @ORM\Table(name="tags")
 * @ORM\Entity(repositoryClass="Wwus\ArticleBundle\Repository\TagsRepository")
 */
class Tags
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
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=5, unique=true)
     */
    private $couleur;

    /**
     * @var string
     *
     * @ORM\Column(name="catégorie", type="string", length=255, unique=true)
     */
    private $categorie;


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
     * Set couleur
     *
     * @param string $couleur
     *
     * @return Tags
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set catégorie
     *
     * @param string $catégorie
     *
     * @return Tags
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get catégorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}

