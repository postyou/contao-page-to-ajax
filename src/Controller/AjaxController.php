<?php


namespace Postyou\ContaoPageToAjaxBundle\Controller;

use Postyou\ContaoPageToAjaxBundle\Pages\PageAjax;
use Symfony\Component\HttpFoundation\Response;
use Contao\CoreBundle\Controller\FrontendController;
use Symfony\Component\Routing\Annotation\Route;



class AjaxController extends FrontendController
{
    /**
     * @Route("/ajax")
     *
     * @return Response
     */
    public function ajaxAction()
    {
        define('TL_MODE', 'FE');
        $this->get('contao.framework')->initialize();

        $pageAjax = new PageAjax();

        if (!empty(\Input::get('pageId'))) {
            $intPage = intval(\Input::get('pageId'));
            $objPage = \Contao\PageModel::findWithDetails($intPage);
        } else if (!empty(\Input::get('articleId'))) {
            $intArticle = intval(\Input::get('articleId'));
            //$objArticle = \Contao\ArticleModel::findByPid($intArticle);
            return $pageAjax->getArticleResponse($intArticle);
        }

        return $pageAjax->getResponse($objPage);





        //return new Response('Hello World!');
    }
}
