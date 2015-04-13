/*Pas finit manque cle etrangere  v0.0.130415*/

/*==================================================================*/
/* Table : membre                                                   */
/*==================================================================*/

create table membre
(
	id_membre int not null auto_increment,
	nom varchar(50) not null,
	prenom varchar(50) not null,
	pseudo varchar(50) not null,
	email varchar(50) not null,
	droit int not null,
	avatar varchar(50) not null,
	mdp varchar(50) not null,
	primary key(id_membre)
);

/*==================================================================*/
/* Table : article                                                   */
/*==================================================================*/

create table article
(
	id_article int not null auto_increment,
	titreArticle varchar(150) not null,
	corpsArticle TEXT not null,
  date_Aticle DATE not null,
	primary key(id_article)
);

/*==================================================================*/
/* Table : commentaire                                                   */
/*==================================================================*/

create table commentaire
(
	id_commentaire int not null auto_increment,
	titreCommentaire varchar(150) not null,
	corpsCommentaire TEXT not null,
  date_commentaire DATE not null,
  etat int not null,
	primary key(id_commentaire)
);

/*==================================================================*/
/* Table : categorie                                                   */
/*==================================================================*/

create table categorie
(
	nomCategorie varchar(100) not null,
	primary key(nomCategorie)
);

/*==================================================================*/
/* Table : compteurVisiteur                                                   */
/*==================================================================*/

create table compteurVisiteur
(
	pseudoUser varchar(100) not null,
	date_Compteur DATE not null,
	ipUser varchar(50) not null,
	TitreArticle varchar(150) not null,
	primary key(ipUser,TitreArticle)
);


/*==================================================================*/
/* Table : Like                                                   */
/*==================================================================*/

create table Likes
(
	idLikes int not null,
	pseudo varchar(50) not null,
	primary key(idLikes)
);

/*==================================================================*/
/* Table : Dislike                                                   */
/*==================================================================*/

create table Dislike
(
	idDislike int not null,
	pseudo varchar(50) not null,
	primary key(idDislike)
);