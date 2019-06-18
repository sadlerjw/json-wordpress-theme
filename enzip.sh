#!/bin/bash

npx bower install
npx gulp less scripts
cd ..
rm json.zip
zip -r json.zip json-wordpress-theme/ -x json-wordpress-theme/bower_components/\* json-wordpress-theme/node_modules/\* json-wordpress-theme/scripts_src/\* json-wordpress-theme/css/\* \*.less json-wordpress-theme/.\*
