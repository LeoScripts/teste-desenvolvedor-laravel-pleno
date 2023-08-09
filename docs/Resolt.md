<div align="center" id="top"> 
  <!-- <img src="./.github/app.gif" alt="Teste Desenvolvedor Laravel Pleno" /> -->

&#xa0;

  <!-- <a href="https://testedesenvolvedorlaravelpleno.netlify.app">Demo</a> -->
</div>

<h1 align="center">Teste Desenvolvedor Laravel Pleno</h1>

<p align="center">
  <img alt="Github top language" src="https://img.shields.io/github/languages/top/LeoScripts/teste-desenvolvedor-laravel-pleno?color=56BEB8">

  <img alt="Github language count" src="https://img.shields.io/github/languages/count/LeoScripts/teste-desenvolvedor-laravel-pleno?color=56BEB8">

  <img alt="Repository size" src="https://img.shields.io/github/repo-size/LeoScripts/teste-desenvolvedor-laravel-pleno?color=56BEB8">

  <img alt="License" src="https://img.shields.io/github/license/LeoScripts/teste-desenvolvedor-laravel-pleno?color=56BEB8">

  <!-- <img alt="Github issues" src="https://img.shields.io/github/issues/LeoScripts/teste-desenvolvedor-laravel-pleno?color=56BEB8" /> -->

  <!-- <img alt="Github forks" src="https://img.shields.io/github/forks/LeoScripts/teste-desenvolvedor-laravel-pleno?color=56BEB8" /> -->

  <!-- <img alt="Github stars" src="https://img.shields.io/github/stars/LeoScripts/teste-desenvolvedor-laravel-pleno?color=56BEB8" /> -->
</p>

<p align="center">
  <a href="#dart-sobre">sobre</a> &#xa0; | &#xa0; 
  <a href="#sparkles-funcionalidades">funcionalidades</a> &#xa0; | &#xa0;
  <a href="#rocket-tecnologias">tecnologias</a> &#xa0; | &#xa0;
  <a href="#white_check_mark-pre_requisitos">pre_requisitos</a> &#xa0; | &#xa0;
  <a href="#checkered_flag-executar_projeto">executar_projeto</a> &#xa0; | &#xa0;
  <a href="#memo-licença">licença</a> &#xa0; | &#xa0;
  <a href="https://github.com/LeoScripts" target="_blank">Author</a>
</p>

<br>

## :dart: sobre

Resolução do teste de Desenvolvedor Laravel Pleno

## :sparkles: funcionalidades

<!-- :heavy_check_mark: Feature 1;\
:heavy_check_mark: Feature 2;\
:heavy_check_mark: Feature 3; -->

- :heavy_check_mark: 1 criar projeto laravel basico

  - :heavy_check_mark: configurar o banco de dados
  - :heavy_check_mark: definir as migrations necessarias
  - :heavy_check_mark: definir modelos

- :heavy_check_mark: 2 CRUD `categorias`,`marcas` e `produtos`
- :heavy_check_mark: 3 autenticação de usuario com pacote do Laravel Breeze

- :heavy_check_mark: 4 relacionamento no eloquente

  - :heavy_check_mark: um para um => `produto-descrição`
  - :heavy_check_mark: um para muitos => `marca-produtos`
  - :heavy_check_mark: muito para muitos => `categorias-produtos`

- :heavy_check_mark: 5 Validação e tratamento de erros

  - :heavy_check_mark: criar formularios
  - :heavy_check_mark: implementar validações
  - :heavy_check_mark: tratar o erros com mensagens

- :heavy_check_mark: 6 middleware

- :heavy_check_mark: 7 testes automatizados PHPunit

- :heavy_check_mark: 8 E-mail e notificações

  - :heavy_check_mark: envio de e-mail
  - :heavy_check_mark: notificação para usuario

- :heavy_check_mark: implementar paginação

- :heavy_check_mark: eager loading(carregamento rapido)

- :heavy_check_mark: intens a mais
  - Popular banco com dados ao iniciar
    - User Admin
    - Marcas
    - Categorias

## :rocket: tecnologias

- [PHP](https://www.php.net/)
- [Laravel](https://laravel.com/)

## :white_check_mark: pre_requisitos

Para executar :checkered_flag:, você deve ter o [Git](https://git-scm.com), [PHP](https://www.php.net/), [Composer](https://getcomposer.org/) e [Node](https://nodejs.org/en/) instalados.

## :checkered_flag: executar_projeto

```bash
# Clone o projeto
$ git clone https://github.com/LeoScripts/teste-desenvolvedor-laravel-pleno

# Acesse o diretorio
$ cd teste-desenvolvedor-laravel-pleno

# Instale as dependencias
$ componser install && npm i

# crie a chave do projeto
$ php artisan key:generate
```

- configurações de acesso do `banco de dados` e `serviços de email`

```diff
- ATENÇÃO
+  Usei o Mysql e o Mailtrap mas fique a vontade pra usar o banco e serviço de email que você quiser
```

duplicar o aquivo `example.env` e renomear para `.env`

> no arquivo `.env` inseriri as seguites informações

```env
# Banco de dados
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=app-leandro_cavalcante
DB_USERNAME=root
DB_PASSWORD=senha

# Serviço de email
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=seu usario
MAIL_PASSWORD=senha
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

- criar tabelas no banco

```bash
php artisan migrate
```

- excutar o seeders

```bash
php artisan db:seed

```

- executar o servidor

```bash
$ php artisan serve
```

o projeto estara rodando em [http://localhost:8000](http://localhost:8000)

- para ter acesso as rotas de `categorias e marcas` e necessario estar logado como `admin` esse e usario root e pode ser modificado a qualquer momento

  - email: `admin@email.com`
  - senha: `123456`

- pra acesso de usuario comum e so acessar http://127.0.0.1:8000/ estando deslogado clicar em `Register` para criar um novo usuario(lembrando que o email e unico e nao pode ser igual a um já cadastrado)

## :memo: licença

Este projeto esta baseado na licença MIT. Para mais detalhes acesse [licença](LICENSE.md) .

Projeto desenvolvido por <a href="https://github.com/LeoScripts" target="_blank">Leandro Cavalcante</a>

&#xa0;

<a href="#top">Volta ao topo</a>
