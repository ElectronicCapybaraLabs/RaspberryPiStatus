<?php
// src/AppBundle/Entity/MenuEntry.php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
*/
class MenuEntry
{
  /**
  * @ORM\Column(type="integer")
  * @ORM\Id
  * @ORM\GeneratedValue(strategy="AUTO")
  */
  private $ID;
  /**
  * @ORM\Column(type="string", length=50)
  */
  private $MenuEntryLabel;
  /**
  * @ORM\Column(type="text")
  */
  private $Destination;

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
     * Set menuEntryLabel
     *
     * @param string $menuEntryLabel
     *
     * @return MenuEntry
     */
    public function setMenuEntryLabel($menuEntryLabel)
    {
        $this->MenuEntryLabel = $menuEntryLabel;

        return $this;
    }

    /**
     * Get menuEntryLabel
     *
     * @return string
     */
    public function getMenuEntryLabel()
    {
        return $this->MenuEntryLabel;
    }

    /**
     * Set destination
     *
     * @param string $destination
     *
     * @return MenuEntry
     */
    public function setDestination($destination)
    {
        $this->Destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->Destination;
    }
}
