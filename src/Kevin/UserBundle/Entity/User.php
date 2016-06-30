<?php

namespace Kevin\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Kevin\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Kevin\PortfolioBundle\Entity\Profil", cascade="all", orphanRemoval = true)
     * @ORM\JoinColumn(name="profil_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    protected $profil;

    public function __construct()
    {
        parent::__construct();

        // Ajouter le code de personnalisation de l'user
    }

    /**
     * Set profil
     *
     * @param \Kevin\PortfolioBundle\Entity\Profil $profil
     *
     * @return User
     */
    public function setProfil(\Kevin\PortfolioBundle\Entity\Profil $profil = null)
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
