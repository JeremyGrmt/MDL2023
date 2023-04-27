use bdd_mdl_test;
insert into hotel(adresse, cp, mail, nom, tel, ville) values ('172 rue Pierre Mauroy', '59000','ibisBeffroi@mail.com','Ibis Styles', '0708091011', 'lille' );
insert into hotel(adresse, cp, mail, nom, tel, ville) values ('10 rue de Coutrai', '59000','ibisCentre@mail.com','Ibis Budget', '0102030405', 'lille' );

insert into categorie_chambre(libelle_categorie) values ('single + petit dejeuner');
insert into categorie_chambre(libelle_categorie) values ('double + petits dejeuners');

insert into proposer(hotel_id, categorie_id, tarif_nuite) values (1, 1, 61.20);
insert into proposer(hotel_id, categorie_id, tarif_nuite) values (1, 2, 62.20);

insert into proposer(hotel_id, categorie_id, tarif_nuite) values (2, 1, 112);
insert into proposer(hotel_id, categorie_id, tarif_nuite) values (2, 2, 122);