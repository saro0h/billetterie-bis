<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Concert;
use AppBundle\Type\ConcertType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Csrf\CsrfToken;

/**
 * Description of ConcertController
 *
 * @author pavithra
 */


/**
 * @Route("/admin/concert")
 */
class ConcertController  extends Controller
{
    /**
     * @Template
     * @Route("/newconcert", name="concert_new")
     */
    public function newconcertAction(Request $request)
    {
        $concert = new Concert();
        $form = $this->createForm(ConcertType::class, $concert);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($concert);
            $em->flush();

            $this->addFlash('success', 'The concert has been successfully added.');

            return $this->redirectToRoute('concert_new');
        }

        return array('concertForm' => $form->createView());
    }
    
    /**
     * @Route(
     *     "/{id}",
     *     name="concert_update",
     *     requirements={ "id" = "\d+"}
     * )
     * @Template("AppBundle:Concert:newconcert.html.twig")
     */
    public function updateconcertAction(Request $request, Concert $concert)
    {
        $form = $this->createForm(ConcertType::class, $concert);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'The concert has been successfully updated.');

            return $this->redirectToRoute(
                'concert_update',
                array('id' => $concert->getId())
            );
        }

        return array('concertForm' => $form->createView());
    }

    /**
     * @Route("/", name="concert_list")
     * @Template
     */
    public function listconcertAction()
    {
        $concerts = $this->getDoctrine()->getRepository('AppBundle:Concert')->findAll();

        return array('concerts' => $concerts);
    }

    /**
     * @Route("/delete", name="concert_delete")
     * @Method("POST")
     */
    public function deleteconcertAction(Request $request)
    {
        if (!$concert = $this->getDoctrine()->getRepository('AppBundle:Concert')->findOneById($request->request->get('concert_id'))) {
            $this->addFlash('error', 'The concert you want to delete does not exist.');

            return $this->redirectToRoute('concert_list');
        }

        $csrf_token = new CsrfToken('delete_concert', $request->request->get('_csrf_token'));

        if ($this->get('security.csrf.token_manager')->isTokenValid($csrf_token)) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($concert);
            $em->flush();

            $this->addFlash('success', 'You have successfully deleted the concert.');
        } else {
            $this->addFlash('error', 'An error occurred.');
        }

        return $this->redirectToRoute('concert_list');
    }
}
