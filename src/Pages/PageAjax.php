<?php


namespace Postyou\ContaoPageToAjaxBundle\Pages;




use Symfony\Component\HttpFoundation\Response;

class PageAjax extends \Contao\PageRegular
{

    /**
     * Initialize the object
     */
    public function __construct()
    {

        parent::__construct();

    }

    /**
     * Return a response object
     *
     * @param PageModel $objPage
     * @param boolean   $blnCheckRequest
     *
     * @return Response
     */
    public function getResponse($objPage, $blnCheckRequest=false)
    {
        $objLayout = $this->getPageLayout($objPage);
        $objPage->template = 'fe_page_ajax';
        $objLayout->template = 'fe_page_ajax';
        $this->createTemplate($objPage, $objLayout);

        $this->prepare($objPage);

        return $this->Template->getResponse($blnCheckRequest);
    }

    public function getArticleResponse($intArticle) {
        return new Response(self::getArticle($intArticle));
    }


    public function getAjaxUrl() {
        return '/ajax';
    }

}