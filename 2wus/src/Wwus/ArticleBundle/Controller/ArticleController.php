<?php

namespace Wwus\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    public function indexAction()
    {
        return $this->render('WwusArticleBundle::article.html.twig');
    }
}
