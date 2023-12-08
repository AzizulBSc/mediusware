# Project Setup Guide

Follow these steps to set up the project:

1. Copy the `.env.example` file to create a new `.env` file:

    ```bash
    cp .env.example .env
    ```

2. Generate the application key:

    ```bash
    php artisan key:generate
    ```

3. Run database migrations:

    ```bash
    php artisan migrate
    ```

4. Start the development server:

    ```bash
    php artisan serve
    ```

5. Seed the database:

    ```bash
    php artisan db:seed
    ```

## User Credentials for Login

Use the following credentials for logging in:

- **Name:** John Doe
- **Email:** john@example.com
- **Password:** 123456
