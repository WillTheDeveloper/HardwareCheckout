# Hardware checkout

_Inspiration and credit goes to the [original project](https://github.com/techx/cog)._

## Features

- Inventory management
- Track status of each item on a per request or user basis
- Categorise each of the items in the inventory

## Requirements to run this locally (Windows)

1. Download [Docker](https://www.docker.com/products/docker-desktop/)
2. Setup [WSL2 kernel update](https://docs.microsoft.com/en-us/windows/wsl/install-manual#step-4---download-the-linux-kernel-update-package)
3. Setup your [IDE](https://code.visualstudio.com)
4. Download [PHP](https://windows.php.net/download#php-8.1) and place it inside the root of your ```C:``` drive extracted.
5. Enable the following PHP extensions inside the ```php.ini``` file (Further instructions can be found in the file itself):
    - bz2
    - curl
    - ftp
    - fileinfo
    - mbstring
    - mysqli
    - openssl
    - pdo_mysql
    - pdo_pgsql
    - pdo_sqlite
    - pgsql
    - shmop
6. Install [composer](https://getcomposer.org/download/) using the Windows installer found at the top of the page.
7. Download the ```.msi``` installer for windows, using the LTS version of [Node](https://nodejs.org/en/download/).
8. Decide what you want to call your project. We will refer to it now as ```$project```.
9. Initialise a project by running ```composer create-project laravel/laravel $project``` in powershell.
10. Enter the directory of your new project via powershell by running ```cd ./$project```
11. Install composer packages by running ```composer install```
12. Install NPM packages by running ```npm install```
13. Setup environment file by running ```cp .env.example .env```
14. Generate your application key: ```php artisan key:generate```
15. Open docker desktop and wait till it has initialised.
16. Run this command in command line: ```docker pull postgres``` then run ```docker pull dpage/pgadmin4```
17. Inside docker, navigate to ```images``` tab on the left and find postgres in the list.
18. Hover your mouse over ```postgres``` and press the ```run``` button located to the right of it.
19. In the menu, dropdown the section which says ```optional settings``` and enter the following information:
    - ```container name``` - Give the container a name, this can just be ```postgres```
    - ```ports``` - Give the container a port which you will use to access the container, this can just be ```5432``` which is the default.
    - In the environment variables section create the following:
      - ```POSTGRES_PASSWORD``` - Set this as the variable then in the value, create a no-space password which you will use to access the database.
20. Press ```run``` to start the postgres server.
21. If you are connecting your application to a database, add the URL and credentials to ```.env```:
    - ```DB_HOST``` - Using docker, this would just be ```localhost```.
    - ```DB_CONNECTION``` - In this example, we use postgres so ```pgsql``` would go here.
    - ```DB_PORT``` - This would be whatever you set as the port on docker when you created the container.
    - ```DB_DATABASE``` - Name of the database that we will be creating.
    - ```DB_USERNAME``` - For this example, this is simply ```postgres```.
    - ```DB_PASSWORD``` - Whatever you set the docker container environment variable to.
22. Run ```php artisan migrate``` to set up the database with any migrations that you might have.
23. Compile assets by ```npm run dev```
24. Start the server: ```php artisan serve```
25. Visit your server on http://localhost:8000