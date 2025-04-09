# Utiliser une image PHP avec FPM
FROM php:8.2-cli

# Installer les dépendances de base nécessaires pour Symfony
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    git \
    unzip \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Installer Symfony CLI (qui est nécessaire pour 'symfony serve:start')
RUN curl -sS https://get.symfony.com/cli/installer | bash

# Ajouter Symfony au PATH
ENV PATH="/root/.symfony*/bin:$PATH"

# Vérification de l'installation de Symfony CLI
RUN symfony -v

# Copier les fichiers du projet dans l'image Docker
COPY . /var/www/symfony

# Définir le répertoire de travail
WORKDIR /var/www/symfony

# Installer les dépendances avec Composer sans scripts automatiques
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-scripts

# Exposer le port où Symfony écoutera (par défaut 8000)
EXPOSE 8000

# Démarrer le serveur Symfony avec le serveur PHP intégré
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
