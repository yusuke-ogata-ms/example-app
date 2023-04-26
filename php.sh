#!/bin/sh
docker exec ${path}-laravel.test-1 php "$@"
return $?
