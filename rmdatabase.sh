#! /usr/bin/sh

REPOSITORY_DIR_PATH=${PWD}
DB_DATA_DIR_PATH=${REPOSITORY_DIR_PATH}/docker/db/var_lib_mysql

if [ -e "${DB_DATA_DIR_PATH}" ]; then
    sudo rm -fr ${DB_DATA_DIR_PATH}
fi
