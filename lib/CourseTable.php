<?php
namespace Learning;
use Bitrix\Main\Entity;

/**
 *
 * \Learning\CourseTable::getEntity()->compileDbTableStructureDump()
 * \Learning\CourseTable::getEntity()->getFields()
 *
 * Class CourseTable
 * @package Learning
 *
 */
class CourseTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_learn_course';
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
            'ID' => new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true,
            )),
            'TIMESTAMP_X' => new Entity\DatetimeField('TIMESTAMP_X', array(
                'default_value' => new \Bitrix\Main\Type\DateTime(),
                'title' => 'timestamp',
            )),
            'ACTIVE' => new Entity\BooleanField('ACTIVE', array(
                'values' => array('N', 'Y')
            )),
            'CODE' => new Entity\StringField('CODE'),
            'NAME' => new Entity\StringField('NAME', ['required' => true]),
            'SORT' => new Entity\IntegerField('SORT'),
            'PREVIEW_PICTURE' => new Entity\IntegerField('PREVIEW_PICTURE'),
            'PREVIEW_TEXT' => new Entity\TextField('PREVIEW_TEXT'),
            'PREVIEW_TEXT_TYPE' => new Entity\StringField('PREVIEW_TEXT_TYPE'),
            'DESCRIPTION' => new Entity\TextField('PREVIEW_TEXT'),
            'DESCRIPTION_TYPE' => new Entity\StringField('DESCRIPTION_TYPE'),
            'ACTIVE_FROM' => new Entity\DatetimeField('ACTIVE_FROM', array(
                'default_value' => new \Bitrix\Main\Type\DateTime()
            )),
            'ACTIVE_TO' => new Entity\DatetimeField('ACTIVE_TO', array(
                'default_value' => new \Bitrix\Main\Type\DateTime()
            )),
            // RATING
            // RATING_TYPE
            // SCORM
            'LINKED_LESSON_ID' => new Entity\IntegerField('LINKED_LESSON_ID'),
            'JOURNAL_STATUS' => new Entity\IntegerField('JOURNAL_STATUS'),
            'LINKED_LESSON' => new Entity\ReferenceField(
                'LINKED_LESSON',
                '\Learning\LessonTable',
                array('=this.LINKED_LESSON_ID' => 'ref.ID'),
                array('join_type' => 'LEFT')
            ),
            'SITE' => new Entity\ReferenceField(
                'SITE',
                '\Learning\CourseSiteTable',
                array('=this.ID' => 'ref.COURSE_ID'),
                array('join_type' => 'LEFT')
            ),
        );
    }
}

