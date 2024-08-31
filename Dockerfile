# Projeto Integrador Extensionista
# Erasmo Cardoso da Silva 

# Dockerfile do projeto
FROM php:8.1-apache

# Aqui bo container instalar as extensões ..
RUN docker-php-ext-install mysqli

# Copia os arquivos do projeto para o diretório web
COPY www/ /var/www/html/

# Expoe o apache na porta 80
EXPOSE 80

