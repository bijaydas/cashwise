<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\TransactionCategory;

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

    public function getCategory(): ?string
    {
        if (empty($this->category)) {
            return null;
        }

        $categories = TransactionCategory::getValuesForSelect();

        return collect(explode(',', $this->category))
            ->filter(function ($item) use ($categories) {
                return in_array($item, $categories);
            })
            ->join(',');
    }
}
