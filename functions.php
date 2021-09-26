<?php
use Oh86\Encrypt\Sm3;
use Oh86\Encrypt\Sm4;
use Oh86\Encrypt\Bcrypt;
use Hyperf\Utils\ApplicationContext;

if (!function_exists("sm3")) {
    function sm3(string $str)
    {
        return ApplicationContext::getContainer()->get(Sm3::class)->encrypt($str);
    }
}

if (!function_exists("sm4_encrypt")) {
    function sm4_encrypt(string $str)
    {
        return ApplicationContext::getContainer()->get(Sm4::class)->encrypt($str);
    }
}

if (!function_exists("sm4_decrypt")) {
    function sm4_decrypt(string $str)
    {
        return ApplicationContext::getContainer()->get(Sm4::class)->decrypt($str);
    }
}

if (!function_exists("bcrypt")) {
    function bcrypt(string $str)
    {
        return ApplicationContext::getContainer()->get(Bcrypt::class)->encrypt($str);
    }
}