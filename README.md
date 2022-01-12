# Desafio Kzas

## Tecnologias utilizadas
    - Laravel 8.78.1
    - VueJs 2.6

## Setup

### Clonar projeto
```bash
git clone https://github.com/gersonvinicius/desafio-kzas.git  
```
Entre na pasta do projeto e baixe as branchs:  

```bash
git branch -r | grep -v '\->' | while read remote; do git branch --track "${remote#origin/}" "$remote"; done
git checkout master
```

### Laravel
Entre na pasta do projeto e depois vá na pasta back-end, realize a instalação das dependências.

```bash
composer install
cp .env.example .env
```

Altere para as suas configurações de banco de dados e rode o comando:

```bash
php artisan key:generate
php artisan migrate:fresh --seed
```

Obs: O migrate com o seed irá gerar o seguinte email e senha de acesso
```bash
cto@admin.com
123456
```

Então inicie o servidor
```bash
php artisan serve
```

As urls da api do laravel estão configuradas para o prefixo:
```bash
http://127.0.0.1:8000/
```
Para o bom funcionamento do projeto adicione em seu .env APP_URL=http://127.0.0.1:8000

### VueJS
Entre na pasta do projeto e depois vá na pasta front-end, realize a instalação das dependências.
```bash
npm install
npm run serve
```
