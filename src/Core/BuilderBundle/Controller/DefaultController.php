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
use Core\BuilderBundle\Entity\Node;
use Core\BuilderBundle\Form\SkeletonType;

class DefaultController extends Controller
{
    
     /**
     * @Route("/", name="builder_default_index")
     * @Template()
     */
    public function indexAction()
    {
    	return Array();
    }
     /**
     * @Route("/list", name="builder_default_list")
     * @Template()
     */
    public function listAction()
    {
		$em = $this->getDoctrine()->getEntityManager();
                
        $entity  = new Node('skeleton');
        $request = $this->getRequest();
        
        $form    = $this->createForm(new SkeletonType(), $entity);
		if($request->getMethod() == "POST"){

			$form->bindRequest($request);

	        if ($form->isValid()) {
        
            	$em->persist($entity);
            	$em->flush();

            	return $this->redirect($this->generateUrl('builder_default_index'));
            
        	}
        }
        
        $entities = $em->getRepository('CoreBuilderBundle:Node')->findByName('skeleton');

        return array(
            'entities' => $entities,
            'form'   => $form->createView()
        );
    }
    

    /**
     * @Route("/edit/{skeleton}", name="builder_default_edit")
     * @Template()
     */
    public function editModeAction($skeleton){
    	$session = $this->getRequest()->getSession();
    	$session->set('edit',true);
    	return $this->redirect($this->generateUrl('builder_default_render',Array('skeleton' => $skeleton )));
    }
    

    /**
     * @Route("/view/{skeleton}", name="builder_default_view")
     * @Template()
     */
    public function viewModeAction($skeleton){
    	$session = $this->getRequest()->getSession();
    	$session->set('edit',false);
    	return $this->redirect($this->generateUrl('builder_default_render',Array('skeleton' => $skeleton )));
    }


    /**
     * @Route("/render/{skeleton}", name="builder_default_render")
     * @Template()
     */
    public function renderAction($skeleton)
    {

		$em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('CoreBuilderBundle:Node')->find($skeleton);

        return array('skeleton' => $entity);
    }
    
   	public function oldRenderAction(){

    	$items = Array(
    		new Node('element','Home',Array('class'=>'active','href'=>'#')),
    	 	new Node('element','Deta',Array('href'=>'#')),
    		new Node('element','Salir',Array('href'=>'#'))
    	);
    	
    	$list = new Node('list');
    	$list->setAttribute('class','nav pull-right');
    	$list->setItems($items);
    	
    	$navbar = new Node('navbar');
    	$navbar->addItem($list);
    	$navbar->setAttribute('fixed',true);
    	$navbar->setAttribute('brand','MyBuilder');
		
		$spans = Array(
			new Node('span','Welcome!',Array('width'=>4)),
			new Node('span','Back!',Array('width'=>4)),
			new Node('span','Heeey!',Array('width'=>4))
		);
		
    	$row = new Node('row');
		$row->setItems($spans);
    	
    	$separator = new Node('hr');
    	
    	$container = new Node('container');
    	$container->addItem($row);
    	$container->addItem($separator);
    	
    	$skeleton = new Node('body');
    	$skeleton->addItem($navbar);
    	$skeleton->addItem($container);
    	
    	
    	$dir = __DIR__.'/../Resources/skeleton/';
    	$file = "index";
    	
    	//we open the schema file
    	$schema_raw = file_get_contents($dir . $file . '.yml'); 
		
		//we parse the schema
    	$yaml = new Parser();
    	$schema = $yaml->parse($schema_raw);   
    	
        return array('schema' => $skeleton);
   	}
}
