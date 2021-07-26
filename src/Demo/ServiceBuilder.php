<?php

namespace DealerEProcess\TheConstruct\Demo;

/**
 * Builds service, provider, and factory
 */
class ServiceBuilder
{
	/**
	 * Build service from socialConnect
	 *
	 * @param  array  $build_configuration
	 *
	 * @return $service
	 */
	public function buildService(array $build_configuration)
	{
		//$auth_config = json_encode($build_configuration['provider']['google']);

		$provider = new Provider($build_configuration);
		$factory = new Factory;

		$service = new Service($factory, $provider);

		return $service;
	}
}

