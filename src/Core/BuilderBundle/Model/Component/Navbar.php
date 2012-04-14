<?php

namespace Core\BuilderBundle\Model\Component;

class Navbar {
	
	private $fixed;
	
		
	public function getFixed(){
		return $this->fixed;
	}
	
	public function setFixed($fixed){
		$this->fixed = $fixed;
	}
	
	public function __toArray(){
		return Array(
			'fixed' => $this->fixed
		);
	}
	
}