<?php
namespace ES\Learning;
use Bitrix\Main\Entity;

class AnswerTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_learn_answer';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     * @throws \Bitrix\Main\ArgumentException
     */
    public static function getMap()
    {
        return array(
            new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            new Entity\IntegerField('QUESTION_ID', array(
                'required' => true
            )),
            new Entity\ReferenceField(
                'QUESTION',
                '\ES\Learning\QuestionTable',
                array('=this.QUESTION_ID' => 'ref.ID'),
                array('join_type' => 'LEFT')
            ),
            new Entity\IntegerField('SORT'),
            new Entity\TextField('ANSWER', array(
                'required' => true
            )),
            new Entity\StringField('CORRECT', array(
                'required' => true,
                'validation' => array(__CLASS__, 'validateCorrect'),
            )),
            new Entity\TextField('FEEDBACK'),
            new Entity\TextField('MATCH_ANSWER')
        );
    }
    /**
     * Returns validators for CORRECT field.
     *
     * @return array
     */
    public static function validateCorrect()
    {
        return array(
            new Main\Entity\Validator\Length(null, 1),
        );
    }
}
