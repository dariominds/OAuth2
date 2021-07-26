<?php

namespace DealerEProcess\TheConstruct\Demo;

/**
 * Controller class
 */
class Controller
{
	
	/**
	 * @var Service $service
	 */
	private $service;

	/**
	 * @var ViewBuilder $view_builder
	 */
	private $view_builder;
	
	/**
	 * Construct
	 *
	 * @param Service $service
	 * @param ViewBuilder $view_builder
	 */
	public function __construct(Service $service, ViewBuilder $view_builder)
	{
		$this->service = $service;
		$this->view_builder = $view_builder;
	}

	/**
	 * Show home page
	 *
	 * @return ViewBuilder
	 */
	public function showHome()
	{
		return $this->view_builder->buildHomeView();
	}

}
