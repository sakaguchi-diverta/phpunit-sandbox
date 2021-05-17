# phpunit-sandbox
## Installation
```bash
cd docker
# docker-compose build --no-cache
docker-compose up -d
docker-compose exec php /bin/bash -c "composer install"
```

## Usage
```bash
cd docker
docker-compose exec php /bin/bash -c "composer test" 
```
