<?php
namespace AppBundle\Utils;
/**
 *
 */
class FileInteractor
{
  public static function ExecuteFileAndGetContents($path="")
  {
    $output = "";
    if($path != null)
    {
      $output = exec($path);
      return $output;
    }
    return $output;
  }
}

 ?>
