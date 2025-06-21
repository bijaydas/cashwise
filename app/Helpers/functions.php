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

if (! function_exists('randomize')) {
    function randomize(array $array): string
    {
        return $array[array_rand($array)];
    }
}

if (! function_exists('isValidDateFormat')) {
    function isValidDateFormat(string $date): bool
    {
        return preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $date) === 1;
    }
}
