<?php

namespace Differ\Formatters\Formatters;

use function Differ\Formatters\RenderJson\renderJson;
use function Differ\Formatters\RenderPlain\renderPlain;
use function Differ\Formatters\RenderPretty\renderPretty;

function renderDiff($format, $tree)
{
    switch ($format) {
        case 'pretty':
            return renderPretty($tree);
        case 'plain':
            return renderPlain($tree);
        case 'json':
            return renderJson($tree);
        default:
            throw new \Exception("Unknown format {$format}");
    }
}
