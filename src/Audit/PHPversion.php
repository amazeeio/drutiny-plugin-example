<?php

namespace Drutiny\Common\Audit;

use Drutiny\Audit;
use Drutiny\Sandbox\Sandbox;
use Drutiny\Annotation\Param;
use Drutiny\Annotation\Token;

class PHPversion extends Audit {

  /**
  * @inheritdoc
  */
  public function audit(Sandbox $sandbox) {

    $phpVersion = 'php -v | grep ^PHP | cut -d\' \' -f2';

    $output = (string) $sandbox->exec($phpVersion);

    if (empty($output)) {
      return FALSE;
    }

    $sandbox->setParameter('version', $output);
    return TRUE;
  }
}
