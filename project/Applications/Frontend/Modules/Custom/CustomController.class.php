<?php 
namespace Applications\Frontend\Modules\Custom;

class CustomController extends \Library\BackController
{
	public function executeRedirect(\Library\HTTPRequest $request)
	{
		$this->app->httpResponse()->redirect($this->app->config()->get('a-propos'));

	}

	public function executeLogout(\Library\HTTPRequest $request)
	{
		$this->app->httpResponse()->deleteCookie($_COOKIE);
		$this->app->httpResponse()->redirect('.');

	}
}
