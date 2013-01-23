<?php
namespace Applications\Frontend\Modules\Ajax;

class AjaxController extends \Library\BackController
{
  public function executeAjax(\Library\HTTPRequest $request)
  {
    $couleur=$request->getData('couleur');
    $table=$request->getData('table');
    $method='get'.ucfirst($table);

    $manager = $this->managers->getManagerOf('Vins');

    if (!is_callable(array($manager, $method)))
    {
      throw new \RuntimeException('syntax error: method not available');
    }

    // Le ajax doit savoir s'il doit appeler le manager avec une couleur pour obtenir la requete
    $contents = $manager->$method($couleur);


    // BUILDING AJAX REQUEST
    $json = '['; // start the json array element
    $json_table = array();
    foreach ($contents as $content) {
        $json_table[] = '{"id":"'. $content['id'].'", "content": "'.$content[$table].'"}';
    }

    $json .= implode(',', $json_table); // join the objects by commas;

    $json .= ']'; // end the json array element
    exit('<head><meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" /></head>'.$json);
  }

  public function executeXml(\Library\HTTPRequest $request)
  {
    $var= $request->getData('xmlvar');
    $varContent = $this->app->config()->get($var);

    $json = '['; // start the json array element
    if(!empty($varContent)){
        // BUILDING AJAX REQUEST
        $json .= '{"id":"'. $var.'", "content": "'.$varContent.'"}';
        $json .= ']'; // end the json array element
    }
    else{
        //empty json
        $json .= ']';
    }

    exit($json);
  }

}
