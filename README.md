## Índice

- [Pré-requisitos](#pré-requisitos)
- [Instalação](#instalação)
- [Configuração](#configuração)
- [Executando o Projeto](#executando-o-projeto)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)

## Pré-requisitos

Antes de começar, certifique-se de ter os seguintes requisitos atendidos:

- PHP (versão 7.3 ou superior)
- Composer
- MySQL
- Git
- NodeJS

## Instalação

1. **Clone o repositório:**
    ```bash
    git remote add origin https://github.com/WangleyVieira/Cadastro-Produto.git
   ```

2. **Instale as dependências:**
  Versão do composer 2.7.7
    ```bash
    composer install
   ```

3. **Caso não tenha o NodeJS instalado:**
    Realizar a instalação v16.15.1

## Configuração

1. **Copie o arquivo de configuração .env.example para .env:**

   ```bash
    cp .env.example .env
   ```
2. **Gere a chave da aplicação:**

   ```bash
    php artisan key:generate
   ```
3. **Configure as informações do banco de dados no arquivo .env:**

   ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=sua_database
    DB_USERNAME=seu_usuario
    DB_PASSWORD=sua_senha
   ```
4. **Execute as migrações e as seeders para criar as tabelas no banco de dados:**

   ```bash
    php artisan migrate:fresh --seed
   ```

## Executando o Projeto
Para iniciar o servidor de desenvolvimento, utilize o seguinte comando:

```bash
  php artisan serve
```

O projeto estará disponível no endereço http://localhost:8000.

## Tecnologias Utilizadas

- Laravel 7
- PHP
- Composer
- MySQL

```bash
Esse guia cobre todos os aspectos necessários para configurar e executar o projeto Laravel, desde a clonagem do repositório até a instalação das dependências, configuração e execução do servidor de desenvolvimento. Além disso, inclui informações sobre tecnologias utilizadas.
```


