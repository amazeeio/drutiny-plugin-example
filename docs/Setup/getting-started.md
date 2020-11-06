## Getting started

Drutiny is accessible anywhere within the base image via `drutiny`.

```
Drutiny -dev

Usage:
  command [options] [arguments]

Options:
  -h, --help            Display this help message
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi            Force ANSI output
      --no-ansi         Disable ANSI output
  -n, --no-interaction  Do not ask any interactive question
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Available commands:
  help              Displays help for a command
  list              Lists commands
  status            Review key details about Drutiny's runtime environment
 audit
  audit:generate    Create an Audit class
  audit:info        Show all php audit classes available.
  audit:list        Show all php audit classes available.
  audit:run         Run a single audit against a site without a policy.
 cache
  cache:clear       Clear the Drutiny cache
 plugin
  plugin:list       List all available plugins.
  plugin:setup      Register credentials against an API drutiny integrates with.
 policy
  policy:audit      Run a single policy audit against a site.
  policy:download   Download a remote policy locally.
  policy:info       Show information about a specific policy.
  policy:list       Show all policies available.
  policy:search     List policies based on a keyword search criteria.
 profile
  profile:download  Download a remote profile locally.
  profile:generate  Create a profile
  profile:info      Display information about a profile.
  profile:list      Show all profiles available.
  profile:run       Run a profile of checks against a target.
 target
  target:metadata   Display metatdata about a target.
```

To see a list of policies we can use to audit, run:

```
drutiny policy:list
```

To see a list of profiles we can use to audit multiple policies, run:

```
drutiny profile:list
```


There are two core commands in Drutiny which we should explain first are: `policy:audit` and `profile:run`.


#### policy:audit
This runs the policy against a target (mostly likely a drush target) which will do the checks we want to run.

Fundamentally, we need to provide a policy (e.g. Test:Pass) and a target (e.g. `drush alias @site-prod.site-name`). We can also pass in options such as `--format` which defines the output format. Parameters / default values can also be passed into policies with the `-p` flag, for example `-p module=8.6.8`.

```
policy:audit [options] [--] <policy> <target> <format>
```

The final command would look something like this:

```
drutiny policy:audit Test:Pass @self --format=markdown
```

#### profile:run
This runs the profile against a target which will go through and check the entire policy suite.

For profiles, we need to provide a profile name (e.g. `example`) and a target (e.g. `drush alias @site-prod.site-name`). We can also pass in options such as `--format` which defines the output format.

```
profile:run [options] [--] <profile> <target>
```

The final command would look something like this

```
drutiny profile:run example @site-prod.site-name --format==markdown
```


### SEE ALSO

* [Adding policies](Extending/adding-policies.md)	- Add a new policy
