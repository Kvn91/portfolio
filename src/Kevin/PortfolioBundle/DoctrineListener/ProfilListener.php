<?php

namespace Kevin\PortfolioBundle\DoctrineListener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Kevin\PortfolioBundle\Utils\StringsOperations;
use Kevin\PortfolioBundle\Entity\Profil;

class ProfilListener
{
    /**
     * @var StringsOperations
     */
    private $stringsOperations;

    public function __construct(StringsOperations $stringsOperations)
    {
        $this->stringsOperations = $stringsOperations;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if (!$entity instanceof Profil) {
            return;
        }

        $firstname = $entity->getFirstname();
        $formattedFirstname = $this->stringsOperations->ucname($firstname);
        $entity->setFirstname($formattedFirstname);

        $name = $entity->getName();
        $formattedName = $this->stringsOperations->ucname($name);
        $entity->setName($formattedName);

        $city = $entity->getCity();
        $formattedCity = ucfirst($city);
        $entity->setCity($formattedCity);
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if (!$entity instanceof Profil) {
            return;
        }

        $firstname = $entity->getFirstname();
        $formattedFirstname = $this->stringsOperations->ucname($firstname);
        $entity->setFirstname($formattedFirstname);

        $name = $entity->getName();
        $formattedName = $this->stringsOperations->ucname($name);
        $entity->setName($formattedName);

        $city = $entity->getCity();
        $formattedCity = ucfirst($city);
        $entity->setCity($formattedCity);
    }
}