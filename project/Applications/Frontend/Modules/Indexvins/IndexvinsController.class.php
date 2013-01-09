<?php
namespace Applications\Frontend\Modules\Indexvins;

class IndexvinsController extends \Library\BackController
{
  public function executeIndex(\Library\HTTPRequest $request)
  {
    
    // On ajoute une définition pour le titre.
    $this->page->addVar('title', 'Index des vins');
    
    // Si le formulaire a été envoyé.
    if ($request->method() == 'POST')
    {
      $fichevin = new \Library\Entities\Fichevin(array(
        'nom' => $request->postData('nom'),
        'producteur' => $request->postData('producteur'),
        'annee' => $request->postData('annee'),
        'appelation' => $request->postData('appelation'),
        'pays' => $request->postData('pays')
      ));
    }
    else
    {
      $fichevin = new \Library\Entities\Fichevin;
    }
    
    $formBuilder = new \Library\FormBuilder\FichevinFormBuilder($fichevin);
    $formBuilder->build();
  
    $form = $formBuilder->form();
    $formHandler = new \Library\FormHandler($form, $this->managers->getManagerOf('Vins'), $request);
    
    if ($formHandler->process())
    {
      $this->app->user()->setFlash('La fiche de vin a bien été ajoutée, merci !');
      $this->app->httpResponse()->redirect('.');
    }
    
    $this->page->addVar('form', $form->createView());
  }
    
}
