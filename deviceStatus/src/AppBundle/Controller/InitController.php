<?php
//src/AppBundle/Controller/InitController.php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utils;
class InitController extends Controller
{
  /**
 * @Route("/initApp", name="initApp")
 */
  public function InitApp()
  {
    if($firstrun == 1)
    {
      return $this->render('init/init.php.twig', array(
        'message' => 'Initialising app with data'
      ));
    }
    else
    {

    }
  }
}

?>
