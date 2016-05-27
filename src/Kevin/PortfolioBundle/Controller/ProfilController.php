<?php

namespace Kevin\PortfolioBundle\Controller;

use Kevin\PortfolioBundle\Entity\Experience;
use Kevin\PortfolioBundle\Entity\Profil;
use Kevin\PortfolioBundle\Entity\ProfilSkill;
use Kevin\PortfolioBundle\Entity\Study;
use Kevin\PortfolioBundle\Form\ProfilType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProfilController extends Controller
{
    public function indexAction()
    {
        return $this->render('KevinPortfolioBundle:Profil:index.html.twig');
    }

    public function addAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $profil = new Profil();

        $study = new Study();
        $study
            ->setTitle('Dev web')
            ->setEstablishment('EEMI')
            ->setBeginMonth(9)
            ->setBeginYear(2014)
            ->setEndMonth(6)
            ->setEndYear(2015)
        ;

        $experience = new Experience();
        $experience
            ->setTitle('ingé réseau')
            ->setEstablishment('BNP')
            ->setBeginMonth(05)
            ->setBeginYear(2013)
            ->setEndMonth(06)
            ->setEndYear(2015)
        ;

        $skill = $em->getRepository('KevinPortfolioBundle:Skill')->find(1);
        $profilSkill = new ProfilSkill();
        $profilSkill
            ->setLevel(5)
            ->setSkill($skill)
        ;

        $birthdayDate = new \DateTime('01-12-1996');
        $profil
            ->setFirstname('jean-kévin')
            ->setTitle('Dev web')
            ->setAddress('33 rue du Maréchal')
            ->setBirthdayDate($birthdayDate)
            ->setCity('paris')
            ->setCountry('FR')
            ->setName('Dupond')
            ->setPostalCode(99999)
            ->addStudy($study)
            ->addExperience($experience)
            ->addProfilSkill($profilSkill)
        ;

        $form = $this->createForm(ProfilType::class, $profil);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            // Traitement du formulaire
            $em->persist($profil);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Profil enregistré');

            return $this->redirectToRoute('kevin_portfolio_homepage');
        }

        return $this->render('KevinPortfolioBundle:Profil:add.html.twig', ['form' => $form->createView()]);
    }

    public function editAction()
    {
        return $this->render('KevinPortfolioBundle:Profil:edit.html.twig');
    }

    public function deleteAction()
    {
        return $this->render('KevinPortfolioBundle:Profil:delete.html.twig');
    }

    public function testAction()
    {
        $date1 = new \DateTime('13:00:05');

        var_dump($date1->format("y-m-d"));exit;
    }
}