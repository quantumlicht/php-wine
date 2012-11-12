#!/bin/bash
git add server
git commit -m "$1" server/
git push server master

