<?php

namespace Differ\Differ;

use function Differ\Builder\builderTree;
use function Differ\Formatters\Formatters\renderDiff;
use function Differ\Parsers\parse;

function genDiff($pathToFileBefore, $pathToFileAfter, $format = 'pretty')
{
    $extensionFileBefore = pathinfo($pathToFileBefore, PATHINFO_EXTENSION);
    $extensionFileAfter = pathinfo($pathToFileAfter, PATHINFO_EXTENSION);

    $contentFromFileBefore = getContent($pathToFileBefore);
    $contentFromFileAfter = getContent($pathToFileAfter);

    $dataBefore = parse($extensionFileBefore, $contentFromFileBefore);
    $dataAfter  = parse($extensionFileAfter, $contentFromFileAfter);

    $tree = builderTree($dataBefore, $dataAfter);

    return renderDiff($format, $tree);
}

function getContent($pathToFile)
{
    $realPath = realpath($pathToFile);

    if (!$realPath) {
        throw new \Exception("wrong file path {$pathToFile}");
    }

    return file_get_contents($realPath);
}
