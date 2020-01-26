<?php

namespace Kdabrow\PhpFileModifier\Regex;

class PhpFunctionRegex extends Regex
{
    const RETURN = "/\).*:.*[A-Za-z0-9]({| |$)/";
}
