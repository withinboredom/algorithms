#!/bin/sh

docker run --rm -it -v $(pwd):/app -w /app registry.bottled.codes/base/php-cli:latest \
php vendor/bin/phpbench run tests --report='{"extends": "aggregate", "cols": ["subject", "mode", "worst", "best", "stdev", "mem_peak"]}'