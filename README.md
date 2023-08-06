Projeto de Gerenciamento de Tarefas (To-Do List) - Laravel, Tailwind e Vue.js

Este é um projeto de exemplo desenvolvido em PHP/Laravel, utilizando o framework CSS Tailwind e o framework JavaScript Vue.js, com integração ao banco de dados PostgreSQL. O projeto é uma aplicação simples de gerenciamento de tarefas (to-do list).
Requisitos

    PHP (versão recomendada: PHP 7.4 ou superior)
    Composer (https://getcomposer.org/)
    Node.js (https://nodejs.org/)
    PostgreSQL (https://www.postgresql.org/)
    Laravel (https://laravel.com/)
    Tailwind CSS (https://tailwindcss.com/)
    Vue.js (https://vuejs.org/)

Instalação

    Clonar o repositório do projeto:

bash

git clone https://github.com/seu-usuario/nome-do-projeto.git
cd nome-do-projeto

    Instalar as dependências do Composer:

bash

composer install

    Instalar as dependências do Node.js:

bash

npm install

    Configurar o banco de dados PostgreSQL:

Crie um banco de dados PostgreSQL para o projeto e atualize as configurações do banco de dados no arquivo .env.

bash

cp .env.example .env
php artisan key:generate

Atualize as informações de conexão no arquivo .env:

makefile

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=seu_banco_de_dados
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

    Executar as migrações do banco de dados:

bash

php artisan migrate

Executando o servidor de desenvolvimento

bash

php artisan serve

A aplicação estará disponível em http://localhost:8000.
Funcionalidades

O projeto é uma aplicação de gerenciamento de tarefas (to-do list) que permite ao usuário:

    Criar, visualizar, editar e excluir tarefas.
    Marcar tarefas como concluídas.
    Filtrar tarefas por status (concluídas / não concluídas).

Estrutura do Projeto

lua

|-- app
|   |-- Http
|       |-- Controllers
|           |-- TaskController.php
|-- database
|   |-- migrations
|       |-- 2023_08_01_000000_create_tasks_table.php
|-- resources
|   |-- js
|       |-- app.js
|   |-- views
|       |-- layout.blade.php
|       |-- tasks
|           |-- index.blade.php
|           |-- create.blade.php
|           |-- edit.blade.php
|-- routes
|   |-- web.php
|-- tailwind.config.js
|-- package.json

Desenvolvimento

O projeto utiliza o framework Laravel para a parte backend e o Vue.js para a parte frontend. A estruturação do projeto segue o padrão MVC (Model-View-Controller).

    Os arquivos de visão (frontend) estão localizados em resources/views.
    Os arquivos de rota estão localizados em routes/web.php.
    Os arquivos de controle estão localizados em app/Http/Controllers.

Os arquivos JavaScript do Vue.js estão localizados em resources/js. O arquivo app.js é o ponto de entrada principal para a aplicação Vue.
Conclusão

Este é um projeto de exemplo que demonstra como criar uma aplicação de gerenciamento de tarefas utilizando PHP/Laravel, Tailwind CSS, Vue.js e PostgreSQL. Sinta-se à vontade para expandir o projeto, adicionando mais funcionalidades, melhorando o design ou implementando autenticação de usuários para torná-lo mais completo e útil.

## License
 [MIT license](https://opensource.org/licenses/MIT).
