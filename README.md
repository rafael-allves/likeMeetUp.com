# Task Management Project (Rafa_Events) - Laravel, Tailwind, and Vue.js

This is a project developed in PHP/Laravel, using the Tailwind CSS framework and the Vue.js JavaScript framework, with integration to the PostgreSQL database. The project is a social network events based like meetUp.com.

## Features

The project is a social midia app that allows users to:

- Create, view, edit, and delete events.
- join and exit events.
- Filter events by name.
- Create, view, edit, and delete Posts
- See others users profiles
- Edit their profile

## Requirements

- [PHP] (recommended version: PHP 7.4 or higher)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)
- [PostgreSQL](https://www.postgresql.org/)
- [Laravel](https://laravel.com/)
- [Tailwind CSS](https://tailwindcss.com/)
- [Vue.js](https://vuejs.org/)

## Installation

1. **Clone the project repository:**

    ```bash
    git clone https://github.com/starlordcraft/likemeetup.com.git
    cd project-name
    ```

2. **Install Composer dependencies:**

    ```bash
    composer install
    ```

3. **Install Node.js dependencies:**

    ```bash
    npm install
    ```

4. **Configure the PostgreSQL database:**

    Create a PostgreSQL database for the project and update the database settings in the `.env` file.

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

    Update the connection information in the `.env` file:

    ```
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=your_database
    DB_USERNAME=your_user
    DB_PASSWORD=your_password
    ```

5. **Run the database migrations:**

    ```bash
    php artisan migrate
    ```

## Running the Development Server

To run the development server, follow these steps:

1. Open a terminal window.

2. Navigate to the project directory:

    ```bash
    cd path/to/project-directory
    ```

3. Use vite bundler to compile components

    ```bash
    npm run dev
    ```

4. Start the Laravel development server:

    ```bash
    php artisan serve
    ```

5. Open a web browser and visit the following URL:

    ```
    http://localhost:8000
    ```

The application will now be accessible through the local development server. You can interact with it by visiting the provided URL in your web browser.

## Project Structure

|-- app
| |-- Http
| |-- Controllers
|-- database
| |-- migrations
|-- resources
| |-- js
| |  |
| |  |-- Components
| |  |-- functions
| |  |-- Layouts
| |  |-- Pages
| |  |-- app.js
| |  |-- bootstrap.js
| |-- views
| |  |-- app.blade.php
|-- routes
| |-- web.php
|-- tailwind.config.js
|-- package.json


## Development

The project uses the Laravel framework for the backend and Vue.js for the frontend. The project structure follows the MVC (Model-View-Controller) pattern.

- Frontend view files are located in `resources/js/Pages`.
- Route files are located in `routes/`.
- Controller files are located in `app/Http/Controllers`.

Vue.js JavaScript files are located in `resources/js`. The `app.js` file is the main entry point for the Vue application.

## Conclusion

This is an example project that demonstrates how to create a task management application using PHP/Laravel, Tailwind CSS, Vue.js, and PostgreSQL. Feel free to expand the project by adding more features, improving the design to make it more comprehensive and useful.
## License
 [MIT license](https://opensource.org/licenses/MIT).
