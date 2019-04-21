<?php
namespace Learning;
use Bitrix\Main\Entity;

/**
 * Class CourseTable
 * @package Learning
 */
class LessonEdgesTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_learn_lesson_edges';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\ObjectException
     */
    public static function getMap()
    {
        return array(

            new Entity\IntegerField('SOURCE_NODE', ['primary' => true]),
            new Entity\ReferenceField(
                'SOURCE',
                '\Learning\LessonTable',
                array('=this.SOURCE_NODE' => 'ref.ID')
            ),
            new Entity\IntegerField('TARGET_NODE', ['primary' => true]),
            new Entity\ReferenceField(
                'TARGET',
                '\Learning\LessonTable',
                array('=this.TARGET_NODE' => 'ref.ID')
            )
        );
    }

}

