# Drutiny

"A generic Drupal site auditing and optional remediation tool. Fun Fact: The name is a portmanteau of "Drupal" and "scrutiny." (https://drutiny.github.io/)

Check out the Drutiny docs for more info [Drutiny Docs](https://drutiny.readthedocs.io/en/2.x/README/)


## A basic overview of the terminology

### What are Profiles?
A Drutiny profile is a structured data file (in YAML) which contains a collection of 'policies'.

A profile will be saved to any location where Drutiny can be called from but it must use the filename pattern `*.profile.yml`.

See [Profiles](https://drutiny.readthedocs.io/en/2.x/profiles/)


### What are Policies?
A Drutiny policy contains metadata describing the behavior and responses of an `Audit`, and does not provide specific logic associated to the Audit. A policy will simply provide human-readable description under all conditions, it can template the response for the report depending on the state returned, and it will declare the parameters needed for the Audit to run.

A policy will be saved to any location where Drutiny can be called from, but it must use the filename pattern `*.policy.yml`.

See [Policies](https://drutiny.readthedocs.io/en/2.x/policy/)

### What are Audits?
An audit contains the logic that a policy can be run against.

This can be done by using `policy:audit` and passing the policy name and site target:

```
drutiny policy:audit Test:Fail @site.dev
```
The command above would audit the site that resolved to the @site.dev drush alias against the `Test:Fail` policy.

Some policies have parameters you can specify which can be passed in at call time. Use `policy:info` to find out more about the parameters available for a check.

```
drutiny policy:audit -p [value=xxx] Policy @site.dev
```

Audits are self-contained classes that are simple to read and understand. Policies are simple YAML files that determine how to use Audit classes. Therefore, Drutiny can be extended very easily to audit for your own unique requirements.
