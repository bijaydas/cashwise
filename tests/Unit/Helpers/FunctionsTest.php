<?php

it('should return the default app name from env', function () {
    expect(title())->toBe(config('app.name'));
});

it('should return title with app name', function () {
    expect(title('Test'))->toBe(sprintf('Test | %s', config('app.name')));
});

it('should return title only', function () {
    expect(title('Test', false))->toBe('Test');
});

it('check valid date', function () {
    expect(isValidDateFormat('2021-01-01'))->toBe(true);
});

it('check invalid date', function () {
    expect(isValidDateFormat('2021-01-01-01'))->toBe(false);
});
