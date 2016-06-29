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
        $user = $this->getUser();
        if (null === $user){
            return $this->redirectToRoute('fos_user_security_login');
        }else{

        }
        
        return $this->render('KevinCoreBundle:Core:accueil.html.twig');
    }
}
