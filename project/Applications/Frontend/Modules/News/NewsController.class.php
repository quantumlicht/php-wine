<?php
namespace Applications\Frontend\Modules\News;

class NewsController extends \Library\BackController
{
  public function executeIndex(\Library\HTTPRequest $request)
  {
    $pageId= $request->getData('page')!=null?$request->getData('page'):0;
    $newsPerPage=$this->app->config()->get('news_per_page');
    $nombreCaracteres = $this->app->config()->get('nombre_caracteres');

    $manager = $this->managers->getManagerOf('News');

    $nb_news = $manager->getNbRows();
    $nb_page = $nb_news%$newsPerPage==0?intval($nb_news/$newsPerPage):intval($nb_news/$newsPerPage)+1;


    if($pageId>$nb_page)
    {
      $listeNews = $manager->getList(($nb_page-1)*$newsPerPage,$newsPerPage);
    }
    elseif($pageId==0)
    {
      $pageId=1;
      $listeNews = $manager->getList(0,$newsPerPage);
    }
    else
    {
      $listeNews = $manager->getList(($pageId-1)*$newsPerPage,$newsPerPage);
    }


    foreach ($listeNews as $news)
    {
      if (strlen($news->contenu()) > $nombreCaracteres)
      {
        $debut = substr($news->contenu(), 0, $nombreCaracteres);
        $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';

        $news->setContenu($debut);
      }
    }

    // On ajoute la variable $listeNews à la vue.
    $this->page->addVar('activePage',$pageId);
    $this->page->addVar('title', 'Nouvelles du site');
    $this->page->addVar('listeNews', $listeNews);
    $this->page->addVar('nb_page',$nb_page);
    $this->page->addVar('newsPerPage',$newsPerPage);
  }

  public function executeShow(\Library\HTTPRequest $request)
  {
    $news = $this->managers->getManagerOf('News')->getUnique($request->getData('id'));

    if (empty($news))
    {
      $this->app->httpResponse()->redirect404();
    }

    $this->page->addVar('title', $news->titre());
    $this->page->addVar('news', $news);
    $this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getListOf($news->id()));
  }

  public function executeInsertComment(\Library\HTTPRequest $request)
  {
    // Si le formulaire a été envoyé.
    if($this->app->user()->isAuthenticated())
    {
      $username = $this->app->user()->getAttribute('username');
    }
    else
    {
      $username = 'Anonyme';
    }

    if ($request->method() == 'POST')
    {
      $comment = new \Library\Entities\Comment(array(
        'news' => $request->getData('news'),
        'auteur' => $username,
        'contenu' => $request->postData('contenu')
      ));
    }
    else
    {
      $comment = new \Library\Entities\Comment;
    }

    $formBuilder = new \Library\FormBuilder\CommentFormBuilder($comment);
    $formBuilder->build();

    $form = $formBuilder->form();
    $formHandler = new \Library\FormHandler($form, $this->managers->getManagerOf('Comments'), $request);

    if ($formHandler->process())
    {
      $this->app->user()->setFlash('Le commentaire a bien été ajouté, merci !');
      $this->app->httpResponse()->redirect('news-'.$request->getData('news').'.html');
    }

    $this->page->addVar('comment', $comment);
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'Ajout d\'un commentaire');
  }

}
