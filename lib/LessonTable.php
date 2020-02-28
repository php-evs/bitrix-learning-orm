<?php
namespace ES\Learning;
use Bitrix\Main\Entity;

/**
 *
 * \ES\Learning\LessonTable::getEntity()->compileDbTableStructureDump()
 * \ES\Learning\LessonTable::getEntity()->getFields()
 *
 * Class LessonTable
 * @package ES\Learning
 *
 */
class LessonTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_learn_lesson';
    }

    /**
     * Returns User Fields ID.
     *
     * @return string
     */
    public static function getUfId()
    {
        return 'LEARNING_LESSONS';
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
            'DATE_CREATE' => new Entity\DateTimeField('DATE_CREATE'),
            'CREATED_BY' => new Entity\IntegerField('CREATED_BY'),
            'ACTIVE' => new Entity\BooleanField('ACTIVE', array(
                'values' => array('N', 'Y')
            )),
            // COURSE_ID - устаревшее поле.
            'CHAPTER_ID' => new Entity\IntegerField('CHAPTER_ID'),
            // CHAPTER
            'NAME' => new Entity\StringField('NAME', ['required' => true]),
            'SORT' => new Entity\IntegerField('SORT'),
            'PREVIEW_PICTURE' => new Entity\IntegerField('PREVIEW_PICTURE'),
            // KEYWORDS
            'PREVIEW_TEXT' => new Entity\TextField('PREVIEW_TEXT'),
            'PREVIEW_TEXT_TYPE' => new Entity\TextField('PREVIEW_TEXT_TYPE'),
            'DETAIL_TEXT' => new Entity\TextField('DETAIL_TEXT'),
            'DETAIL_TEXT_TYPE' => new Entity\TextField('DETAIL_TEXT_TYPE'),
            // LAUNCH
            'CODE' => new Entity\StringField('CODE'),
            'COURSE' => new Entity\ReferenceField(
                'COURSE',
                '\ES\Learning\CourseTable',
                array('=this.ID' => 'ref.LINKED_LESSON_ID'),
                array('join_type' => 'LEFT')
            ),
        );
    }

}

