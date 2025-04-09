# Utiliser une image PHP avec FPM
FROM php:8.2-cli

# Installer les dépendances nécessaires pour Symfony et GD
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    git \
    unzip \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Installer Symfony CLI
RUN curl -sS https://get.symfony.com/cli/installer | bash

# Ajouter Symfony au PATH
ENV PATH="/root/.symfony*/bin:$PATH"

# Vérification de l'installation de Symfony CLI (afficher la version pour debugger)
RUN symfony -v

# Copier les fichiers du projet dans l'image Docker
COPY . /var/www/symfony

# Définir le répertoire de travail
WORKDIR /var/www/symfony

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installer les dépendances de Composer
RUN composer install --no-scripts --no-interaction

# Exposer le port 8000 pour l'application Symfony
EXPOSE 8000

# Démarrer le serveur Symfony avec le serveur PHP intégré
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
