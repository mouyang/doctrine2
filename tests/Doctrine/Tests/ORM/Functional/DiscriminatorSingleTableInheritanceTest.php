<?php
namespace Doctrine\Tests\ORM\Functional;

use Doctrine\Tests\Models\Discriminator\SingleTableInheritance\TaskAttribute;
use Doctrine\Tests\Models\Discriminator\SingleTableInheritance\UserAttribute;

/**
 * @group Discriminator
 */
class DiscriminatorSingleTableInheritanceTest extends \Doctrine\Tests\OrmFunctionalTestCase
{

    /**
     * It was not possible to insert two objects in an inheritance hierarchy if they had 
     * the same primary keys but different concrete classes.  Try to do this.  setUp 
     * considered a success if this can be done without failures.
     * 
     * The only failure that should occur is the warning that says "No tests found in 
     * class <this class>"
     */
    public function setUp()
    {
        $this->useModelSet('discriminatorSingleTableInheritance');
        parent::setUp();

        $this->_em->beginTransaction();

        $taskAttribute = new TaskAttribute();
        $taskAttribute->id = 1;
        $taskAttribute->name = "description";
        $taskAttribute->value_text = "catchy description for a task";
        $this->_em->persist($taskAttribute);

        $userAttribute = new UserAttribute();
        $userAttribute->id = 1;
        $userAttribute->name = "description";
        $userAttribute->value_text = "catchy description for a user";
        $this->_em->persist($userAttribute);

        $this->_em->flush();
        $this->_em->commit();
    }
}