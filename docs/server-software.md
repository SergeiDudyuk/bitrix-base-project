# Server software

Before we start, make sure, that you familiar with Docker and Docker Compose

So, entire server software is working inside Docker containers. Each functional unit of project is separated from each other.

Here is the list of units:

* Nginx proxy
* PHP v7.1
* Memcached for PHP's performance boost
* Node.js for Webpack and front-end development
* MySQL for db
* Async deployment service based on Node.js

Container configuration is located in [docker-compose.yml](./../docker-compose.yml).

All containers has one internal path to project: `/var/www/project`

Containers can resolve each other by service names.

[Next: Back-end development](./back-end-development.md)