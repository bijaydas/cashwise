<?php

declare(strict_types=1);

if (! function_exists('title')) {
    function title(string $title = '', bool $appendAppName = true): string
    {
        $trimmed = trim($title);

        if ($trimmed) {
            if ($appendAppName) {
                return sprintf('%s | %s', $trimmed, config('app.name'));
            }

            return $trimmed;
        }

        return config('app.name');
    }
}
