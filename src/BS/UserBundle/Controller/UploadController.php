<?php
/**
 * Created by PhpStorm.
 * User: J'ai
 * Date: 11/11/2014
 * Time: 19:26
 */

namespace BS\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BS\UserBundle\Entity\Upload;
use Symfony\Component\HttpFoundation\Request;




class UploadController extends Controller {


    public function uploadAction(Request $request){
        $user = $this->get('security.context')->getToken()->getUser();
        $userId = $user->getId();
        $userName = $user->GetUsername();
        $up = new Upload();
        $up->setRefCompany($userId);
        $up->setNameCompagny($userName);


        $form = $this->createFormBuilder($up)
            ->add('titre')
            ->add('file')
            ->getForm()
        ;

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($up);
                $em->flush();

                $this->redirect($this->generateUrl('default'));
            }
        }

      //  return array('form' => $form->createView());

        return $this->render('BSUserBundle:Upload:index.html.twig', array(
            'form' => $form->createView(),
            'test' => 'YOOOOO',
        ));
    }
} 