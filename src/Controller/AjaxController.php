<?php


namespace Postyou\ContaoPageToAjaxBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class AjaxController
{
    /**
     * @Route("/ajax")
     *
     * @return Response
     */
    public function ajaxAction()
    {
        return new Response('Hello World!');
    }
}
