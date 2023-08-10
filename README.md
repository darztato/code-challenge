# Code Challenge

This is the repository of Code Challenge.

---

## Requirements

- PHP `^8.1`
- [Composer](http://getcomposer.org)
- MySQL/MariaDB

---

## Installation

Install dependencies by running:

```sh
composer install
```

---

## Database Migration

Migrate Database by running:

```sh
php artisan migrate
```

---

## Database Seeder(optional)

Seed Database by running:

```sh
php artisan db:seed
```

---

## Run

Run the server in local:

```sh
php artisan serve
```

---

## Import from 3rd party API

Import customers from [RandomUser](https://randomuser.me/):

```sh
php artisan customer:import
or
run this post request
http://127.0.0.1:8000/customer/import
```

---

## List All Customer

To List all Customer Just run this get request:

```sh
http://127.0.0.1:8000/customer?per_page=5&page=1
```

## Read a Customer by Id

To List all Customer Just run this get request:

```sh
http://127.0.0.1:8000/customer/:customer
```

## Create a Customer

To List all Customer Just run this post request:

```sh
http://127.0.0.1:8000/customer
with form-data
city(required), country(required), email(required), first_name(required), last_name(required), gender(required), password(required), phone(required), username(required) and uuid(optional)
```

## Update a Customer

To List all Customer Just run this patch request:

```sh
http://127.0.0.1:8000/customer/:customer
with body
{
    "city": "test city1",
    "country": "test country1",
    "email": "test@email.com",
    "first_name": "test fname",
    "last_name": "test lname",
    "gender": "female",
    "password": "testpassword",
    "phone": "12312312312",
    "username": "testusername"
}
```

## Test

Run all test, simply run:

```sh
composer run test
or
php artisan test
```

To create test cases, kindly check our [CONTRIBUTING.md](CONTRIBUTING.md)

---

## Php-lint

To check the syntax of PHP files in parallel, simply run:

```sh
composer run php-lint
```

---

## Php-stan

To find errors in your code without actually running it, simply run:

```sh
composer run php-stan
```

---

## Event Sourcing Replay

To replay all the stored events:

```sh
php artisan event-sourcing:replay
```

---

###### Created and developed under Flexisource IT

---
