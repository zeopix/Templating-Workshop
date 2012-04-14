<?php

namespace Core\BuilderBundle\Model;

class Node {
	
	private $name;
	
	private $attributes;
	
	private $items;
	
	private $content;
	
	public function __construct($name, $content=null, $attributes = Array(),$items = Array()){
		$this->name = $name; 
		$this->content = $content;
		$this->items = $items;
		$this->attributes = $attributes;
	}
	
	public function setAttribute($key,$value){
		$this->attributes[$key] = $value;
	}
	
	public function getAttribute($key){
		if(isset($this->attributes[$key])){
			return $this->attributes[$key];
		}else{
			return null;
		}
	}
	
	public function setAttributes($attributes){
		$this->attributes = $attributes;
	}
	
	public function setItems($attributes){
		$this->items = $attributes;
	}
	
	public function addItem($item){
		$this->items[] = $item;
	}
	
	public function setContent($attributes){
		$this->content = $attributes;
	}
	public function setName($attributes){
		$this->name = $attributes;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function getItems(){
		return $this->items;
	}
	
	public function getAttributes(){
		return $this->attributes;
	}
	
	public function getContent(){
		return $this->content;
	}
	
	
}