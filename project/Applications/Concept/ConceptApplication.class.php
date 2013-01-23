<?php
namespace Applications\Concept;

class ConceptApplication extends \Library\Application
{
  public function __construct()
  {
    parent::__construct();

    $this->name = 'Concept';
  }

  public function run()
  {
    $controller = $this->getController();
    $controller->execute();

    $this->httpResponse->setPage($controller->page());
    $this->httpResponse->send();
  }
}
