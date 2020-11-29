# Eficaz Product Classifier - API.

A Laravel API utilizing MySQL, Nginx and PHP inside a Docker application with CRUD implementations
for classifications problems of products.

# API Endpoints.
For a deeper dive into the documentation, check out the [docs](https://github.com/EficazProductClassifier/api/tree/main/docs) directory.
![Preview](public/images/routes.png?raw=true "Preview")

## Instalation
For the API dockerization I've utilized [Docker Compose](https://docs.docker.com/compose/).
Inside the root folder of the project, install his dependencies with the [composer](https://getcomposer.org/) command:
```sh
composer install
```

Prepare the `.env` file for environment variables for the project:
```sh
cp .env.example .env
```

Make sure the following variables are set and change them as you will, as they will be used in the docker build as well:
```json
    DB_CONNECTION
    DB_HOST
    DB_PORT
    DB_DATABASE
    DB_USERNAME
    DB_PASSWORD
```

Generate an API key for the project:
```sh
php artisan key:generate
```

Build all the docker images necessary for the project:
```sh
docker-compose up -d --build
```

Create the database:
```sh
php artisan migrate:fresh
```

When everything is ready, you can start the project server:
```sh
php artisan serve
```

If you want, you can run the test cases of the project with:
```sh
php artisan test
```

## TODO list:
- [x] Docker with (MySQL, Nginx and PHP).
- [x] Categories table.
- [x] Products table.
- [x] CRUD for Categories table.
- [x] CRUD for Products table.
- [x] Filter for each table respectively.
- [x] Paginate the results of requests with potentially response massive payloads.
- [x] Tests for the application.

