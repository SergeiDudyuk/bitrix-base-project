#!/bin/sh

git add --all
git commit -m "Inner changes inside containers"
git pull
git checkout --theirs .
git commit -am "Remote Conflict"
git push