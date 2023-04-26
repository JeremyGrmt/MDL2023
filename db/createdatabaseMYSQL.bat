@REM @echo off

set /p MYSQL_USER=UTILISATEUR MYSQL AVEC DROIT ADMIN :
set /p MYSQL_PASSWORD=Entrez le mot de passe de l'utilisateur :


set SQL_FILE=db\SQL\create_user_admin.sql
set SQL_FILE_2=db\SQL\create_user.sql

echo Execution du script SQL...

mysql -u %MYSQL_USER% -p%MYSQL_PASSWORD% < %SQL_FILE%

call symfony console doctrine:database:create --connection=databasecreator

mysql -u %MYSQL_USER% -p%MYSQL_PASSWORD% < %SQL_FILE_2%

echo Script SQL execute avec succes !