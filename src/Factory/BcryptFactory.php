<?php


namespace Oh86\Encrypt\Factory;


use Hyperf\Contract\ConfigInterface;
use Psr\Container\ContainerInterface;
use Oh86\Encrypt\Bcrypt;

class BcryptFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get(ConfigInterface::class);

        $round = $config->get('encrypt.bcrypt_round');

        return new Bcrypt($round);
    }
}