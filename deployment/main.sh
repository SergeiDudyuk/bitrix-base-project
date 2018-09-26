#!/bin/sh

cd /var/www/project

sh ./deployment/git.sh
sh ./deployment/app.sh