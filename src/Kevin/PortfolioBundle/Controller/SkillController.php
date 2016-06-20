<?php

namespace Kevin\PortfolioBundle\Controller;

use Kevin\PortfolioBundle\Entity\Skill;
use Kevin\PortfolioBundle\Form\SkillType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SkillController extends Controller
{
    public function indexAction($page)
    {
        if ($page < 1){
            throw new NotFoundHttpException('Page ' . $page . ' inexistante.');
        }

        $em = $this->getDoctrine()->getManager();
        $skillsList = $em->getRepository('KevinPortfolioBundle:Skill')->getSkills($page);

        $nbPages = ceil(count($skillsList) / Skill::NB_SKILLS_PER_PAGE);

        if ($page > $nbPages){
            throw new NotFoundHttpException('Page ' . $page . ' inexistante.');
        }

        return $this->render('KevinPortfolioBundle:Skill:index.html.twig', array(
            'skillsList'  => $skillsList,
            'page'    => $page,
            'nbPages' => $nbPages
        ));
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