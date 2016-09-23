<?php
// src/AppBundle/Entity/Status.php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="Status")
 */
class Status
{
  /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
  private $ID;
  /**
  * @ORM\Column(type="decimal")
  */
  private $GPUTemp;
  /**
  * @ORM\Column(type="decimal")
  */
  private $CPUTemp;
  /**
  * @ORM\Column(type="decimal")
  */
  private $CPUFrequency;



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
     * Set gPUTemp
     *
     * @param string $gPUTemp
     *
     * @return Status
     */
    public function setGPUTemp($gPUTemp)
    {
        $this->GPUTemp = $gPUTemp;

        return $this;
    }

    /**
     * Get gPUTemp
     *
     * @return string
     */
    public function getGPUTemp()
    {
        return $this->GPUTemp;
    }

    /**
     * Set cPUTemp
     *
     * @param string $cPUTemp
     *
     * @return Status
     */
    public function setCPUTemp($cPUTemp)
    {
        $this->CPUTemp = $cPUTemp;

        return $this;
    }

    /**
     * Get cPUTemp
     *
     * @return string
     */
    public function getCPUTemp()
    {
        return $this->CPUTemp;
    }

    /**
     * Set cPUFrequency
     *
     * @param integer $cPUFrequency
     *
     * @return Status
     */
    public function setCPUFrequency($cPUFrequency)
    {
        $this->CPUFrequency = $cPUFrequency;

        return $this;
    }

    /**
     * Get cPUFrequency
     *
     * @return integer
     */
    public function getCPUFrequency()
    {
        return $this->CPUFrequency;
    }
}
