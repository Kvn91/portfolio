<?php

namespace Kevin\PortfolioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Study
 *
 * @ORM\Table(name="study")
 * @ORM\Entity(repositoryClass="Kevin\PortfolioBundle\Repository\StudyRepository")
 */
class Study
{
    /**
     * @ORM\ManyToOne(targetEntity="Kevin\PortfolioBundle\Entity\Profil", inversedBy="studies", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $profil;

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
     * @ORM\Column(name="beginYear", type="integer")
     */
    private $beginYear;

    /**
     * @var int
     *
     * @ORM\Column(name="endYear", type="integer")
     */
    private $endYear;

    /**
     * @var int
     *
     * @ORM\Column(name="beginMonth", type="integer")
     */
    private $beginMonth;

    /**
     * @var int
     *
     * @ORM\Column(name="endMonth", type="integer")
     */
    private $endMonth;

    /**
     * @var string
     *
     * @ORM\Column(name="establishment", type="string", length=255)
     */
    private $establishment;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;


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
     * Set beginYear
     *
     * @param integer $beginYear
     *
     * @return Study
     */
    public function setBeginYear($beginYear)
    {
        $this->beginYear = $beginYear;

        return $this;
    }

    /**
     * Get beginYear
     *
     * @return int
     */
    public function getBeginYear()
    {
        return $this->beginYear;
    }

    /**
     * Set endYear
     *
     * @param integer $endYear
     *
     * @return Study
     */
    public function setEndYear($endYear)
    {
        $this->endYear = $endYear;

        return $this;
    }

    /**
     * Get endYear
     *
     * @return int
     */
    public function getEndYear()
    {
        return $this->endYear;
    }

    /**
     * Set beginMonth
     *
     * @param integer $beginMonth
     *
     * @return Study
     */
    public function setBeginMonth($beginMonth)
    {
        $this->beginMonth = $beginMonth;

        return $this;
    }

    /**
     * Get beginMonth
     *
     * @return int
     */
    public function getBeginMonth()
    {
        return $this->beginMonth;
    }

    /**
     * Set endMonth
     *
     * @param integer $endMonth
     *
     * @return Study
     */
    public function setEndMonth($endMonth)
    {
        $this->endMonth = $endMonth;

        return $this;
    }

    /**
     * Get endMonth
     *
     * @return int
     */
    public function getEndMonth()
    {
        return $this->endMonth;
    }

    /**
     * Set establishment
     *
     * @param string $establishment
     *
     * @return Study
     */
    public function setEstablishment($establishment)
    {
        $this->establishment = $establishment;

        return $this;
    }

    /**
     * Get establishment
     *
     * @return string
     */
    public function getEstablishment()
    {
        return $this->establishment;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Study
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set profil
     *
     * @param \Kevin\PortfolioBundle\Entity\Profil $profil
     *
     * @return Study
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
}
