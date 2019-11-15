# testCase Laravel/Vue App

> Laravel 6.5.1 API that uses the API resources with a Vue.js frontend

## Quick Start

``` bash
# Install Dependencies
composer install

# Run Migrations
php artisan migrate

# Import Sheep and Corrals
php artisan db:seed

# Install JS Dependencies
npm install

# Watch Files
npm run watch
```

## Endpoints

### List all sheep
``` bash
GET api/sheep
```
### Get single sheep
``` bash
GET api/sheep/{id}
```

### Delete sheep
``` bash
DELETE api/sheep/{id}
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
