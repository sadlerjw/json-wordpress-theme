#!/bin/bash

npx gulp less scripts
cd ..
rm json.zip
zip -r json.zip json/ -x json/bower_components/\* json/node_modules/\* json/scripts_src/\* json/css/\* \*.less json/.\*
