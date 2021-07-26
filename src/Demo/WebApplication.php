<?php

namespace DealerEProcess\TheConstruct\Demo;

use GuzzleHttp\Psr7\ServerRequest;

class WebApplication
{
	public function __construct(ServerRequest $request)
	{
		$this->request = $request;
	}

	private function buildService()
	{
		$configureProviders = include_once __DIR__.'/../../config/config.php';

		$builder = new ServiceBuilder();
		$service = $builder->buildService($configureProviders);

		return $service;
	}

	public function handle(ServerRequest $request)
	{
		$uri = $request->getUri();
		$path = $uri->getPath();
		$query = $request->getQueryParams();
		$method = $request->getMethod();

		$service = $this->buildService();

		$view_builder = new ViewBuilder;

		$path_segments = explode('/', $path);
		$route = $path_segments[1];

		$output_str = "";
		switch ($route)
		{
			case 'logout':
				session_unset();
				session_destroy();
				header('Location: /');

				break;
			case 'login':

				if ($method == "POST" ) {
					header('Location: ' . $service->makeAuthUrl());
				}

				break;
			case 'auth':

				$code = $query['code'];
				$token = $service->getAccessToken($code);
				$_SESSION["accessToken"] = $token;

				header('Location: /profile');

				break;
			case 'profile':

				if (!isset($_SESSION['accessToken'])) {
					header('Location: /');
				}

				$access_token = $_SESSION['accessToken'];
				$service->setAccessToken($access_token);

				$user_info = $service->getUserInfo();

				$user = [
					"fullname" => $user_info['name'],
					"email" => $user_info['email'],
					"pictureURL" => $user_info['picture']
				];

				$output_str = $view_builder->buildProfileView($user)->getHtmlOutput();
				break;
			default:

				$output_str = $view_builder->buildHomeView()->getHtmlOutput();
				break;
		}

		return $output_str;
	}

	public function run()
	{
		$response_str = $this->handle($this->request);

		echo $response_str;
	}
}
