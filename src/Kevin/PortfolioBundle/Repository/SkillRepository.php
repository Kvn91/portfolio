<?php

namespace Kevin\PortfolioBundle\Repository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Kevin\PortfolioBundle\Entity\Skill;

/**
 * SkillRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SkillRepository extends \Doctrine\ORM\EntityRepository
{
    public function getSkills($page)
    {
        $query = $this->createQueryBuilder('s')
            ->orderBy('s.name', 'ASC')
            ->getQuery();

        $query->setFirstResult(($page-1) * Skill::NB_SKILLS_PER_PAGE)
            ->setMaxResults(Skill::NB_SKILLS_PER_PAGE);

        $results = new Paginator($query, true);

        return $results;
    }
}
