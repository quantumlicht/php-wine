#!/bin/bash
db_vins="db_vins__`date +%Y-%m-%d`.sql"
echo $db_vins
/opt/lampp/bin/mysqldump -u root -pxns3hs1a db_vins > $db_vins 
mv $db_vins  /home/philippe/Ubuntu\ One/$db_vins


user_db="user_db__`date +%Y-%m-%d`.sql"
echo $user_db
/opt/lampp/bin/mysqldump -u root -pxns3hs1a user_db > $user_db 
mv $user_db  /home/philippe/Ubuntu\ One/$user_db
