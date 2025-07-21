# Cashwise

Cashwise is a simple, developer-friendly application designed for families to manage finances, track expenses, and gain insights into cash flow.

## Features

- **Expense Tracking:** Add, edit, and categorize expenses.
- **Income Management:** Record and monitor multiple streams of income.
- **Budget Planning:** Set monthly budgets and receive notifications when approaching limits.
- **Insightful Reports:** Visualize spending patterns and generate reports.

## Tech Stack

- Laravel
- Livewire
- Tailwind CSS
- MySQL
- Pest

## Installation

```bash

git clone git@github.com:bijaydas/cashwise.git

cd cashwise

composer install

pnpm install && pnpm run build

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan db:seed

php artisan serve
```

Visit [http://localhost:8000](http://localhost:8000) to view the app.


## ```.env``` variable

After copying `.env.example` to `.env`, configure the following variables:

```
APP_NAME=Cashwise
APP_URL=http://localhost:8000
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## Running Tests

```bash
# Run unit and feature tests with Pest
./vendor/bin/pest
```


## License

This project is licensed under the [MIT License](LICENSE).

## Support

For questions, issues, or feature requests, please open an [issue](https://github.com/bijaydas/cashwise/issues) or contact the maintainer.