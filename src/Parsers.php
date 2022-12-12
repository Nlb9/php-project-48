<?php

namespace Differ\Parsers;

use Symfony\Component\Yaml\Yaml;

function parsJson($item){
    return json_decode($item);
}

function parsYaml($item){
    return Yaml::parse($item, Yaml::PARSE_OBJECT_FOR_MAP);
}

function parse($content, $format){
    switch ($format) {
        case 'json':
            return parsJson($content);
        case 'yaml':
        case 'yml':
            return parsYaml($content);
        default:
            throw new \Exception("Unknown format $format");
    }
}