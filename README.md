C'est un projet de gestion de produits. Un article signifie un produit dans mon projet.

Vous devez d'abord exécuter la commande composer install, puis configurez votre fichier .env et la variable DATABASE_URL. Ensuite, créez la base de données avec la commande : php bin/console doctrine:database:create
Créez les tables avec la commande suivante : php bin/console doctrine:schema:update --force
Maintenant, exécutez cette commande dans la boîte de requêtes MySQL :

sql
Copier le code
INSERT INTO category (name) 
VALUES ('exemple')

Ensuite, exécutez la commande dans le fichier articles.sql (vous trouverez ce fichier dans le répertoire de ce projet).

Puis, lancez le serveur avec la commande suivante : symfony serve:start
Créez un compte en naviguant vers register dans la barre de navigation, puis connectez-vous.

Nous avons une page d'accueil qui permet d'afficher les 3 articles les moins chers. Il y a également une page d'articles qui permet d'afficher tous les articles, et une page de détails d'article qui permet d'afficher les détails d'un article et de gérer les commentaires. Vous pouvez la consulter lorsque vous cliquez sur "Voir plus".

