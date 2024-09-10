# Projeto Integrador - Erasmo Cardoso

# Imagem PHP com Apache
FROM php:8.1-apache

# Instalar a extensão mysqli
RUN docker-php-ext-install mysqli

# Instalar  adicionais 
RUN apt-get update && \
    apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Copia os arquivos do projeto para o diretório web
COPY www/ /var/www/html/

# Configurar permissões para o Apache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Configurar o Apache
RUN a2enmod rewrite

# Expor a porta 80 para acessar o Apache
EXPOSE 80

# Comando para iniciar o Apache em primeiro plano
CMD ["apache2-foreground"]
