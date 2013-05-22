<?php
namespace Library;

abstract class BackController extends ApplicationComponent
{
  const ANONYM_USER = 'Anonyme';
  protected $action = '';
  protected $module = '';
  protected $page = null;
  protected $view = '';
  protected $managers = null;
  protected $login = '';
  public function __construct(Application $app, $module, $action)
  {
    parent::__construct($app);
    $this->managers = new Managers('PDO', PDOFactory::getMysqlConnexion());
    $this->page = new Page($app);

    $this->setModule($module);
    $this->setAction($action);
    $this->setView($action);

    $formBuilder = new \Library\FormBuilder\LoginFormBuilder(new \Library\Entities\Login);
    $formBuilder->build();

    $login = $formBuilder->form()->createView();
    $this->setLogin($login);
  }

  public function execute()
  {
    $method = 'execute'.ucfirst($this->action);

    if (!is_callable(array($this, $method)))
    {
      throw new \RuntimeException('L\'action "'.$this->action.'" n\'est pas définie sur ce module');
    }

    $this->$method($this->app->httpRequest());
  }

  public function login(){
    return $this->login;
  }

  public function page()
  {
    return $this->page;
  }

  public function setModule($module)
  {
    if (!is_string($module) || empty($module))
    {
      throw new \InvalidArgumentException('Le module doit être une chaine de caractères valide');
    }

    $this->module = $module;
  }

  public function setAction($action)
  {
    if (!is_string($action) || empty($action))
    {
      throw new \InvalidArgumentException('L\'action doit être une chaine de caractères valide');
    }

    $this->action = $action;
  }

  public function setLogin($login)
  {
    if (empty($login))
    {
      throw new \InvalidArgumentException('Le login doit être non vide');
    }

    $this->login = $login;
    $this->page->addVar('login',$login);

  }

  public function setView($view)
  {
    if (!is_string($view) || empty($view))
    {
      throw new \InvalidArgumentException('La vue doit être une chaine de caractères valide');
    }

    $this->view = $view;

    $this->page->setContentFile(__DIR__.'/../Applications/'.$this->app->name().'/Modules/'.$this->module.'/Views/'.$this->view.'.php');
  }
}
