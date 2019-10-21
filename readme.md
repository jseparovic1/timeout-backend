```bash
docker-compose up -d

php bin/console doctrine:schema:create --force
php bin/console timeout:install
```
