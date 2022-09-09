
# WORDPRESS REST API

Setup inicial para a criação de uma Rest API em WordPress
## Ambiente para WordPress facilmente

Para criar um ambiente em WordPress é necessario
- php >= 7.4
- apache
- MySQL

Para facilitar o processo podemos apenas instalar o "Local" que cria esse ambiente automaticamente
[Download](https://localwp.com/)


## Documentação da API

#### Acessar o endpoint padrão do WordPress

```http
  GET $BASE_URL/wp-json
```

#### Gerando Token para acessar da API

```http
  POST $BASE_URL/wp-json/jwt-auth/v1/token
```

| Params      | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `username`      | `string` | **Obrigatório**. O username é o mesmo de acesso ao admin do WP |
| `password`      | `string` | **Obrigatório**. A password é a mesma do acesso ao admin do WP |

#### Validando Token

```http
  POST $BASE_URL/wp-json/jwt-auth/v1/token/validate
```

| Authorization   | Tipo       | Descrição                                   |
| :----------     | :--------- | :------------------------------------------ |
| `Bearer Token`      | `string`   | **Obrigatório**. Usar token gerado |


#### Acessando endpoints customizados

```http
  GET $BASE_URL/wp-json/v1/api/product
```

| Authorization   | Tipo       | Descrição                                   |
| :----------     | :--------- | :------------------------------------------ |
| `Bearer Token`      | `string`   | **Obrigatório**. Usar token gerado |

## Theme structure

```sh
├── themes/your-theme-name/         # → Base do Tema
│   ├── advanced-custom-fields/     # → JSON do ACF gerado
│   ├── custom-post-type/           # → Todos os Custom Post Types do Projeto
│   ├── response/                   # → Padronizar quando necessario os retornos da API
│   ├── routes/                     # → Todas as rotas do wordpress e registros delas
│   ├── usecase/                    # → Regras de negocio (onde organizamos o retorno do endpoint)
│   ├── utils/                      # → Funções onde podemos utilizar durante o código
│   ├── functions.php               # → Arquivo padrão do wordpress onde importamos todos os outros arquivos
│   ├── index.php                   # → Default WordPress
│   ├── README.php                  # → DOC simples do projeto 
│   └── style.css                   # → Default WordPress
└──
```