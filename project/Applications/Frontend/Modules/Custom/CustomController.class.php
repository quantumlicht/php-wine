<?php 
namespace Applications\Frontend\Modules\Custom;

class CustomController extends \Library\BackController
{
	public function executeRedirect(\Library\HTTPRequest $request)
	{
		// echo $this->app->config()->get('a-propos');
		$this->app->httpResponse()->redirect($this->app->config()->get('a-propos'));

	}
}
