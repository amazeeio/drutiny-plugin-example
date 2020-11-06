# Drutiny

"A generic Drupal site auditing and optional remediation tool. Fun Fact: The name is a portmanteau of "Drupal" and "scrutiny." (https://drutiny.github.io/)

Drutiny is a php-based cli tool, and within this base image the executable is made available under:

```
drutiny
```

To find policies which you are able to use for auditin, run the `policy:list` command

```
drutiny policy:list
```

See the Drutiny summary for more info [Drutiny](Setup/drutiny-summary.md)


## Drutiny Plugins (e.g. this repo)

This repo is an example plugin for Drutiny - meaning that it gets added ontop of core Drutiny as an extension.

This plugin therefore provides us a way to add in our own policies, profiles, formatters and anything else we like in order to extend the existing Drutiny functionality.


You could also add this plugin via composer:

```
composer require amazeeio/drutiny-plugin-example:dev-master
```


## Getting setup

To get up and running, head straight over to [Setup](Setup/getting-started.md)


## Running self-updating Drutiny packages with cron

We are able to automatically update Drutiny with changes that are made to our composer packages with the following
script:

```
* * * * * ./scripts/drutiny/drutiny_updater.sh
```
