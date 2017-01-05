<?php

namespace Wwus\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TagsController extends Controller
{
    public function indexAction()
    {
        return $this->render('WwusArticleBundle:Tags:index.html.twig');
    }
}
