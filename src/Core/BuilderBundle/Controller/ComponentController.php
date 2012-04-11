<?php

namespace Core\BuilderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

//program
use Symfony\Component\Yaml\Parser;


class ComponentController extends Controller
{

    /**
     * @Template()
     */
    public function navbarAction($node)
    {
        return array('attributes'=>$node);
    }

    /**
     * @Template()
     */
    public function containerAction($node)
    {
        return array('attributes'=>$node);
    }

    /**
     * @Template()
     */
    public function rowAction($node)
    {
        return array('attributes'=>$node);
    }

    /**
     * @Template()
     */
    public function spanAction($node)
    {
        return array('attributes'=>$node);
    }

    /**
     * @Template()
     */
    public function addAction($node)
    {
        return array('attributes'=>$node);
    }
}
