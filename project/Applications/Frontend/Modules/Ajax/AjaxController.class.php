<?php
namespace Applications\Frontend\Modules\Ajax;

class AjaxController extends \Library\BackController
{
  public function executeAjax(\Library\HTTPRequest $request)
  {

    $ajaxRequest = new \Library\Entities\AjaxRequest(array(
        'couleur'=>$request->getData('couleur'),
        'table'=>$request->getData('table'),
        'manager' => ucfirst($request->getData('manager')),
        'source'=>$request->getData('source')
    ));

    $method='get'.ucfirst($ajaxRequest->table());
    $manager = $this->managers->getManagerOf($ajaxRequest->manager());

    if (!is_callable(array($manager, $method)))
    {
      throw new \RuntimeException('Method called is not available');
    }
    $contents = $manager->$method($ajaxRequest);

    // BUILDING AJAX REQUEST
    // The response will return a full row in the db.
    // The caller needs to retrieve the fields he is interested in.
    $json = '['; // start the json array element.
    $json_table = array();
    foreach ($contents as $content) {
        $temp = array();
        $innerjson = '{';
        foreach($content as $key=>$value){
            if (!is_numeric($key)){
                $temp[] = '"'.$key.'":"'. $value.'"';
            }
        }
        $innerjson .= implode(',',$temp). '}';


        $json_table[] = $innerjson;
    }

    $json .= implode(',', $json_table); // join the objects by commas;

    $json .= ']'; // end the json array element
    exit('<head><meta http-equiv="Content-type" content="text/html; charset=utf8" /></head>'.$json);
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
