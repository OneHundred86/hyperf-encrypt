<?php


namespace Oh86\Encrypt\Factory;

use Hyperf\Contract\ConfigInterface;
use Psr\Container\ContainerInterface;
use Oh86\Encrypt\Sm4;

class Sm4Factory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get(ConfigInterface::class);

        $key = $config->get('encrypt.sm4_key');

        return new Sm4($key);
    }
}