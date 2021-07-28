<?php

namespace DealerEProcess\TheConstruct\Demo;

/**
 *  Service Class
 *
 *  Use to facilitate all the vehicle operations.
 */
class Service
{
	/** @var object $factory an instance of Factory class */
	private $factory;

	/** @var object $provider an instance of Provider class */
	private $provider;

	/**
	 * @method Constructor
	 *
	 * @param object $factory	contains the object or instance of Factory object.
	 * @param object $provider	contains the object or instance of Provider object.
	 *
	 * @throws InvalidArgumentException if the Validator class is not loaded
	 */
	public function __construct(Factory $factory, Provider $provider)
	{
		// initialize provider and factory
		$this->setProvider($provider);
		$this->setFactory($factory);
	}

	/**
	 * @method setProvider get and assigned the provider object to the provider property
	 *
	 * @throws InvalidArgumentException if the parameter is not a Provider object
	 */
	private function setProvider(Provider $provider)
	{
		if(!$provider instanceof Provider) {
			throw new \InvalidArgumentException('Parameter for setProvider method does not appear a Provider object');
		}

		$this->provider = $provider;
	}

	/**
	 * @method setFactory get and assigned the factory object to the factory property
	 *
	 * @throws InvalidArgumentException if the parameter is not a Factory object
	 */
	private function setFactory(Factory $factory)
	{
		if(!$factory instanceof Factory) {
			throw new \InvalidArgumentException('Parameter for setFactory method does not appear a Factory object');
		}

		$this->factory = $factory;
	}
	
	/**
	 * get access token from given access code
	 *
	 * @param string $code
	 * @return array
	 */
	public function getAccessToken($code)
	{
		return $this->provider->getAccessToken($code);
	}

	/**
	 * get Provider instance
	 *
	 * @return Provider object
	 */
	public function getProvider()
	{
		return $this->provider;
	}

	/**
	 * generate auth url function
	 *
	 * @return string $auth_url
	 */
	public function makeAuthUrl()
	{
		return $this->provider->getAuthUrl();
	}

	/**
	 * return a User class function
	 *
	 * @return User $user
	 */
	public function getUser()
	{
		if (isset($_SESSION['accessToken'])) {
			$this->provider->setAccessToken($_SESSION['accessToken']);
			$user_info = $this->provider->getUserInfo();

			$user = new User(
				$user_info['name'],
				$user_info['email'],
				$user_info['picture'],
				true
			);
		} else {
			$user = new User('', '', '', false);
		}
		return $user;

	}

	/**
	 * Logout user unset the session and revoke token
	 *
	 * @return void
	 */
	public function logOutUser()
	{
		if (isset($_SESSION['accessToken'])) {
			session_unset();
			session_destroy();
		}
		$this->provider->revokeToken();
	}

	/**
	 * set the access code in exchange for token function
	 *
	 * @param string $code
	 * @return void
	 */
	public function setAccessCode($code)
	{
		$token = $this->provider->getAccessToken($code);
		$this->provider->setAccessToken($token);
		$_SESSION["accessToken"] = $token;
	}
}

