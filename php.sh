#!/bin/sh
# @echo off
# sail php %#

path=$(printf '%s\n' "${PWD##*/}")
docker exec ${path}-laravel.test-1 php "$@"
return $?