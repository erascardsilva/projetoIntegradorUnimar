# Projeto Integrador UNIMAR

## Descrição do Projeto

Este é um aplicativo desenvolvido para a matéria de Projeto Integrador da UNIMAR , sob a orientação do Prof. Douglas Rodrigues. O sistema permite que os usuários enviem críticas e sugestões. Os usuários podem inserir seu nome, WhatsApp e o texto da sugestão ou crítica. O sistema oferece funcionalidades de criação, edição, exclusão e visualização dos registros, assim fazendo todo o CRUD.

## Tecnologias Utilizadas

- **PHP** - Versão 8.1 -   (requisito)
- **HTML** -               (requisito)
- **CSS**  -               (requisito)
- **Bootstrap**
- **MySQL** - Versão 8.0 - (requisito) 
- **Docker**
- **Docker Compose**

## Ferramentas e Como Usar

### Usando XAMPP

1. **Instalação do XAMPP**
   - [Download do XAMPP](https://www.apachefriends.org/index.html)
   - Siga as instruções de instalação fornecidas na página do download.

2. **Configuração do Ambiente**
   - Extraia o conteúdo do projeto no diretório `htdocs` do XAMPP.
   - Configure o arquivo `.env` com as credenciais do MySQL do XAMPP.
   - Inicie o servidor Apache e MySQL através do painel de controle do XAMPP.

### Usando Docker Compose

1. **Instalação do Docker e Docker Compose**
   - [Docker](https://docs.docker.com/get-docker/)
   - [Docker Compose](https://docs.docker.com/compose/install/)

2. **Configuração do Ambiente**
   - Certifique-se de que o Docker e o Docker Compose estão instalados e em execução.
   - Navegue até o diretório do projeto e execute o seguinte comando para iniciar os containers:

     ```bash
     docker-compose up --build
     ```

   - Isso iniciará três containers: um para o PHP, um para o MySQL e uma rede para conectar os dois.

## Estrutura das Pastas do Projeto

- **`www/`** - Contém o código fonte do projeto e o dockerfile referente ao PHP. É importante notar que a maior parte do código e arquivos relacionados está dentro desta pasta.
- **`www/`** - Outros arquivos e diretórios do projeto.
- **`banco/`** - Contém o arquivo `init.sql` ou `criarbanco.sql` para criação do banco de dados e o dockerfile 
referente ao container MYSQL.

## Configuração do Banco de Dados

### Arquivo `.env`

O arquivo `.env` (encontra-se na pasta www) contém variáveis de ambiente para a configuração do banco de dados. Você precisará ajustar este arquivo para que ele funcione com o seu ambiente, seja no XAMPP ou Docker.Esta como padrao para Xampp, se for utilizar em docker favor verificar.

- Exemplo de configuração para XAMPP:

    ```env
    DB_HOST=localhost
    DB_USER=root
    DB_PASS=
    DB_NAME=projintegrador
    ```

- Exemplo de configuração para Docker Compose:

    ```env
    DB_HOST=db
    DB_USER=erasmo
    DB_PASS=3727
    DB_NAME=projintegrador
    ```
   O projeto ficara como padrao para testes em Xampp .

### Criação do Banco de Dados

Na pasta `banco`, há um arquivo chamado `init.sql` que contém o script para criar a tabela necessária para este projeto. Você pode importar este arquivo diretamente no MySQL para configurar o banco de dados automaticamente.

Detalhe o projeto já cria a database e as tabelas automaticamente só utilize se tiver algum problema

#### Estrutura da Tabela

Na execução do app se a tabela nao existir sera criada e mandara mensagem de conectado na tela de listagem e edição
dos dados..

O script `init.sql` criará a tabela `suggestions` com a seguinte estrutura:

cria database e seleciona..
```sql

CREATE DATABASE IF NOT EXISTS projintegrador;

USE projintegrador;

```
cria tabelas se não existir

```sql
CREATE TABLE IF NOT EXISTS suggestions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    whatsapp VARCHAR(20),
    suggestion_type ENUM('Sugestao', 'Critica') NOT NULL,
    suggestion TEXT NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

# Telas do aplicativo

- ### Tela Inicial

<img width = "1000px" src="https://github.com/user-attachments/assets/971562f7-efb7-47db-a388-a66551ff470a" >

- ### Tela incluir dados (nome,  whats, tipo de mensagem, mensagem) () CREATE

<img width = "1000px" src="https://github.com/user-attachments/assets/0792b927-2699-4720-87b0-14f1ede53e67">

- ### Tela de visualização (READ) com botoes em cada item para apagar e editar os dados salvos

<img width = "1000px" src="https://github.com/user-attachments/assets/45061e2d-8fc9-4175-bc0a-20f751308f78">

- ### Tela de edição de dados (UPDATE)
  
<img width = "1000px" src="https://github.com/user-attachments/assets/4bd715a4-2b4a-40dd-ad0f-2e2baa5decd6">

<img width = "1000px" src="https://github.com/user-attachments/assets/447acfeb-1f62-47d9-a411-1fce6ed02a18">

- ### Apagando dados selecionados (DELETE) mesma tela de visualização com o botao APAGAR

<img width = "1000px" src="https://github.com/user-attachments/assets/e2115a67-9a84-4482-90b6-2066cbbcc970">


 

