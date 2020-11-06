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
