<?php
// src/AppBundle/Entity/Pin.php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="Pin")
 */
class Pin
{
  /**
  * @ORM\Column(type="integer")
  * @ORM\Id
  * @ORM\GeneratedValue(strategy="AUTO")
  */
  private $ID;
  /**
  * @ORM\Column(type="integer", length=100)
  */
  private $PinNumber; ///in BCM
  /**
  * @ORM\Column(type="string", length=100)
  */
  private $PinHeaderLocation; ///P1-XX
 /**
 * @ORM\Column(type="integer", length=2)
 */
  private $State;

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
     * Set pinNumber
     *
     * @param integer $pinNumber
     *
     * @return Pin
     */
    public function setPinNumber($pinNumber)
    {
        $this->PinNumber = $pinNumber;

        return $this;
    }

    /**
     * Get pinNumber
     *
     * @return integer
     */
    public function getPinNumber()
    {
        return $this->PinNumber;
    }

    /**
     * Set pinHeaderLocation
     *
     * @param string $pinHeaderLocation
     *
     * @return Pin
     */
    public function setPinHeaderLocation($pinHeaderLocation)
    {
        $this->PinHeaderLocation = $pinHeaderLocation;
        return $this;
    }

    /**
     * Get pinHeaderLocation
     *
     * @return string
     */
    public function getPinHeaderLocation()
    {
        return $this->PinHeaderLocation;
    }

    /**
     * Set state
     *
     * @param  $state
     *
     * @return Pin
     */
    public function setState($state)
    {
      if($state == 1 || $state == 0)
      {
        $this->State = $state;
      }else
      {
          $this->State = 0;
      }
      return $this;
    }

    /**
     * Get state
     *
     * @return
     */
    public function getState()
    {
        return $this->State;
    }
}
