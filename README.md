# API - Biblioteca

Aplicativo feito em Laravel

## 🚀 Começando

Essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento e teste.

Consulte **Instalação e configuração** para saber como implantar o projeto.

### 📋 Pré-requisitos

De que coisas você precisa para instalar o software e como instalá-lo?

```
Composer
PHP (8.3 ou superior)
Docker (Apenas desenvolvimento)
```

## Desenvolvimento Local

Este projeto utiliza o Laravel Sail para desenvolvimento local, que usa [Docker](https://www.docker.com/get-started). Você precisará garantir que o Docker esteja instalado e em execução na sua máquina.

### Configuração inicial

1. Copiar o arquivo de exemplo do ambiente:
```shell
cp .env.example .env
```

2. Instalar as dependências do Composer:
```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

3. Executar os seguintes comandos:
```shell
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed
```

4. A API deve estar disponível em [http://localhost](http://localhost).

#### Swagger

[L5-Swagger](https://github.com/DarkaOnLine/L5-Swagger)

5. Gerar Swagger (Usar apenas em desenvolvimento) ([WEB](http://localhost/web/documentation)) ([ADMIN](http://localhost/admin/documentation))
```bash
./vendor/bin/sail l5-swagger:generate --all
```

## 📦 Desenvolvimento

Acesse a aplicação na url: http://localhost



## Tests

Você pode executar toda a suíte de testes executando o seguinte comando:

```shell
make test
```
