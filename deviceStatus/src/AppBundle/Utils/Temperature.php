<?php
namespace AppBundle\Utils;
class Temperature
{
	public function __construct($initialTemp)
	{
		$this->temperature = $initialTemp;
	}
	public function GetTemperature()
	{
		# code...
	}
	public $temperature = 0;
}
?>
