# Project Title

This project is a test to PrimePass, an API Restful with Unit Tests

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

## Setup

Clone the repository
> git clone https://github.com/diogenesricardo/primetestapi

Switch to the repo folder
> cd laravel-realworld-example-app

Install all the dependencies using composer
> composer install

Copy the example env file and make the required configuration changes in the .env file
> cp .env.example .env

Generate a new application key
> php artisan key:generate

Run the database migrations (Set the database connection in .env before migrating)
> php artisan migrate

## How to Run

In repo folder
Start the local development server
> php artisan serve

## How to Test

In repo folder
>php vendor\phpunit\phpunit\phpunit

### You can now access the server at http://localhost:8000
