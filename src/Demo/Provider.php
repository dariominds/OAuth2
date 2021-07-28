<?php

namespace DealerEProcess\TheConstruct\Demo;

use GuzzleHttp\Psr7\Request;
use Google\Client as Google_Client;
/**
 * Provider
 *
 * Google Client API for Oauth2.0
 *
 */
class Provider
{
	private $google_client;

	private $scopes = array(
		'email',
		'profile'
	);

	public function __construct($auth_config)
	{
		$this->setGoogleClient($auth_config);

		return $this;
	}

	private function setGoogleClient($auth_config)
	{
		$client = new Google_Client();
		$client->setApplicationName("OAuth 2.0 Demo");

		$client->setClientId($auth_config['provider']['google']['client_id']);
		$client->setClientSecret($auth_config['provider']['google']['client_secret']);
		$client->setRedirectUri($auth_config['redirectUri']);

		// restrict login on the specified domain only
		$client->setHostedDomain('dealereprocess.com');

		$client->setAccessType('offline');
		$client->setPrompt('select_account consent');
		$client->setScopes($this->scopes);

		// incremental authorization
		$client->setIncludeGrantedScopes(true);
	

		$this->google_client = $client;
	}

	public function getAuthUrl()
	{
		return $this->google_client->createAuthUrl();
	}

	public function getAccessToken($code)
	{
		return $this->google_client->fetchAccessTokenWithAuthCode($code);
	}

	public function setAccessToken($access_token)
	{
		$this->google_client->setAccessToken($access_token);
	}

	public function isTokenExpired()
	{
		if ($this->google_client->isAccessTokenExpired()) {
			$this->google_client->fetchAccessTokenWithRefreshToken($this->google_client->getRefreshToken());
			file_put_contents($TOKEN_FILE, json_encode($client->getAccessToken()));
		}
	}

	public function getUserInfo()
	{
		$oauth2 = new \Google_Service_Oauth2($this->google_client);
		$userInfo = $oauth2->userinfo->get();

		return $userInfo;
	}

	public function revokeToken()
	{
		$this->google_client->revokeToken();
	}
}

