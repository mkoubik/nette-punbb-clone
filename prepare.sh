#!/bin/sh

# Path to this script's directory
dir=$(cd `dirname $0` && pwd)

composer install --dev
chmod -R o+w $dir/temp $dir/log $dir/tests/tmp
cp $dir/App/config/config.local.neon.example $dir/App/config/config.local.neon
