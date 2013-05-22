<?php
namespace Applications\Frontend\Modules\Indexvins;

class IndexvinsController extends \Library\BackController
{
   public function executeIndex(\Library\HTTPRequest $request)
   {

      $this->page->addVar('title', 'Index des vins');

      $media_path= $this->app->config()->get('media_path');
      $manager = $this->managers->getManagerOf('Vins');
      $uploadManager = $this->managers->getManagerOf('Upload');

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
            'tag' => $request->postData('tag'),
            'fichier' =>$request->filesData('fichier')
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
         //--------------------------------------------------------------------------------------------------
         // FILE UPLOAD LOGIC
         // On effectue l'enregistrement dans la base la table des uploads, parce que l'on doit obtenir l'id du vin
         // auquel on va attacher une photo.
         if($fichevin->fichier()['error']>0)
         {
            $this->app->user()->setErrorFlash("Code d'erreur: " . $fichevin->fichier()["error"]);
            $this->app->httpResponse()->redirect('./indexvins.html');
         }
         else
         {
            if($uploadManager->fileExists($fichevin->fichier()['name']))
            {
               $this->app->user()->setErrorFlash('Cette photo existe déjà dans la base de données');
               $this->app->httpResponse()->redirect('./indexvins.html');
            }
            else
            {
               move_uploaded_file($fichevin->fichier()["tmp_name"],$media_path . $fichevin->fichier()["name"]);
               $arrname=explode(".", $fichevin->fichier()["name"]);
               $extension=end($arrname);
               $image_vin = new \Library\Entities\Upload(array(
                  'fullname'=>$fichevin->fichier()["name"],
                  'name'=>explode(".", $fichevin->fichier()["name"])[0],
                  'size'=>$fichevin->fichier()["size"],
                  'extension'=> $extension,
                  'file'=>file_get_contents($media_path . $fichevin->fichier()["name"]),
                  'ficheId'=>$fichevin->id()
                  ));

               $uploadManager->saveFile($image_vin);
            }
         }
         //---------------------------------------------------------------------------------------------------

         $this->app->user()->setFlash('La fiche de vin a bien été ajoutée, merci !');
         $this->app->httpResponse()->redirect('.');
      }

      $this->page->addVar('form', $form->createView());
   }

   //=============================================================================

   //=============================================================================

   public function executeCommentIndex(\Library\HTTPRequest $request)
   {
      $vins = $this->managers->getManagerOf('Vins')->getAll();

      $this->page->addVar('title', 'Index des vins');
      $this->page->addVar('listeVins', $vins);
   }

   //=============================================================================

   //=============================================================================
   public function executeSearch(\Library\HTTPRequest $request)
   {
      $this->page->addVar('title', 'Index des vins');
   }


   public function executeShowFiche(\Library\HTTPRequest $request)
   {

      $source = $request->getData('source');
      $fichevin = $this->managers->getManagerOf('Vins')->getFullRow($source);
      $this->page->addVar('fichevin', $fichevin);
      $this->page->addVar('title', 'Index des vins');

      $username = $this->app->user()->isAuthenticated() ?
      $this->app->user()->getAttribute('username'):
      self::ANONYM_USER;


      //TODO: rename source to source in the context of the comments manager and entity.
      if ($request->method() == 'POST')
      {
         $comment = new \Library\Entities\Comment(array(
           'source' => $source,
           'auteur' => $username,
           'contenu' => $request->postData('contenu')
         ));
      }
      else
      {
         $comment = new \Library\Entities\Comment;
      }

      $formBuilder = new \Library\FormBuilder\CommentFormBuilder($comment);
      $formBuilder->build('Commentaire sur ce vin');
      $form = $formBuilder->form();

      $formHandler = new \Library\FormHandler($form, $this->managers->getManagerOf('VinsComments'), $request);

      if ($formHandler->process())
      {
         $this->app->user()->setFlash('Le commentaire a bien été ajouté, merci !');
         $this->app->httpResponse()->redirect('fiche-'.$request->getData('source').'.html');
      }

      $this->page->addVar('commentForm', $form->createView());
   }
}
