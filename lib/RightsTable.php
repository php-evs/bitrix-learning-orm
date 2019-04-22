<?php
namespace Learning;
use Bitrix\Main\Entity;

/**
 * Class RightsTable
 *
 * Fields:
 * <ul>
 * <li> LESSON_ID int mandatory
 * <li> SUBJECT_ID string(100) mandatory
 * <li> TASK_ID int mandatory
 * </ul>
 *
 * @package Learning
 **/

class RightsTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_learn_rights';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return array(
            'LESSON_ID' => new Entity\IntegerField('LESSON_ID', array(
                'primary' => true,
                'autocomplete' => true,
            )),
            'LESSON' => new Entity\ReferenceField(
                'LESSON',
                '\Learning\LessonTable',
                array('=this.LESSON_ID' => 'ref.ID'),
                array('join_type' => 'LEFT')
            ),
            'SUBJECT_ID' => new Entity\StringField('SUBJECT_ID', array(
                'primary' => true,
                'validation' => array(__CLASS__, 'validateSubjectId'),
            )),
            'TASK_ID' => new Entity\IntegerField('TASK_ID', array(
                'required' => true
            )),
            'TASK' => new Entity\ReferenceField(
                'TASK',
                'Bitrix\Main\TaskTable',
                array('=this.TASK_ID' => 'ref.ID'),
                array('join_type' => 'LEFT')
            )
        );
    }
    /**
     * Returns validators for SUBJECT_ID field.
     *
     * @return array
     */
    public static function validateSubjectId()
    {
        return array(
            new Entity\Validator\Length(null, 100)
        );
    }
}

