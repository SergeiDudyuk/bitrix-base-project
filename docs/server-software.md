# Server software

Before we start, make sure, that you familiar with Docker and Docker Compose

So, entire server software is working inside Docker containers. Each functional unit of project is separated from each other.

Container configuration is located in [docker-compose.yml](./../docker-compose.yml).

All containers has one internal path to project: `/var/www/project`

Containers can resolve each other by service names.

If you need add new server software, then follow this simple steps:
* add new directory in /docker/service-name with Dockerfile and necessary files
* add new service in docker-compose.yml
* `$ docker-compose up -d --build --force-recreate`

[Next: Back-end development](./back-end-development.md)