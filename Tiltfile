docker_compose('./docker/docker-compose.yml')
dc_resource('api', labels='api')
local_resource('Composer Install', cmd='docker run -i -v $PWD/root-app:/root-app spiral-ddd-bolierplate_api:latest su spiral -c "composer install"', labels=['jobs'])
local_resource('Composer quality', cmd='docker run -i -v $PWD/root-app:/root-app spiral-ddd-bolierplate_api:latest su spiral -c "composer quality"', labels=['jobs'])