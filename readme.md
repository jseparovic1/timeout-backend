## Setup
```bash
docker-compose up -d

docker-compose exec php bin/console do:sc:up --force
docker-compose exec php bin/console timeout:install
```
