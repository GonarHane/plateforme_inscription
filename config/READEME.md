Documentation de la solution de gestion des inscriptions
Notre plateforme de gestion des inscriptions présente les spécifications suivantes.
Les technologies utilisées
Pour la mettre sur pied ; nous avons utilisé différentes technologies ;
Du HTML pour structurer nos différentes interfaces.
Du CSS pour lui donner du style ;
Du JavaScript pour dynamiser les pages
Du PHP pour dialoguer avec notre base de données.
MySQL  pour notre base de données.

L’architecture utilisée est de type MVC et pour le versionning nous avons utilisé Git et Git Hub.
La description du fonctionnement de la plateforme
La plateforme est composée d’une page de connexion qui constitue notre index.

Se connecter à la plateforme
Ici l’utilisateur se connecte en remplissant nos adresse email et son mot de passe avant de cliquer sur le bouton « se connecter ». A partir de là on distingue deux autres pages selon le profil de l’usager :
Pour l’ « utilisateur »
Si l’utilisateur connecté est un « utilisateur », il aura accès à une page avec les spécifications suivantes :
Son nom, son prénom, sa matricule ainsi que sa photo s’affichent sur l’entête ainsi qu’une barre de recherche et un bouton de déconnection. L’utilisateur pourra consulter la liste des usagers actifs avec leur nom, prénom, et date d’ajout.


Pour l’ « administrateur »
Si l’usager connecté est un « administrateur », une page s’affiche dès qu’il appuie sur le bouton se « connecter » avec les colonnes suivantes ;
Son nom, son prénom, son numéro de matricule son mentionnés sur l’entête ainsi qu’une barre de recherche pour trouver des usagers selon leur nom, prénom, adresse email et le bouton « se déconnecter ». en plus il aura accès à la liste des usagers actifs et inactifs.

Dans le tableau des utilisateurs actifs, l’administrateur pourra mettre à jour  les informations des autres usagers, archiver un utilisateur, grâce aux boutons prévus à ces effets.
L’administrateur pourra aussi rechercher les usagers selon leur nom, prénom, adresse email. 
Le bouton se déconnecter le ramène sur la page de connexion (index).

L’inscription sur la plateforme
Pour pouvoir figurer sur la plateforme et se connecter, l’usager devra remplir un formulaire d’inscription en cliquant sur le bouton inscription de la page index.
Le formulaire d’inscription comprend les champs suivants : le nom, le prénom, l’adresse email, le rôle, un mot de passe avec ma confirmation, le champ photo ; les champs comportant un Astérix sont  nécessaire.
