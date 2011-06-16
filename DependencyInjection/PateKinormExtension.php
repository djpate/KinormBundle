<?php

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Pate\Kinorm\Dbal\Db;


class PateKinormExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
		foreach($configs as $conf){
			print_r($conf);
		}
    }

    public function getXsdValidationBasePath()
    {
        return __DIR__.'/../Resources/config/';
    }

    public function getNamespace()
    {
        return 'http://www.example.com/symfony/schema/';
    }
}
