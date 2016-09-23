<?php
// src/AppBundle/Entity/Menu.php
namespace AppBundle\Entity;
/**
 * @ORM\Entity
 */
use Doctrine\ORM\Mapping as ORM;
class Menu
{
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $ID;
  /**
   * @ORM\OneToMany(targetEntity="MenuEntry", mappedBy="menu_entry")
   */
  private $MenuEntryIDFK;
  /**
   * @ORM\Column(type="string", length=15)
   */
  private $BackgroundColor;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->MenuEntryIDFK = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set backgroundColor
     *
     * @param string $backgroundColor
     *
     * @return Menu
     */
    public function setBackgroundColor($backgroundColor)
    {
        $this->BackgroundColor = $backgroundColor;

        return $this;
    }

    /**
     * Get backgroundColor
     *
     * @return string
     */
    public function getBackgroundColor()
    {
        return $this->BackgroundColor;
    }

    /**
     * Add menuEntryIDFK
     *
     * @param \AppBundle\Entity\MenuEntry $menuEntryIDFK
     *
     * @return Menu
     */
    public function addMenuEntryIDFK(\AppBundle\Entity\MenuEntry $menuEntryIDFK)
    {
        $this->MenuEntryIDFK[] = $menuEntryIDFK;

        return $this;
    }

    /**
     * Remove menuEntryIDFK
     *
     * @param \AppBundle\Entity\MenuEntry $menuEntryIDFK
     */
    public function removeMenuEntryIDFK(\AppBundle\Entity\MenuEntry $menuEntryIDFK)
    {
        $this->MenuEntryIDFK->removeElement($menuEntryIDFK);
    }

    /**
     * Get menuEntryIDFK
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMenuEntryIDFK()
    {
        return $this->MenuEntryIDFK;
    }
}
