<?php namespace Codesleeve\Executejs\Runtimes;

class NodeRuntime extends ExternalRuntime
{
	public function __construct()
	{	
		parent::__construct('node');
		$this->compile(__DIR__ . '/../Support/node_runtime.js');
	}
}