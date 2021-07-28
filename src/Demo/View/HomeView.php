<?php

namespace DealerEProcess\TheConstruct\Demo\View;

use DealerEProcess\TheConstruct\Demo\View\AssetsView;

/**
 * Home View
 *
 */
class HomeView
{

	var $user;

	public function __construct($user)
	{
		$this->user = $user;
	}
	
	private function getLogOutLink()
	{
		$logout_link = '';

		if ($this->user->getLogStatus()) {
			$logout_link = '<li class="pure-menu-item"><a href="/logout" class="pure-menu-link">Logout</a></li>';
		}

		return $logout_link;
	}

	private function getLoginButton()
	{
		$login_button = '';

		if (!$this->user->getLogStatus()) {
			$login_button = '
Login with your Google account
<!-- Display Google sign-in button -->
<form action="/login" method="post">
	<button class="btn btn-default col-lg-2 col-md-2 col-sm-4 col-xs-6 google_login_button" name="provider" type="submit" value="google">
	<div class="glogo"><img width="20px" alt="Google sign-in" 
	src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
	</div><div class="glabel">Login with Google</div>
	</button>
</form>	';
		} else {
			$login_button = '
You are currently Logged in <br/>
<form action="/logout" method="post">
<button class="btn btn-default col-lg-2 col-md-2 col-sm-4 col-xs-6" type="submit" value="logout">
Logout
</button>
</form>	';
		}

		return $login_button;		
	}

	/**
	 * @method getHtmlOutPut this will return an HTML formated text
	 *
	 * @return html
	 */
	public function getHtmlOutput()
	{
		$this->getOutput();		// get the processed html contents, this includes CSS and JS

		return $this->output;	// this will just return whatever the value of $output property.
	}

	/**
	 * @method getJsOutput this will contain a JavaScript specific for this page, use the AssetsView to put some common javascript
	 */
	public function getJsOutput()
	{
		return '';
	}

	/**
	 * getOutput function assemble css, js, and the html content
	 *
	 * @return html
	 */
	private function getOutput()
	{
		if (!isset($this->output)) {
			$this->output =
			AssetsView::getCssOutput().'
			<!doctype html>
			<html lang="en"> 
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta name="description" content="Dealer e-Process  OAuth2.0 Demo">
				<title>DEP OAuth2.0 Demo</title>
				<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
				' . AssetsView::getJsOutput() . '
			</head>
			<body>
			<div class="header">
				<div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
					<a class="pure-menu-heading" href="">Dealer e-Process OAuth2.0 Demo</a>
			
					<ul class="pure-menu-list">
						<li class="pure-menu-item"><a href="https://github.com/dariominds/OAuth2" class="pure-menu-link">Github Source Code</a></li>
						'.$this->getLogOutLink().'
					</ul>
				</div>
			</div>
			<div class="splash-container">
				<div class="splash">
					<p class="splash-subhead">'.$this->getLoginButton().'</p>
				</div>
			</div>	
			</body>
			</html>
';
		}
		return $this->output;
	}
}
