FROM mysql:8

COPY 00_init.sql /docker-entrypoint-initdb.d/00_init.sql
COPY 21_reply.sql /docker-entrypoint-initdb.d/21_reply.sql
COPY 22_favorite.sql /docker-entrypoint-initdb.d/22_favorite.sql
