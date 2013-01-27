<?php
namespace Applications\Frontend\Modules\Indexvins;

class IndexvinsController extends \Library\BackController
{
  public function executeIndex(\Library\HTTPRequest $request)
  {

    $this->page->addVar('title', 'Index des vins');
    $manager = $this->managers->getManagerOf('Vins');

    // Si le formulaire a été envoyé.
    if ($request->method() == 'POST')
    {

      $fichevin = new \Library\Entities\Fichevin(array(
        'nom' => $request->postData('nom'),
        'producteur' => $request->postData('producteur'),
        'annee' => $request->postData('annee'),
        'appelation' => $request->postData('appelation'),
        'pays' => $request->postData('pays'),
        'encepagement' => $request->postData('encepagement'),
        'region' => $request->postData('region'),
        'alcool' => $request->postData('alcool'),
        'date' => $request->postData('date'),
        'code_saq' => $request->postData('code_saq'),
        'prix' => $request->postData('prix'),
        'teinte' => $request->postData('teinte'),
        'nez_intensite' => $request->postData('nez_intensite'),
        'arome' => $request->postData('arome'),
        'nez_impression' => $request->postData('nez_impression'),
        'bouche_intensite' => $request->postData('bouche_intensite'),
        'persistance' => $request->postData('persistance'),
        'saveur' => $request->postData('saveur'),
        'acidite' => $request->postData('acidite'),
        'tanin' => $request->postData('tanin'),
        'bouche_impression' => $request->postData('bouche_impression'),
        'couleur' => $request->postData('couleur'),
        'tag' => $request->postData('tag')

      ));
    }
    else
    {
      $fichevin = new \Library\Entities\Fichevin;
    }

    $formBuilder = new \Library\FormBuilder\FichevinFormBuilder($fichevin);
    $formBuilder->build();

    $form = $formBuilder->form();
    $formHandler = new \Library\FormHandler($form, $manager, $request);

    if ($manager->wineExists($fichevin) || $manager->codeSaqExists($fichevin))
    {
      $this->app->user()->setErrorFlash('Ce vin existe déjà dans la base de données.');
      $this->app->httpResponse()->redirect('./indexvins.html');
    }

    if ($formHandler->process())
    {
      $this->app->user()->setFlash('La fiche de vin a bien été ajoutée, merci !');
      $this->app->httpResponse()->redirect('.');
    }

    $this->page->addVar('form', $form->createView());
  }

  public function executeCommentIndex(\Library\HTTPRequest $request)
  {
    $vins = $this->managers->getManagerOf('Vins')->getAll();

    $this->page->addVar('title', 'Index des vins');
    $this->page->addVar('listeVins', $vins);
  }

  public function executeSearch(\Library\HTTPRequest $request)
  {
    $this->page->addVar('title', 'Index des vins');
  }

}
