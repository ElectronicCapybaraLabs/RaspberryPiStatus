<?php
//src/AppBundle/Controller/HomeController.php
namespace AppBundle\Controller;
use AppBundle\Utils;
use AppBundle\Entity\Pin;
use AppBundle\Entity\Status;
use AppBundle\Entity\String;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\HttpFoundation\Request;
class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function homeAction()
    {
        /*
        * I know that it its unsafe. Propose me another idea.
        */
        $path = \AppBundle\Utils\FileInteractor::ExecuteFileAndGetContents("pwd");
        $orm = $this->getDoctrine()->getManager();
        $commandOutput = \AppBundle\Utils\FileInteractor::ExecuteFileAndGetContents("/opt/vc/bin/vcgencmd measure_temp");
        $cpuCommandOutput = \AppBundle\Utils\FileInteractor::ExecuteFileAndGetContents("echo $((`cat /sys/class/thermal/thermal_zone0/temp`/1000))");
        $hostname = \AppBundle\Utils\FileInteractor::ExecuteFileAndGetContents("hostname");
        $actualCpuFrequency = \AppBundle\Utils\FileInteractor::ExecuteFileAndGetContents("lscpu | sed -n 9p");
        $parsedCommandOutput = substr($commandOutput, 5); ///cut temp
        $parsedCommandOutput = substr($parsedCommandOutput, 0,4); //now only the number
        $actualCpuFrequency = substr($actualCpuFrequency, 13);
        $actualStatus = new Status();
        $actualStatus->setGPUTemp($parsedCommandOutput);
        $actualStatus->setCPUTemp($cpuCommandOutput);
        $actualStatus->setCPUFrequency($actualCpuFrequency);
        $orm = $this->getDoctrine()->getManager();
        $orm->persist($actualStatus);
        $orm->flush();
        $title = $this->getDoctrine()->getRepository('AppBundle:String')->findOneBy(array(
          "StringName" => "siteTitle"
        ));
        return $this->render('home/home.php.twig', array(
          'title' => $title->getStringContent(),
          'gputemperature' => $parsedCommandOutput,
          'cputemperature' => $cpuCommandOutput,
          'hostname' => $hostname,
          'cpufrequency' => $actualCpuFrequency,
        ));
    }
    /**
     * @Route("/addPin", name="addPin")
     */
    public function pinAction(Request $request)
    {
      $pin = new Pin();
      $form = $this->createFormBuilder($pin)
        ->add('PinNumber', IntegerType::class)
        ->add('PinHeaderLocation', TextType::class)
        ->add('State', IntegerType::class)
        ->add('Save', SubmitType::class, array('label' => 'Add Pin'))
        ->getForm();

      $form->handleRequest($request);
      if($form->isSubmitted() && $form->isValid())
      {
        try
        {
          $pin = $form->getData();
          if($pin->getPinNumber() < 1)
            return $this->redirectToRoute("addPinFailure");
          $orm = $this->getDoctrine()->getManager();
          $orm->persist($pin);
          $orm->flush();
          return $this->redirectToRoute("addPinSuccess");
        } catch (Exception $e)
        {
          return $this->redirectToRoute("addPinFailure");
        }
      }
      return $this->render("home/gpio.php.twig", array(
        'form' => $form->createView(),
        'title' => "RaspiStatus",
      ));
    }
    /**
     * @Route("/addPinSuccess", name="addPinSuccess")
     */
    public function pinAddSuccessAction()
    {
      return $this->render("home/gpioSuccess.php.twig", array(
        'title' => "RaspiStatus",
      ));
    }
    /**
     * @Route("/addPinFailure", name="addPinFailure")
     */
    public function pinAddFailureAction()
    {
      return $this->render("home/gpioError.php.twig", array(
        'title' => "RaspiStatus",
      ));
    }
}
// {% for item in navigation %}
//   <li><a href="{{item.link}}">{{item.caption}}</a></li>
// {% endfor %}
?>
