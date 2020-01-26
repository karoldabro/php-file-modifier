<?php

namespace Kdabrow\PhpFileModifier\General;

class Regex
{
    public static function firstWord(string $string): ?string
    {
        $matches = [];
        preg_match("/\w+/", $string, $matches);

        return array_shift($matches);
    }

    /**
     * Return first matching pattern
     *
     * @param string $pattern
     * @param string $subject
     *
     * @return string|null
     */
    public static function firstMatch(string $pattern, string $subject): ?string
    {
        if (preg_match($pattern, $subject, $matches)) {
            return array_shift($matches);
        }

        return null;
    }
}
