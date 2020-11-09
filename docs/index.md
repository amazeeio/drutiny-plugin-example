
# Drutiny Plugin

This repo is an example plugin for Drutiny - meaning that it gets added ontop of core [Drutiny](#what-is-drutiny?) as an extension.

This plugin therefore provides us a way to add in our own policies, profiles, formatters and anything else we like in order to extend the existing Drutiny functionality.

The preferable way to manage Drutiny plugins within the base image is use the `packages` file (`/scripts/drutiny/packages`). Here we can list, on new lines, the composer packages we wish to include:

```
/app$ cat scripts/drutiny/packages
bomoko/lagoon-formatter:dev-master
amazeeio/drutiny-plugin-example:dev-master
```

You could also add this plugin via composer:

```
composer require amazeeio/drutiny-plugin-example:dev-master
```


## Getting setup and using Drutiny

To get up and running, head straight over to [Setup](Setup/getting-started.md)



## What is Drutiny?

"A generic Drupal site auditing and optional remediation tool. Fun Fact: The name is a portmanteau of "Drupal" and "scrutiny." (https://drutiny.github.io/)

Drutiny is a php-based cli tool, and within this base image the executable is made available under:

```
drutiny
```


To find policies which you are able to use for auditing, run the `policy:list` command

```
drutiny policy:list
```

See the Drutiny summary for more info on [Drutiny](Setup/drutiny-summary.md)



## Running self-updating Drutiny packages with cron

We are able to automatically update Drutiny with changes that are made to our composer packages with the following
script:

```
* * * * * ./scripts/drutiny/drutiny_updater.sh
```

The `drutiny_updater.sh` script will look by default for the packages file (`./scripts/drutiny/packages`) but you are able to also pass a filename (`-p`) parameter to override this - such as `.drutiny_updater.sh -p /path-to-package-file`. Then all packages inside this file will be checked to see if there are any available updates, and then update them if there are. The Drutiny caches post update are cleared also for us.