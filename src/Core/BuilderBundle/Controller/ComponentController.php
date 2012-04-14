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

//component form type's
use Core\BuilderBundle\Form\Component\NavbarType;

//component model's
use Core\BuilderBundle\Model\Component\Navbar;

class ComponentController extends Controller
{

    /**
     * @Template()
     */
    public function navbarAction($skeleton,$node)
    {
        return array('skeleton' => $skeleton, 'node'=>$node);
    }

    /**
     * @Template()
     */
    public function containerAction($skeleton,$node)
    {
        return array('skeleton' => $skeleton, 'node'=>$node);
    }

    /**
     * @Template()
     */
    public function rowAction($skeleton,$node)
    {
        return array('skeleton' => $skeleton, 'node'=>$node);
    }

    /**
     * @Template()
     */
    public function spanAction($skeleton,$node)
    {
        return array('skeleton' => $skeleton, 'node'=>$node);
    }

    /**
     * @Template()
     */
    public function listAction($skeleton,$node)
    {
        return array('skeleton' => $skeleton, 'node'=>$node);
    }

    /**
     * @Template()
     */
    public function elementAction($skeleton,$node)
    {
        return array('skeleton' => $skeleton, 'node'=>$node);
    }

    /**
     * @Template()
     */
    public function hrAction($skeleton,$node)
    {
        return array('skeleton' => $skeleton, 'node'=>$node);
    }

    /**
     * @Template()
     */
    public function addAction($skeleton,$node)
    {
        return array('skeleton' => $skeleton, 'node'=>$node);
    }

    /**
     * @Route("{skeleton}/component/{node}/add/{name}", name="builder_component_add")
     */
    public function createAction($skeleton,$node,$name)
    {
    	$em = $this->getDoctrine()->getEntityManager();
    	
    	$parent = $em->getRepository('CoreBuilderBundle:Node')->find($node);
    	$entity = new Node($name);
    	$entity->setParent($parent);
    	$parent->addNode($entity);
    	$em->persist($parent);
    	$em->persist($entity);
    	$em->flush();
    	
        return $this->redirect($this->generateUrl('builder_default_render',Array('skeleton'=>$skeleton)));
    }
    

    /**
     * @Route("{skeleton}/component/{node}/config", name="builder_component_config")
     * @Template()
     */
    public function configAction($skeleton,$node){
    	
    	$em = $this->getDoctrine()->getEntityManager();
    	
    	$entity = $em->getRepository('CoreBuilderBundle:Node')->find($node);
    	$config = new Navbar();
    	$configtype = new NavbarType();
    	
    	$request  = $this->getRequest();
    	$form = $this->createForm($configtype,$config);
    	
    	if($request->getMethod() == "POST"){
    		$form->bindRequest($request);
    		if($form->isValid()){
    			$attributes = $config->__toArray();
    			die(print_r($attributes));
    			$entity->setAttributes($attributes);
    			$em->persist($entity);
    			$em->flush();
    			return $this->redirect($this->generateUrl('builder_default_render',Array('skeleton'=>$skeleton)));
    		}
    		
    		//bind form
    		//save changes
    		//redirect to render	
    	}else{
    		return Array('form'=>$form->createView(),'skeleton'=>$skeleton,'node'=>$node);
    	}
    	
    }
}
