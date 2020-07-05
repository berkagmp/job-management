# Installation

## Clone Repository
git clone https://github.com/berkagmp/job-management.git

cd job-management

## Install Composer Pachages
composer install

## Install NPM Modules
npm install

npm run production

## Setting .env
mv .env.example .env

### Change Database Information
nano .env

php artisan key:generate

php artisan config:cache

php artisan cache:clear

## Setting Database
php aritsan migrate

php artisan db:seed

