<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace Oh86\Encrypt;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                Sm3::class => Sm3::class,
                Sm4::class => Factory\Sm4Factory::class,
                Bcrypt::class => Factory\BcryptFactory::class,
            ],
            'commands' => [
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config.',
                    'source' => __DIR__ . '/../config/encrypt.php',
                    'destination' => BASE_PATH . '/config/autoload/encrypt.php',
                ],
            ],
        ];
    }
}
