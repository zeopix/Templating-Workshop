<?php

namespace Core\BuilderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Core\BuilderBundle\Entity\Node
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Node
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var array $attributes
     *
     * @ORM\Column(name="attributes", type="array")
     */
    private $attributes;

    /**
     * @var text $content
     *
     * @ORM\Column(name="content", type="text", nullable="true")
     */
    private $content;
    
    /**
     * @ORM\OneToMany(targetEntity="Node", mappedBy="parent",cascade={ "all" })
     **/
    private $items;

    /**
     * @ORM\ManyToOne(targetEntity="Node", inversedBy="items")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     **/
    private $parent;

	
	public function __construct($name, $content=null, $attributes = Array(),\Doctrine\Common\Collections\ArrayCollection $items = null){
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

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set attributes
     *
     * @param array $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Get attributes
     *
     * @return array 
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Set content
     *
     * @param text $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return text 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Add items
     *
     * @param Core\BuilderBundle\Entity\Node $items
     */
    public function addNode(\Core\BuilderBundle\Entity\Node $items)
    {
        $this->items[] = $items;
    }

    /**
     * Add items
     *
     * @param Core\BuilderBundle\Entity\Node $items
     */
    public function addItem(\Core\BuilderBundle\Entity\Node $items)
    {
        $this->items[] = $items;
    }

    /**
     * Add items
     *
     * @param Core\BuilderBundle\Entity\Node $items
     */
    public function setItems(\Core\BuilderBundle\Entity\Node $items)
    {
        $this->items = $items;
    }

    /**
     * Get items
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set parent
     *
     * @param Core\BuilderBundle\Entity\Node $parent
     */
    public function setParent(\Core\BuilderBundle\Entity\Node $parent)
    {
        $this->parent = $parent;
    }

    /**
     * Get parent
     *
     * @return Core\BuilderBundle\Entity\Node 
     */
    public function getParent()
    {
        return $this->parent;
    }
    
}