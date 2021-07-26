<?php

namespace DealerEProcess\TheConstruct\Demo;

use GuzzleHttp\Psr7\ServerRequest;
use DealerEProcess\TheConstruct\Demo\WebApplication;

class ApplicationBuilder
{
	public function buildWebApplication()
	{
		$request = $this->buildServerRequest();
		return new WebApplication($request);
	}

	private function buildServerRequest()
	{
		return ServerRequest::fromGlobals();
	}
}
