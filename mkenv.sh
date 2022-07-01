#! /usr/bin/sh

REPOSITORY_DIR_PATH=${PWD}
ENV_FILE_PATH=${REPOSITORY_DIR_PATH}/.env
SAMPLE_ENV_FILE_PATH=${REPOSITORY_DIR_PATH}/sample.env
PHPDB_FILE_PATH=${REPOSITORY_DIR_PATH}/html/db.php
SAMPLE_PHPDB_FILE_PATH=${REPOSITORY_DIR_PATH}/sample.db.php

if [ -e "${ZIP_FILE_NAME}" ]; then
    echo 'zip file exists.' ${ZIP_FILE_NAME}
    exit;
fi

if [ ! -e "${ENV_FILE_PATH}" ]; then
    cp ${SAMPLE_ENV_FILE_PATH} ${ENV_FILE_PATH}
    cp ${SAMPLE_PHPDB_FILE_PATH} ${PHPDB_FILE_PATH}
fi

PASSWORD=`pwmake --help`

sed -i -e "s/{{MYSQL_ROOT_PASSWORD}}/${PASSWORD}/g" ${ENV_FILE_PATH}
sed -i -e "s/{{MYSQL_ROOT_PASSWORD}}/${PASSWORD}/g" ${PHPDB_FILE_PATH}
