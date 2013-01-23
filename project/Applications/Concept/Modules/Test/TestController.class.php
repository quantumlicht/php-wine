<?php
namespace Applications\Concept\Modules\Test;

class TestController extends \Library\BackController
{

  public function executeIndex(\Library\HTTPRequest $request)
  {
    $this->page->addVar('title', 'Mécanique Générale');

    // $manager = $this->managers->getManagerOf('News');
  }


}
