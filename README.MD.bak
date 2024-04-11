# Symfony API Application Setup

This document outlines the setup process and operational guidance for the Symfony API application. This API is designed to handle vehicle offers including cars and motorcycles.

## Requirements

- PHP >= 8.2 (Tested with PHP 8.3.4)
- Composer
- Symfony CLI
- MySQL or a compatible database system

## Installation Steps

### 1. Clone the Repository

Start by cloning the repository to your local machine.

```bash
git clone https://github.com/jorjomir/application-for-selling-vehicles.git
cd application-for-selling-vehicles
```

### 2. Install Dependencies

Use Composer to install the required PHP packages:

```bash
composer install
```

### 3. Environment Setup

Copy the contents of `.env.local` to `.env`:

```bash
cp .env.local .env
```

Modify the `DATABASE_URL` within the `.env` file to match your database credentials:

```
# Example
DATABASE_URL="mysql://username:password@localhost:3306/databasename"
```

### 4. Database Setup

To set up the database, you have two options:

#### Option A: Using Doctrine Migrations

Run the following command to migrate the database:

```bash
php bin/console doctrine:migrations:migrate
```

#### Option B: Using SQL Script

Execute the `export.sql` script located in the root directory of the project in your database management tool.

### 5. Start the Server

First, ensure the Symfony CLI is installed. Then, start the local development server:

```bash
symfony server:start
```

This will start the server typically at `http://127.0.0.1:8000`.

## Testing the API

The API is intended to be interacted with as a headless system via API calls. To facilitate this:

### Import Postman Collection

1. Import the provided Postman collection and environment variables from the root directory of the project into Postman.
2. Use the collection to register a new user, log in to receive an API token, and perform actions such as adding car and motorcycle offers.

## Conclusion

Follow these steps to set up and start using the Symfony API application. Ensure that PHP and Symfony CLI are correctly installed and configured before beginning the installation. For any issues, refer to the Symfony and Composer documentation.

## ReactJs Application is blank. I didn't manage to start working on it