
# Projeto Integrador - Erasmo Cardoso

#  imagem oficial do MySQL
FROM mysql:8.0

# Copia o arquivo init.sql para  inicialização do MySQL
COPY ./banco/init.sql /docker-entrypoint-initdb.d/

# Define permissões para o arquivo init.sql
RUN chmod 644 /docker-entrypoint-initdb.d/init.sql
