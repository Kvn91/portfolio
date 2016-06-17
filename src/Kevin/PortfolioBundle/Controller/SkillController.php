<?php

namespace Kevin\PortfolioBundle\Controller;

use Kevin\PortfolioBundle\Entity\Skill;
use Kevin\PortfolioBundle\Form\SkillType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SkillController extends Controller
{
    public function indexAction()
    {
        return $this->render('KevinPortfolioBundle:Skill:index.html.twig');
    }

    public function addAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $skill = new Skill();

        $form = $this->createForm(SkillType::class, $skill);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            // Traitement du formulaire
            $em->persist($skill);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Profil enregistré');

            return $this->redirectToRoute('kevin_portfolio_skill_homepage');
        }

        return $this->render('KevinPortfolioBundle:Skill:add.html.twig', ['form' => $form->createView()]);
    }

    public function editAction()
    {
        return $this->render('KevinPortfolioBundle:Skill:edit.html.twig');
    }

    public function deleteAction()
    {
        return $this->render('KevinPortfolioBundle:Skill:delete.html.twig');
    }
}