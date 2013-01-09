<?php 
namespace Applications\Backend\Modules\Custom;

class CustomController extends \Library\BackController
{
	public function executeLogout(\Library\HTTPRequest $request)
	{
		$this->app->httpResponse()->deleteCookie($_COOKIE);
		$this->app->httpResponse()->redirect('.');

	}
}
