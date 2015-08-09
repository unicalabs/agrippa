[![Build Status](https://travis-ci.org/unicalabs/agrippa.svg)](https://travis-ci.org/unicalabs/agrippa)

## Agrippa

Agrippa is a rewrite of PHPasswordPusher, a PHP-based secret sharing mechanism. Named after the work of [William Gibson](https://en.wikipedia.org/wiki/Agrippa_(A_Book_of_the_Dead)), Agrippa operates on the principle that sharing a temporary link to sensitive information is better than having the sensitive information itself persist in email, chat, or any other insecure communications channel.

## How It Works

1. Enter the secret to share, an expiration date, and a view limit.
2. After submitting the form, you'll receive a temporary link, which can be shared.
3. Once the link expires or the view limit is surpassed, the secret is destroyed.

### Requirements
* Composer
* Apache or Nginx
* PHP >= 5.5.9
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension

### Installation

1. Run `composer create-project unicalabs/agrippa myagrippa` to create your instance of Agrippa.
2. Enter the newly-created project: `cd myagrippa`
3. Change `APP_SALT` in `.env` to a randomly-generated value.
4. Create the database: `touch storage/database.sqlite` Alternatively, adjust `.env` to use your MySQL, PostgreSQL, or SQL server connection.
5. Set up the database: `php artisan migrate`
4. Configure Apache or Nginx to serve the `public` folder. Use the [Laravel documentation](http://laravel.com/docs/5.1#installation) for guidance, or do some googling until we fix up this documentation.

### Development

Documentation for the framework (Laravel 5.1) can be found on the [Laravel website](http://laravel.com/docs). To get a development environment up and running, see the [Laravel Homestead documentation](http://laravel.com/docs/5.1/homestead). You can reference the following example Homestead configuration, if it helps:

```
---
ip: "192.168.10.10"
memory: 2048
cpus: 2
provider: virtualbox

authorize: ~/.ssh/id_rsa.pub

keys:
    - ~/.ssh/id_rsa

folders:
    - map: ~/Documents/workspace/agrippa
      to: /home/vagrant/agrippa

sites:
    - map: phpw.local
      to: /home/vagrant/agrippa/public

variables:
    - key: APP_ENV
      value: local
```