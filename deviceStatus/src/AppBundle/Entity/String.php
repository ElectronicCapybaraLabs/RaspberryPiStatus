<?php
// src/AppBundle/Entity/String.php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="Strings")
 */

class String
{
  /**
  * @ORM\Column(type="integer")
  * @ORM\Id
  * @ORM\GeneratedValue(strategy="AUTO")
  */
  private $ID;
  /**
  * @ORM\Column(type="text")
  */
  private $StringName;
  /**
  * @ORM\Column(type="text")
  */
  private $StringContent;

    /**
     * Get iD
     *
     * @return integer
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Set stringName
     *
     * @param string $stringName
     *
     * @return String
     */
    public function setStringName($stringName)
    {
        $this->StringName = $stringName;

        return $this;
    }

    /**
     * Get stringName
     *
     * @return string
     */
    public function getStringName()
    {
        return $this->StringName;
    }

    /**
     * Set stringContent
     *
     * @param string $stringContent
     *
     * @return String
     */
    public function setStringContent($stringContent)
    {
        $this->StringContent = $stringContent;

        return $this;
    }

    /**
     * Get stringContent
     *
     * @return string
     */
    public function getStringContent()
    {
        return $this->StringContent;
    }
}
