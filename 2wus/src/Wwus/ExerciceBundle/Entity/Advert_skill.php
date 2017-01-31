<?php

namespace Wwus\ExerciceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Advert_skill
 *
 * @ORM\Table(name="advert_skill")
 * @ORM\Entity(repositoryClass="Wwus\ExerciceBundle\Repository\Advert_skillRepository")
 */
class Advert_skill
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
     * @var int
     *
     * @ORM\Column(name="level", type="integer")
     */
    private $level;

    
    /**
    * @ORM\ManyToOne(targetEntity="Wwus\ExerciceBundle\Entity\Advert")
    * @ORM\JoinColumn(nullable=false)
    */
    private $advert;

    /**
    * @ORM\ManyToOne(targetEntity="Wwus\ExerciceBundle\Entity\Skill")
    * @ORM\JoinColumn(nullable=false)
    */
    private $skill;

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
     * Set level
     *
     * @param integer $level
     *
     * @return Advert_skill
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set advert
     *
     * @param \Wwus\ExerciceBundle\Entity\Advert $advert
     *
     * @return Advert_skill
     */
    public function setAdvert(\Wwus\ExerciceBundle\Entity\Advert $advert)
    {
        $this->advert = $advert;

        return $this;
    }

    /**
     * Get advert
     *
     * @return \Wwus\ExerciceBundle\Entity\Advert
     */
    public function getAdvert()
    {
        return $this->advert;
    }

    /**
     * Set skill
     *
     * @param \Wwus\ExerciceBundle\Entity\Skill $skill
     *
     * @return Advert_skill
     */
    public function setSkill(\Wwus\ExerciceBundle\Entity\Skill $skill)
    {
        $this->skill = $skill;

        return $this;
    }

    /**
     * Get skill
     *
     * @return \Wwus\ExerciceBundle\Entity\Skill
     */
    public function getSkill()
    {
        return $this->skill;
    }
}