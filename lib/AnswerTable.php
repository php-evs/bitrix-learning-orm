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
            'ID' => new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            'QUESTION_ID' => new Entity\IntegerField('QUESTION_ID', array(
                'required' => true
            )),
            'QUESTION' => new Entity\ReferenceField(
                'QUESTION',
                '\ES\Learning\QuestionTable',
                array('=this.QUESTION_ID' => 'ref.ID'),
                array('join_type' => 'LEFT')
            ),
            'SORT' => new Entity\IntegerField('SORT'),
            'ANSWER' => new Entity\TextField('ANSWER', array(
                'required' => true
            )),
            'CORRECT' => new Entity\StringField('CORRECT', array(
                'required' => true,
                'validation' => array(__CLASS__, 'validateCorrect'),
            )),
            'FEEDBACK' => new Entity\TextField('FEEDBACK'),
            'MATCH_ANSWER' => new Entity\TextField('MATCH_ANSWER')
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
