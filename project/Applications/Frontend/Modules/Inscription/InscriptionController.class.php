<?php
namespace Applications\Frontend\Modules\Inscription;

class InscriptionController extends \Library\BackController
{
  public function executeIndex(\Library\HTTPRequest $request)
  {

    // Si le formulaire a été envoyé.
    if ($request->method() == 'POST')
    {
      $inscription = new \Library\Entities\Inscription(array(
        'courriel' => $request->postData('courriel'),
        'utilisateur' => $request->postData('utilisateur'),
        'motdepasse' => $request->postData('motdepasse')
      ));
    }
    else
    {
      $inscription = new \Library\Entities\Inscription;
    }

    $formBuilder = new \Library\FormBuilder\InscriptionFormBuilder($inscription);
    $formBuilder->build();

    $form = $formBuilder->form();
    $formHandler = new \Library\FormHandler($form, $this->managers->getManagerOf('Inscriptions'), $request);

    if ($formHandler->process() )
    {
      $this->app->user()->setFlash('L\'inscription a bien été ajoutée, merci !');
      $this->app->httpResponse()->redirect('.');
    }

    $this->page->addVar('inscription', $inscription);
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'Formulaire d\'inscription');
  }

  public function executeLogin(\Library\HTTPRequest $request)
  {
    if ($request->method() == 'POST')
    {
      $login = new \Library\Entities\Inscription(array(
        'utilisateur' => $request->postData('utilisateur'),
        'motdepasse' => sha1($request->postData('motdepasse'))
        ));
      if ($this->managers->getManagerOf('Inscriptions')->isAuthenticated($login))
      {
        $this->app->user()->setAuthenticated(true);
        $this->app->user()->setAttribute('username',$request->postData('utilisateur'));
        $this->app->user()->setFlash('Bonjour '.$request->postData('utilisateur').'. Vous êtes connecté');
        $this->app->httpResponse()->redirect('.');
      }
      else
      {
        $this->app->user()->setFlash('Erreur de Connexion');
        $this->app->httpResponse()->redirect('.');
      }
    }
  }

}
