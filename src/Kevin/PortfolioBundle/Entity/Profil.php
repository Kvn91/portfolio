<?php

namespace Kevin\PortfolioBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Misd\PhoneNumberBundle\Validator\Constraints\PhoneNumber as AssertPhoneNumber;
use Kevin\PortfolioBundle\Utils\Strings;

/**
 * Profil
 *
 * @ORM\Table(name="profil")
 * @ORM\Entity(repositoryClass="Kevin\PortfolioBundle\Repository\ProfilRepository")
 * @UniqueEntity(fields={"email"}, message="Cet email existe déjà")
 * @UniqueEntity(fields={"phoneNumber"}, message="Ce numéro existe déjà")
 * @ORM\HasLifecycleCallbacks()
 */
class Profil
{
    /**
     * @ORM\OneToOne(targetEntity="Kevin\UserBundle\Entity\User", mappedBy="profil", cascade="persist")
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity="Kevin\PortfolioBundle\Entity\Image", cascade="all", orphanRemoval = true)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="Kevin\PortfolioBundle\Entity\Study", mappedBy="profil", cascade="all", orphanRemoval = true)
     */
    private $studies;

    /**
     * @ORM\OneToMany(targetEntity="Kevin\PortfolioBundle\Entity\Experience", mappedBy="profil", cascade="all", orphanRemoval = true)
     */
    private $experiences;
    
    /**
     * @ORM\OneToMany(targetEntity="Kevin\PortfolioBundle\Entity\ProfilSkill", mappedBy="profil", cascade="all", orphanRemoval = true)
     */
    private $profilSkills;

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
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var int
     *
     * @ORM\Column(name="postalCode", type="integer")
     * @Assert\Length(min=5, max=5)
     */
    private $postalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdayDate", type="date", nullable=true)
     */
    private $birthdayDate;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", unique=true)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(name="phoneNumber", type="phone_number", unique=true)
     * @AssertPhoneNumber
     */
    private $phoneNumber;

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
     * @return Profil
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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Profil
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Profil
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Profil
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set postalCode
     *
     * @param integer $postalCode
     *
     * @return Profil
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return int
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Profil
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set birthdayDate
     *
     * @param \DateTime $birthdayDate
     *
     * @return Profil
     */
    public function setBirthdayDate($birthdayDate)
    {
        $this->birthdayDate = $birthdayDate;

        return $this;
    }

    /**
     * Get birthdayDate
     *
     * @return \DateTime
     */
    public function getBirthdayDate()
    {
        return $this->birthdayDate;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Profil
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
     * Constructor
     */
    public function __construct()
    {
        $this->experiences  = new ArrayCollection();
        $this->studies      = new ArrayCollection();
        $this->profilSkills = new ArrayCollection();
    }

    /**
     * Set image
     *
     * @param \Kevin\PortfolioBundle\Entity\Image $image
     *
     * @return Profil
     */
    public function setImage(\Kevin\PortfolioBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Kevin\PortfolioBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add experience
     *
     * @param \Kevin\PortfolioBundle\Entity\Experience $experience
     *
     * @return Profil
     */
    public function addExperience(\Kevin\PortfolioBundle\Entity\Experience $experience)
    {
        $this->experiences[] = $experience;

        $experience->setProfil($this);

        return $this;
    }

    /**
     * Remove experience
     *
     * @param \Kevin\PortfolioBundle\Entity\Experience $experience
     */
    public function removeExperience(\Kevin\PortfolioBundle\Entity\Experience $experience)
    {
        $this->experiences->removeElement($experience);
    }

    /**
     * Get experiences
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExperiences()
    {
        return $this->experiences;
    }

    /**
     * Add study
     *
     * @param \Kevin\PortfolioBundle\Entity\Study $study
     *
     * @return Profil
     */
    public function addStudy(\Kevin\PortfolioBundle\Entity\Study $study)
    {
        $this->studies[] = $study;
        $study->setProfil($this);

        return $this;
    }

    /**
     * Remove study
     *
     * @param Study $study
     */
    public function removeStudy(Study $study)
    {
        $this->studies->removeElement($study);
    }

    /**
     * Get studies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStudies()
    {
        return $this->studies;
    }

    /**
     * Add profilSkill
     *
     * @param \Kevin\PortfolioBundle\Entity\ProfilSkill $profilSkill
     *
     * @return Profil
     */
    public function addProfilSkill(\Kevin\PortfolioBundle\Entity\ProfilSkill $profilSkill)
    {
        $this->profilSkills[] = $profilSkill;

        $profilSkill->setProfil($this);

        return $this;
    }

    /**
     * Remove profilSkill
     *
     * @param \Kevin\PortfolioBundle\Entity\ProfilSkill $profilSkill
     */
    public function removeProfilSkill(\Kevin\PortfolioBundle\Entity\ProfilSkill $profilSkill)
    {
        $this->profilSkills->removeElement($profilSkill);
    }

    /**
     * Get profilSkills
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProfilSkills()
    {
        return $this->profilSkills;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Profil
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return Profil
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return phone_number
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set user
     *
     * @param \Kevin\UserBundle\Entity\User $user
     *
     * @return Profil
     */
    public function setUser(\Kevin\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Kevin\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
