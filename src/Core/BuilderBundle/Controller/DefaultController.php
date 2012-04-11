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


class DefaultController extends Controller
{
    /**
     * @Route("/", name="builder_default_render")
     * @Template()
     */
    public function renderAction()
    {
    
    	$dir = __DIR__.'/../Resources/skeleton/';
    	$file = "index";
    	
    	//we open the schema file
    	$schema_raw = file_get_contents($dir . $file . '.yml'); 
		
		//we parse the schema
    	$yaml = new Parser();
    	$schema = $yaml->parse($schema_raw);    	

        return array('schema' => $schema);
    }
}
