<?php

declare(strict_types=1);

use App\Services\SearchQueryParser;

it('should validate date in search query', function () {
    $query = 'date:2021-01-01';
    $parser = new SearchQueryParser($query);
    expect($parser->getDate())->toBe('2021-01-01');

    $query = 'date:2021-01-01..';
    $parser = new SearchQueryParser($query);
    expect($parser->getDate())->toBe('2021-01-01');

    $query = 'date:2021-01-01..2021-01-01';
    $parser = new SearchQueryParser($query);
    expect($parser->getDate())->toBe('2021-01-01');

    $query = 'date:..2021-01-01';
    $parser = new SearchQueryParser($query);
    expect($parser->getDate())->toBe('2021-01-01');

    $query = 'date:2025-06-20..2025-06-25';
    $parser = new SearchQueryParser($query);
    $result = $parser->getDate();
    expect($result[0])->toBe('2025-06-20')
        ->and($result[1])->toBe('2025-06-25');

    $query = 'date:    ';
    $parser = new SearchQueryParser($query);
    expect($parser->getDate())->toBeNull();

    $query = 'date:invalid_date';
    $parser = new SearchQueryParser($query);
    expect($parser->getDate())->toBeNull();

    $query = 'date:2025-100-200 ';
    $parser = new SearchQueryParser($query);
    expect($parser->getDate())->toBeNull();
});


