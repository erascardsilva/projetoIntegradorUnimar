# Projeto Integrador Extensionista
# Erasmo Cardoso da Silva 

# Dockerfile do projeto
FROM php:8.1-apache

# Instalar a extensão mysqli
RUN docker-php-ext-install mysqli

# Copia os arquivos do projeto para o diretório web
COPY www/ /var/www/html/

# Configurar o Apache
RUN chown -R www-data:www-data /var/www/html

# Exponha a porta 80 para acessar o Apache
EXPOSE 80
