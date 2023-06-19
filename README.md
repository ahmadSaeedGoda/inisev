## Table of Contents
- [Table of Contents](#table-of-contents)
- [Current Scope](#current-scope)
- [Project Status](#project-status)
- [Installation and Setup Instructions](#installation-and-setup-instructions)
- [Requirements](#requirements)
  - [Getting The Codebase:](#getting-the-codebase)
  - [Installation and Configuration:](#installation-and-configuration)
- [License](#license)

## Current Scope

An API used to notify users subscribed into particular websites whenever new posts are added to these sites.

## Project Status

This project is currently in development. Users now can subscribe to available websites, get notified when posts are published to these websites. As per requirements of the task.

## Installation and Setup Instructions

You need the following requirements installed globally on your machine.

## Requirements
- PHP >= 8.1.2
- MySQL Server version 8 or higher.
- Composer: 2.2.18 or higher.
- Laravel Framework 10.13.5.
- Web Server: Apache2 or preferably NGINX in case of creating virtual host instead of the PHP lightweight simple server that listens on a specific port rather than the default port 80.

### Getting The Codebase:

The simplest way to obtain the code is using the github .zip feature. Click [here](https://github.com/ahmadSaeedGoda/inisev/archive/refs/heads/master.zip) to get the latest stable version as a .zip compressed file.

The recommended way is using `git`. You'll need to make sure `git version ~2.34.1` is installed on your machine. Use a terminal or Power Shell to visit the directory where you'd like to have the source code, then type in:
```sh
$ git clone https://github.com/ahmadSaeedGoda/inisev.git
```

### Installation and Configuration:
- <b>Step 1:</b> Get the code. "As explained [above](#getting-the-codebase)".
- <b>Step 2:</b> Use Composer to install dependencies. Navigate to the root directory of the project you cloned or downloaded then run the following command to install required dependencies.
```sh
$ composer install
```
- <b>Step 3:</b> Create & Configure your database.<br>
If successfully the first two steps have been finished, now you can create the database on your database server(MySQL).

- <b>Step 4:</b> Set the Environment Variables. Find the file named `.env.example` in the root directory of the project. Copy the file then rename the new one `.env` then set the environment variables listed below with values according to your environment respectively:
    - DB_CONNECTION
    - DB_HOST
    - DB_PORT
    - DB_DATABASE
    - DB_USERNAME
    - DB_PASSWORD

  Then set `mail` configurations as follows "and as per yours values":
    - MAIL_MAILER
    - MAIL_HOST
    - MAIL_PORT
    - MAIL_USERNAME
    - MAIL_PASSWORD
    - MAIL_ENCRYPTION
    - MAIL_FROM_ADDRESS
    - MAIL_FROM_NAME

- <b>Step 5:</b> Run `php artisan migrate --seed` in the console after making sure the prompt points to the root directory of the project. So that you can have the DB initiated & populated.

- <b>Step 6:</b> Run `php artisan serve` in the console after making sure the prompt points to the root directory of the project.<br><br>
You can skip this step if you have a webserver up & running and the project is hosted in its root path.

However convenient for you to run the app for visiting the endpoints in an API client such as `postman`, `insomnia` or even `curl`.

<br>Note: A shared Insomnia collection is included in the source code root directory, this can be imported and ready to use after changing the `url` as per your env.

For documentation see `Insomnia Collection` shared collection with Examples included in file in `Insomnia_2023-06-19.json`.

Import the above file in `Insomnia` or Postman!

Subscribe any existing users to any websites, then once a new post is created via the available request/endpoint .. Emails will be sent to subscribed users of this website to which the newly created post is attached.

## License
This is free software distributed under the terms of the WTFPL license along with MIT license as dual-licensed, You can choose whatever works for you.
