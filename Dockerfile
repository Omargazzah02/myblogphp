# Utiliser une image PHP avec FPM
FROM php:8.2-cli

# Installer les dépendances de base nécessaires
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
ENV PATH="$PATH:/root/.symfony*/bin"

# Copier les fichiers de ton projet dans l'image Docker
COPY . /var/www/symfony

# Définir le répertoire de travail
WORKDIR /var/www/symfony

# Installer les dépendances avec Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install 

# Exposer le port sur lequel Symfony va écouter
EXPOSE 8000

# Démarrer le serveur Symfony
CMD ["symfony", "serve:start", "--no-tls", "--port=8000"]
