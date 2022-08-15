<?php

namespace App\Service\InputParser;

interface InputParserInterface
{
    public function parse(string $content): Input;
}