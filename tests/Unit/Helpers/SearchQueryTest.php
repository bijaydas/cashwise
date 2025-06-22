<?php

declare(strict_types=1);

use App\Services\SearchQueryParser;

it('search-query: date', function () {
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

it('search-query: category', function () {
    expect((new SearchQueryParser('category:fake'))->getCategory())->toBeNull()
        ->and((new SearchQueryParser('category:'))->getCategory())->toBeNull();

    $result = (new SearchQueryParser('category:food,rent'))->getCategory();
    expect($result[0])->toBe('food')
        ->and($result[1])->toBe('rent');

    $result = (new SearchQueryParser('category:rent,shopping'))->getCategory();
    expect($result[0])->toBe('rent')
        ->and(count($result))->toBe(1);
});

it('search-query: amount', function () {
    expect((new SearchQueryParser('amount:1000'))->getAmount())->toBe('1000');

    $result = (new SearchQueryParser('amount:1000..2000'))->getAmount();
    expect($result[0])->toBe('1000')
        ->and($result[1])->toBe('2000')
        ->and((new SearchQueryParser('amount:..2000'))->getAmount())->toBe('2000')
        ->and((new SearchQueryParser('amount:'))->getAmount())->toBeNull();
});

it('search-query: type', function () {
    expect((new SearchQueryParser('type:'))->getType())->toBeNull()
        ->and((new SearchQueryParser('type:fake'))->getType())->toBeNull();

    $result = (new SearchQueryParser('type:debit,credit'))->getType();
    expect($result[0])->toBe('debit')
        ->and($result[1])->toBe('credit');

    $result = (new SearchQueryParser('type:credit,fake'))->getType();
    expect($result[0])->toBe('credit')
        ->and(count($result))->toBe(1);
});

it('search-query: method', function () {
    expect((new SearchQueryParser('method:'))->getMethod())->toBeNull()
        ->and((new SearchQueryParser('method:fake'))->getMethod())->toBeNull();

    $result = (new SearchQueryParser('method:cash,upi'))->getMethod();
    expect($result[0])->toBe('cash')
        ->and($result[1])->toBe('upi');
});
