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

## Import from 3rd party API

Import customers from [RandomUser](https://randomuser.me/):

```sh
php artisan customer:import
```

---

## Test

Run all test, simply run:

```sh
composer run test
or
php artisan test
```

To create test cases, kindly check our [CONTRIBUTING.md](CONTRIBUTING.md)

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
