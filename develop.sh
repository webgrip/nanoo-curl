#!/usr/bin/env bash

if [ $# -gt 0 ];then
    case "$1" in
        "composer")
            shift
            docker run --rm -v $(pwd):/app -w /app composer $@
            ;;
        "start")
            docker build -t nanoo-curl . && docker run --rm -it -p 80:80 nanoo-curl
            ;;
    esac
else
    echo "Command not found."
fi
