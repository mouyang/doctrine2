<?php

namespace Doctrine\Tests\ORM\Functional\Ticket;

use Doctrine\Common\Collections\ArrayCollection;
require_once __DIR__ . '/../../../TestInit.php';

class DDC2936Test extends \Doctrine\Tests\OrmFunctionalTestCase
{
    public function setUp()
    {
        $this->useModelSet('company');
        parent::setUp();
    }

    public function testPartialReferenceInitialization()
    {
        $className = "\Doctrine\Tests\Models\Company\CompanyFixContract";
        $domainObject = new $className();
        $partialReference = $this->_em->getPartialReference($className, 1);
        $this->assertEquals($domainObject->getEngineers(), $partialReference->getEngineers());
    }
}