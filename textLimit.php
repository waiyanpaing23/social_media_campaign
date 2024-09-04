<?php

namespace MyNamespace;

trait TextLimit
{
    public static function limit_text($text, $limit = 200, $ellipsis = true)
    {
        if (strlen($text) <= $limit) {
            return $text;
        }

        $truncated = substr($text, 0, $limit);

        if ($ellipsis) {
            $truncated .= '...';
        }

        return $truncated;
    }
}