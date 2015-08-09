[![Build Status](https://travis-ci.org/unicalabs/agrippa.svg)](https://travis-ci.org/unicalabs/agrippa)

## Agrippa

A rewrite of PHPasswordPusher.

**DO NOT USE.** (Under development)

### Requirements
* Apache or Nginx
* PHP >= 5.5.9
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension

### Setup

1. Clone this repository and switch to the `develop-v2` branch.
2. Install the dependencies: `composer install`
3. Create the database: `touch storage/database.sqlite`
4. Run the migrations: `php artisan migrate`
3. Configure Apache or Nginx to serve the `public` folder. Use the [Laravel documentation](http://laravel.com/docs/5.1#installation) for guidance, or do some googling until we fix up this documentation.

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