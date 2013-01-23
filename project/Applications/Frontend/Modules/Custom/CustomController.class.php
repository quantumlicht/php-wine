<?php
namespace Applications\Frontend\Modules\Custom;

class CustomController extends \Library\BackController
{
	public function executeRedirect(\Library\HTTPRequest $request)
	{
    $route = $request->getData('lien');
		$this->app->httpResponse()->redirect($this->app->config()->get($route));

	}

	public function executeLogout(\Library\HTTPRequest $request)
	{
		$this->app->httpResponse()->deleteCookie($_COOKIE);
		$this->app->httpResponse()->redirect('.');

	}

   public function executeUpload(\Library\HTTPRequest $request)
   {
      $max_filesize = (int) $this->app->config()->get('max_upload');
      $media_path= $this->app->config()->get('media_path');
      $content='';

      if($request->method()=='POST')
      {
         $arr_filename = explode(".", $_FILES["file"]["name"]);
         $name = $arr_filename[0];
         $extension = end($arr_filename);
         if ($_FILES["file"]["size"] < $max_filesize)
         {
           if ($_FILES["file"]["error"] > 0)
           {
             $this->app->user()->setFlash("Return Code: " . $_FILES["file"]["error"] . "<br>");
           }
           else
           {
             $content.= "Upload: " . $_FILES["file"]["name"] . "<br>";
             $content.= "Type: " . $_FILES["file"]["type"] . "<br>";
             $content.= "Size: " . round($_FILES["file"]["size"] / pow(1024,2),2) . " Mb<br>";

             if (file_exists($media_path . $_FILES["file"]["name"]))
             {
               $this->app->user()->setFlash($_FILES["file"]["name"] . " already exists. ");
             }
             else
             {
               move_uploaded_file($_FILES["file"]["tmp_name"],
               $media_path . $_FILES["file"]["name"]);

               $upload_file = new \Library\Entities\Upload(array(
                  'fullname'=>$_FILES["file"]["name"],
                  'name'=>$name,
                  'size'=>$_FILES["file"]["size"],
                  'extension'=> $extension,
                  'file'=>file_get_contents($media_path . $_FILES["file"]["name"])
                  ));
               $this->managers->getManagerOf('Upload')->save($upload_file);
               $this->app->user()->setFlash("Fichier téléchargé avec succès!");


             }
           }
         }
         else
         {
           $this->app->user()->setFlash("Fichier invalide");
         }
      }
      else
      {
         $upload_file = new \Library\Entities\Upload;
      }
      $photo = $this->managers->getManagerOf('Upload')->get('random4');
      $this->page->addVar('maxfilesize',implode(' ',array((string)round($max_filesize/pow(1024,2)),'Mb')));
      $this->page->addVar('title', 'Upload d\'un fichier');
      $this->page->addVar('content',$content);
      $this->page->addVar('photo',$photo);
   }
}
