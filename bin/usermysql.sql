create user if not exists 'userMDL'@'localhost' identified by 'userMDL';
grant all privileges on bdd_mdl_test.* to 'userMDL'@'localhost';

create user if not exists 'databasecreator'@'localhost' identified by 'databasecreator';