/*v0.1.130415*/

/*==================================================================*/
/* Table : membre                                                   */
/*==================================================================*/

create table membre
(
	nom varchar(50) not null,
	prenom varchar(50) not null,
	pseudo varchar(50) not null,
	email varchar(50) not null,
	droit int not null,
	avatar varchar(50) not null,
	mdp varchar(50) not null,
	primary key(pseudo)
);

/*==================================================================*/
/* Table : article                                                  */
/*==================================================================*/

create table article
(
	id_article int not null auto_increment,
	titreArticle varchar(150) not null,
	corpsArticle TEXT not null,
  date_Article DATE not null,
  imageArticle varchar(50) not null,
  Mem_pseudo varchar(50) not null,
	primary key(id_article)
);

/*==================================================================*/
/* Table : commentaire                                               */
/*==================================================================*/

create table commentaire
(
  id_commentaire int not null auto_increment,
  PseudoCommentaire varchar(150) not null,
  corpsCommentaire TEXT not null,
  date_commentaire DATE not null,
  etat int not null,
  Art_id_article int not null,
  primary key(id_commentaire)
);
/*==================================================================*/
/* Table : Visite                                                   */
/*==================================================================*/

create table visite
(
  IP varchar(20),
  Date_visite DATETIME,
  Art_id_article int not null,
  primary key(IP,Date_visite,Art_id_article)
);

/*==================================================================*/
/* Table : catArt                                                */
/*==================================================================*/

create table catArt
(
  Cat_nomCategorie varchar(100) not null,
  Art_id_article int not null,
  primary key(Art_id_article,Cat_nomCategorie)
);

/*==================================================================*/
/* Table : categorie                                                */
/*==================================================================*/

create table categorie
(
	nomCategorie varchar(100) not null,
	primary key(nomCategorie)
);

/*==================================================================*/
/* Table : compteurVisiteur                                         */
/*==================================================================*/

create table compteurVisiteur
(
	date_Compteur DATE not null,
	ipUser varchar(50) not null,
  Art_id_article int not null,
	primary key(ipUser,Art_id_article)
);


/*==================================================================*/
/* Table : Like                                                   */
/*==================================================================*/

create table Likes
(
  idLikes int not null,
  pseudo varchar(50) not null,
  Art_id_article int not null,
  primary key(idLikes)
);

/*==================================================================*/
/* Table : Dislike                                                   */
/*==================================================================*/

create table Dislike
(
	idDislike int not null,
	pseudo varchar(50) not null,
  Art_id_article int not null,
	primary key(idDislike)
);