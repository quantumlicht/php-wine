<?php
namespace Applications\Backend\Modules\Task;

class TaskController extends \Library\BackController
{
   public function executeIndex(\Library\HTTPRequest $request)
   {
      $vinManager = $this->managers->getManagerOf('Vins');

      $cepageTask= $vinManager->getPending('encepagements');
      $tagTask = $vinManager->getPending('tags');


      $this->page->addVar('cepages', $cepageTask);
      $this->page->addVar('tags', $tagTask);

      $this->page->addVar('title', 'Tâches');

   }
   public function executeDelete(\Library\HTTPRequest $request)
   {
      $table=$request->getData('table');
      $id= $request->getData('id');

      $manager = $this->managers->getManagerOf('Vins');
      $manager->deleteRow($table,$id);
      $this->app->httpResponse()->redirect('./task.html');
   }

   public function executeApprove(\Library\HTTPRequest $request)
   {
      $table=$request->getData('table');
      $id= $request->getData('id');

      $manager = $this->managers->getManagerOf('Vins');
      $manager->modifyRow($table,$id,'status','approved');
      $this->app->httpResponse()->redirect('./task.html');
   }

}
