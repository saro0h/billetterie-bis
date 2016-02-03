<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Type\ArticleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Csrf\CsrfToken;

/**
 * @Route("/admin/article")
 */
class ArticleController extends Controller
{
    /**
     * @Template
     * @Route("/new", name="article_new")
     */
    public function newAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            $this->addFlash('success', 'The article has been successfully added.');

            return $this->redirectToRoute('article_new');
        }

        return array('articleForm' => $form->createView());
    }

    /**
     * @Route(
     *     "/{id}",
     *     name="article_update",
     *     requirements={ "id" = "\d+"}
     * )
     * @Template("AppBundle:Article:new.html.twig")
     */
    public function updateAction(Request $request, Article $article)
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'The article has been successfully updated.');

            return $this->redirectToRoute(
                'article_update',
                array('id' => $article->getId())
            );
        }

        return array('articleForm' => $form->createView());
    }

    /**
     * @Route("/", name="article_list")
     * @Template
     */
    public function listAction()
    {
        $articles = $this->getDoctrine()->getRepository('AppBundle:Article')->findAll();

        return array('articles' => $articles);
    }

    /**
     * @Route("/delete", name="article_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request)
    {
        if (!$article = $this->getDoctrine()->getRepository('AppBundle:Article')->findOneById($request->request->get('article_id'))) {
            $this->addFlash('error', 'The article you want to delete does not exist.');

            return $this->redirectToRoute('article_list');
        }

        $csrf_token = new CsrfToken('delete_article', $request->request->get('_csrf_token'));

        if ($this->get('security.csrf.token_manager')->isTokenValid($csrf_token)) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($article);
            $em->flush();

            $this->addFlash('success', 'You have successfully deleted the article.');
        } else {
            $this->addFlash('error', 'An error occurred.');
        }

        return $this->redirectToRoute('article_list');
    }
}
