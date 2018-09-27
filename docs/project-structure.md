# Project structure

Here we will talk about where various project parts is located.

### Tech Stack

* PHP with Composer
* MySQL
* Webpack
* Vue
* modern JS (ES2016+) with Babel
* SCSS styles
* Node.js for deployment

### Web-server's document root

You can find it in `/sites/SITE_ID/`. This folder has symlinks to `/bitrix/`, `/local/` and `/upload/`.

This solution has multisite support by default. To do so you will need create `/sites/SECOND_SITE_ID/` folder and make 3 symlink, mentioned before. That's it.

### Project data

I like to keep all data inside project, even db files `/data/mysql` (it will be mounted into MySQL's `/var/lib/mysql` by Docker).

If you need to copy project to another machine or backup - feel free to zip project's directory, upload archive to another place, unzip it and run.

[Next: Server configuration](./server-software.md)