#!/bin/bash
cd /opt/lampp/htdocs/
git add server
git commit -m "$1" server/
git push origin master


cd /opt/lampp/var/mysql/
git add user_db
git commit -m"$2" user_db/
git push origin master
