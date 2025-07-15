<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\TransactionCategory;
use App\Enums\TransactionMethod;
use App\Enums\TransactionType;
use Illuminate\Support\Facades\Schema;

class SearchQueryParser
{
    public function __construct(
        public string $query,
        public string $method = '',
        public string $category = '',
        public string $summary = '',
        public string $amount = '',
        public string $type = '',
        public string $date = '',
        public string $orderBy = '',
    ) {
        $this->setup();
    }

    private function setup(): void
    {
        $chunks = explode(' ', $this->query);

        foreach ($chunks as $chunk) {
            if (str_starts_with($chunk, 'date:')) {
                $this->date = str_replace('date:', '', $chunk);
            }

            if (str_starts_with($chunk, 'method:')) {
                $this->method = str_replace('method:', '', $chunk);
            }

            if (str_starts_with($chunk, 'category:')) {
                $this->category = str_replace('category:', '', $chunk);
            }

            if (str_starts_with($chunk, 'summary:')) {
                $this->summary = str_replace('summary:', '', $chunk);
            }

            if (str_starts_with($chunk, 'amount:')) {
                $this->amount = str_replace('amount:', '', $chunk);
            }

            if (str_starts_with($chunk, 'type:')) {
                $this->type = str_replace('type:', '', $chunk);
            }

            if (str_starts_with($chunk, 'date:')) {
                $this->date = str_replace('date:', '', $chunk);
            }

            if (str_starts_with($chunk, 'orderBy:')) {
                $this->orderBy = str_replace('orderBy:', '', $chunk);
            }
        }
    }

    public function getDate(): string|array|null
    {
        /**
         * If the date is blank
         */
        if (empty($this->date)) {
            return null;
        }

        /**
         * Check for range
         */
        if (str_contains($this->date, '..')) {
            $dates = explode('..', $this->date);

            $from = trim($dates[0]);
            $to = trim($dates[1]);

            if (isValidDateFormat($from) && isValidDateFormat($to)) {
                if ($from == $to) {
                    return $from;
                }

                return [$from, $to];
            }

            if (isValidDateFormat($from)) {
                return $from;
            }

            if (isValidDateFormat($to)) {
                return $to;
            }
        }

        if (isValidDateFormat($this->date)) {
            return $this->date;
        }

        return null;
    }

    public function getCategory(): ?array
    {
        if (empty($this->category)) {
            return null;
        }

        $categories = TransactionCategory::getValuesForSelect();

        $result = collect(explode(',', $this->category))
            ->filter(function ($item) use ($categories) {
                return in_array($item, $categories);
            })
            ->toArray();

        if (empty($result)) {
            return null;
        }

        return $result;
    }

    public function getAmount(): string|array|null
    {
        if (empty($this->amount)) {
            return null;
        }

        if (str_contains($this->amount, '..')) {
            $amounts = explode('..', $this->amount);
            if ($amounts[0] && $amounts[1]) {
                return [$amounts[0], $amounts[1]];
            }

            if ($amounts[0]) {
                return $amounts[0];
            }

            if ($amounts[1]) {
                return $amounts[1];
            }

            return null;
        }

        return $this->amount;
    }

    public function getType(): ?array
    {
        if (empty($this->type)) {
            return null;
        }

        $types = TransactionType::getValuesForSelect();

        $result = collect(explode(',', $this->type))
            ->filter(function ($item) use ($types) {
                return in_array($item, $types);
            })
            ->toArray();

        if (empty($result)) {
            return null;
        }

        return $result;
    }

    public function getMethod(): ?array
    {
        if (empty($this->method)) {
            return null;
        }

        $methods = TransactionMethod::getValuesForSelect();

        $result = collect(explode(',', $this->method))
            ->filter(function ($item) use ($methods) {
                return in_array($item, $methods);
            })
            ->toArray();

        if (empty($result)) {
            return null;
        }

        return $result;
    }

    public function getOrderBy(): ?string
    {
        $columns = Schema::getcolumnListing('transactions');

        if (! in_array($this->orderBy, $columns)) {
            return null;
        }

        return $this->orderBy;
    }
}
