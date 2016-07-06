<?php

namespace Kevin\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CoreController extends Controller
{
    public function indexAction()
    {
        return $this->render('KevinCoreBundle:Core:index.html.twig');
    }

    public function accueilAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        if (null === $user){
            return $this->redirectToRoute('fos_user_security_login');
        }

        if (null !== $user->getProfil()){
            $profil = $em->getRepository('KevinPortfolioBundle:Profil')->getProfil($user->getProfil()->getId());
        }else{
            $profil = null;
        }
        
        return $this->render('KevinCoreBundle:Core:accueil.html.twig', array(
            'profil' => $profil
        ));
    }
}
