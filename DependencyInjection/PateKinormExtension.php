<?php

namespace Pate\KinormBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Pate\Kinorm\Dbal\Db;


class PateKinormExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
			error_log("1=====>");
    }
}
