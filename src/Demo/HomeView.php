<?php

namespace DealerEProcess\TheConstruct\Demo;

/**
 * Home View
 *
 */
class HomeView
{
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
				<meta name="google-signin-client_id" content="872235533570-h6al8us7v5kvkkv4mi4306ll97ar4v9e.apps.googleusercontent.com">
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
						<li class="pure-menu-item"><a href="#" class="pure-menu-link">Logout</a></li>
					</ul>
				</div>
			</div>
			<div class="splash-container">
				<div class="splash">
					<p class="splash-subhead">
						Login with your Google
						<!-- Display Google sign-in button -->
						<div id="gSignIn"></div>
					<form action="/login" method="post">
							<button class="btn btn-default col-lg-2 col-md-2 col-sm-4 col-xs-6" name="provider" type="submit" value="google">
							Google
							</button>
					</form>						

					</p>
				</div>
			</div>			
			</body>
			</html>
';
		}
		return $this->output;
	}
}
