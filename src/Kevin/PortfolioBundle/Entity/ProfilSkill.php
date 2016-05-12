<?php

namespace Kevin\PortfolioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProfilSkill
 *
 * @ORM\Entity(repositoryClass="Kevin\PortfolioBundle\Repository\ProfilSkillRepository")
 */
class ProfilSkill
{
    /**
     * @ORM\ManyToOne(targetEntity="Kevin\PortfolioBundle\Entity\Profil", inversedBy="profilSkills")
     * @ORM\JoinColumn(nullable=false)
     */
    private $profil;

    /**
     * @ORM\ManyToOne(targetEntity="Kevin\PortfolioBundle\Entity\Skill")
     * @ORM\JoinColumn(nullable=false)
     */
    private $skill;

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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="level", type="integer")
     */
    private $level;

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
     * Set name
     *
     * @param string $name
     *
     * @return Skill
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set level
     *
     * @param integer $level
     *
     * @return ProfilSkill
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set profil
     *
     * @param \Kevin\PortfolioBundle\Entity\Profil $profil
     *
     * @return ProfilSkill
     */
    public function setProfil(\Kevin\PortfolioBundle\Entity\Profil $profil)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get profil
     *
     * @return \Kevin\PortfolioBundle\Entity\Profil
     */
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * Set skill
     *
     * @param \Kevin\PortfolioBundle\Entity\Skill $skill
     *
     * @return ProfilSkill
     */
    public function setSkill(\Kevin\PortfolioBundle\Entity\Skill $skill)
    {
        $this->skill = $skill;

        return $this;
    }

    /**
     * Get skill
     *
     * @return \Kevin\PortfolioBundle\Entity\Skill
     */
    public function getSkill()
    {
        return $this->skill;
    }
}
