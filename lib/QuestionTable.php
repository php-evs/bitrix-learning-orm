<?php
namespace Learning;
use Bitrix\Main\Entity;

class QuestionTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_learn_question';
    }

    /**
     * Returns User Fields ID.
     *
     * @return array
     */
    public static function getUfId()
    {
        return 'LEARNING_QUESTIONS';
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
            new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            new Entity\BooleanField('ACTIVE', array(
                'values' => array('N', 'Y')
            )),
            new Entity\DatetimeField('TIMESTAMP_X', array(
                'default_value' => new \Bitrix\Main\Type\DateTime(),
                'title' => 'timestamp',
            )),
            new Entity\IntegerField('LESSON_ID'),
            new Entity\ReferenceField(
                'LESSON',
                '\Learning\LessonTable',
                array('=this.LESSON_ID' => 'ref.ID'),
                array('join_type' => 'LEFT')
            ),
            new Entity\StringField('QUESTION_TYPE', array(
                'required' => true,
                'validation' => array(__CLASS__, 'validateQuestionType'),
            )),
            new Entity\StringField('NAME', array(
                'required' => true,
                'validation' => array(__CLASS__, 'validateName'),
            )),
            new Entity\IntegerField('SORT'),
            new Entity\IntegerField('DESCRIPTION'),
            new Entity\TextField('DESCRIPTION_TYPE'),
            new Entity\BooleanField('SELF', array(
                'values' => array('text', 'html')
            )),
            new Entity\TextField('COMMENT_TEXT'),
            new Entity\IntegerField('FILE_ID'),
            new Entity\BooleanField('SELF', array(
                'values' => array('N', 'Y')
            )),
            new Entity\IntegerField('POINT'),
            new Entity\StringField('DIRECTION', array(
                'required' => true,
                'validation' => array(__CLASS__, 'validateDirection'),
            )),
            new Entity\BooleanField('CORRECT_REQUIRED', array(
                'values' => array('N', 'Y')
            )),
            new Entity\BooleanField('EMAIL_ANSWER', array(
                'values' => array('N', 'Y')
            )),
            new Entity\TextField('INCORRECT_MESSAGE'),
        );
    }

    /**
     * Returns validators for QUESTION_TYPE field.
     *
     * @return array
     */
    public static function validateQuestionType()
    {
        return array(
            new Main\Entity\Validator\Length(null, 1),
        );
    }

    /**
     * Returns validators for NAME field.
     *
     * @return array
     */
    public static function validateName()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }

    /**
     * Returns validators for DIRECTION field.
     *
     * @return array
     */
    public static function validateDirection()
    {
        return array(
            new Main\Entity\Validator\Length(null, 1),
        );
    }
}
