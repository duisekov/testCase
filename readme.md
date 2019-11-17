# testCase Laravel/Vue App

> Laravel 6.5.1 API that uses the API resources with a Vue.js frontend

## Quick Start

``` bash
# Install Dependencies
composer install

# Create db locally(.env) and generate key
php artisan key:generate

# Run Migrations
php artisan migrate

# Import Sheep and Corrals
php artisan db:seed

# Install JS Dependencies
npm install

# Watch Files
npm run watch

# Start server 
php artisan serve
```

## Endpoints

### List all sheep
``` bash
GET api/sheep
```

### Delete sheep
``` bash
DELETE api/destroy
```

### Add sheep
``` bash
POST api/sheep
```

### Update sheep
``` bash
PUT api/sheep/{id}
corral_id
```

### List all corrals with sheep
``` bash
GET api/corral
```

### List history
``` bash
GET api/history
```
