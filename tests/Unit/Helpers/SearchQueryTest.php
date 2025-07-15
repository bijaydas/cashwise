<?php

declare(strict_types=1);

use App\Services\SearchQueryParser;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

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

it('search-query: orderBy', function () {

    $this->seed();

    expect((new SearchQueryParser('orderBy:'))->getOrderBy())->toBeNull()
        ->and((new SearchQueryParser('orderBy:fake'))->getOrderBy())->toBeNull();

    $result = (new SearchQueryParser('orderBy:id'))->getOrderBy();
    expect($result)->toBe('id');

    $result = (new SearchQueryParser('orderBy:date'))->getOrderBy();
    expect($result)->toBe('date');

    $result = (new SearchQueryParser('orderBy:type'))->getOrderBy();
    expect($result)->toBe('type');

    $result = (new SearchQueryParser('orderBy:category'))->getOrderBy();
    expect($result)->toBe('category');

    $result = (new SearchQueryParser('orderBy:amount'))->getOrderBy();
    expect($result)->toBe('amount');

    $result = (new SearchQueryParser('orderBy:method'))->getOrderBy();
    expect($result)->toBe('method');

    $result = (new SearchQueryParser('orderBy:created_at'))->getOrderBy();
    expect($result)->toBe('created_at');

    $result = (new SearchQueryParser('orderBy:updated_at'))->getOrderBy();
    expect($result)->toBe('updated_at');
});
