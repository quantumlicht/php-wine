<?php
namespace Applications\Frontend\Modules\Courriel;

class CourrielController extends \Library\BackController
{
  public function executeIndex(\Library\HTTPRequest $request)
  {
    if($request->method()=='POST')
    {
        var_dump($_POST);
        $courriel = new \Library\Entities\Courriel(array(
            'courriel'=> $request->postData('courriel'),
            'sujet'=> $request->postData('sujet'),
            'message'=> $request->postData('message')
            ));
        // $this->app->user()->setFlash("Thank you for using our mail form");
        var_dump($courriel);
        mail("guay.philippe@gmail.com",$courriel->sujet(),$courriel->message(),"From:".$courriel->courriel());
    }
    else
    {
        $courriel = new \Library\Entities\Courriel;
    }
    $formBuilder = new \Library\FormBuilder\CourrielFormBuilder($courriel);
    $formBuilder->build();
    $form = $formBuilder->form();

    // if($form->isValid())
    // {
        //if "email" is filled out, send email
        // $email = $request->postData('email') ;
        // $subject = $request->postData('sujet') ;
        // $message = $_REQUEST['message'] ;
        // mail("guay.philippe@gmail..com", $subject,
        // $message, "From:" . $email);
    // }
        // $this->app->httpResponse()->redirect('.');

    $this->page->addVar('title','Contact');
    $this->page->addVar('form',$form->createView());

  }

}
