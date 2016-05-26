<?php

namespace Kevin\PortfolioBundle\Controller;

use Kevin\PortfolioBundle\Entity\Profil;
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
        $profil = new Profil();

        $form = $this->createForm(ProfilType::class, $profil);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            // Traitement du formulaire
            $em = $this->getDoctrine()->getManager();
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