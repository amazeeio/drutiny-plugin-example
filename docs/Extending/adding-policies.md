# Adding a new policy and audit

We can use this plugin repo to add new policies to Drutiny.

To add a new policy we need two files:
* a new Policy yaml added (e.g. preferably under /policies)
* and also a new Audit class here (e.g. /src/Audit)

## Adding the policy yaml
The Drutiny API documentation is a good place to look: https://drutiny.github.io/2.3.x/policy/

An example policy looks like this:

```
title: Always fail test policy
class: \Drutiny\Audit\AlwaysFail
name: Test:Fail
tags:
  - test
description: |
  This policy should always fail. Twee godard poutine knausgaard, street art
  keytar readymade unicorn wayfarers vape mumblecore blue bottle. Portland
  pitchfork air plant kale chips, craft beer meditation tumeric seitan umami
  vexillologist cred coloring book taxidermy actually.
  Banjo narwhal la croix portland green juice lumbersexual biodiesel kombucha
  vegan umami aesthetic trust fund ramps. Art party +1 celiac everyday carry
  succulents seitan franzen distillery venmo keytar cray mustache gastropub.
  8-bit seitan banh mi, vice chillwave viral synth vinyl +1. Mixtape mustache
  pitchfork, meh tacos kitsch offal pop-up intelligentsia VHS air plant pork
  belly. Thundercats microdosing taxidermy try-hard +1 ennui photo booth 8-bit.
success: policy succeeded. This means there is a problem with the Drutiny framework.
failure: policy failed.
remediation: Please run with remediation to resolve.
severity: critical
```

Also, see the full Policy Library managed under Drutiny [Policy Library](https://drutiny.github.io/2.3.x/policy-library/)


## Adding the audit

Again, the best place to explain this is the Drutiny docs themselves [Audits](https://drutiny.github.io/2.3.x/audits/)

An example audit included in this repo, looks like this:

```
<?php

namespace DrutinyTests\Audit;

use Drutiny\Common\Audit\PHPversion;
use Drutiny\Container;
use Drutiny\Policy;
use Drutiny\Sandbox\Sandbox;
use Drutiny\Target\Registry as TargetRegistry;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;

class PHPversionTest extends TestCase {

  protected $target;

  public function __construct()
  {
    Container::setLogger(new NullLogger());
    $target = TargetRegistry::getTarget('none', '');
    $this->target = $target;

    parent::__construct();
  }

  public function testPass()
  {
    $policy = Policy::load('common:PHPversion');
    $sandbox = new Sandbox($this->target, $policy);

    $response = $sandbox->run();
    $this->assertEquals(trim($response->getSuccess()), 'PHP version: 7.4.9');
  }
}
```
