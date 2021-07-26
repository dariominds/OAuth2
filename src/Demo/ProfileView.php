<?php

namespace DealerEProcess\TheConstruct\Demo;

/**
 * Home View
 *
 */
class ProfileView
{
	// User object
	var $user;

	public function __construct($user)
	{
		$this->user = $user;
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
		$fullname = isset($this->user['fullname']) ? $this->user['fullname'] : "";
		$email = isset($this->user['email']) ? $this->user['email'] : "";
		$pictureURL = isset($this->user['pictureURL']) ? $this->user['pictureURL'] : "";
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
			</head>
			<body>
			<div class="header">
				<div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
					<a class="pure-menu-heading" href="">Dealer e-Process OAuth2.0 Demo</a>
			
					<ul class="pure-menu-list">
						<li class="pure-menu-item"><a href="https://github.com/dariominds/OAuth2" class="pure-menu-link">Github Source Code</a></li>
					</ul>
				</div>
			</div>
			<div class="splash-container">
				<div class="splash">
<img src="'.$pictureURL.'"> <br/>
Fullname: '.$fullname.' <br/>
Email: '.$email.' <br/><br/>
<form action="/logout" method="post">
<button class="btn btn-default col-lg-2 col-md-2 col-sm-4 col-xs-6" type="submit" value="logout">
Logout
</button>
</form>	
				</div>
			</div>			
			</body>
			</html>
';
		}
		return $this->output;
	}
}
