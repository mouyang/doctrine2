<?php
namespace Doctrine\Tests\Models\Discriminator\SingleTableInheritance;

/**
 * @Entity
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap({"task" = "TaskAttribute", "user" = "UserAttribute"})
 */
class AbstractAttribute
{
    /** @Id @Column(type="integer") */
    public $id;
    /** @Id @Column(type="string") */
    public $name;
    /** @Column(type="string") */
    public $value_text;
}