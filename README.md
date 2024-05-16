Iniciando o Projeto Backend

-   cp .env.example .env
-   composer install
-   php artisan key:generate
-   php artisan migrate
-   php artisan db:seed

Rodando o servidor

-   php artisan serve

Criando o token para um usuario

-   Acessar a rota: http://127.0.0.1:8000/tokens/create/5

Headers dos endpoints

-   Accept: application/json
-   Content-Type: application/json
-   Authorization: Bearer {token}

##Users

-   Listar
    GET http://127.0.0.1:8000/api/users

-   Gerar Token
    POST http://127.0.0.1:8000/api/user/token

```
{
"id": 3
}
```

##Tasks

-   Listar
    GET http://127.0.0.1:8000/api/tasks

-   Cadastrar
    POST http://127.0.0.1:8000/api/task

```
{
	"title": "Test 1 updated",
	"description": "Test one updated"
}
```

-   Editar
    PUT http://127.0.0.1:8000/api/task

```
{
	"id": 1,
	"title": "Test 1 updated",
	"description": "Test one updated"
}
```

-   Deletar
    DELETE http://127.0.0.1:8000/api/task

```
{
	"id": 1
}
```
