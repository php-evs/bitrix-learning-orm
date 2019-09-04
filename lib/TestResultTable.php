<?php
namespace Learning;
use Bitrix\Main\Entity;

class TestResultTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_learn_test_result';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return array(
            'ID' => array(
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true,
            ),
            'ATTEMPT_ID' => array(
                'data_type' => 'integer',
                'required' => true,
            ),
            'ATTEMPT' => new Entity\ReferenceField(
                'ATTEMPT',
                '\Learning\AttemptTable',
                array('=this.ATTEMPT_ID' => 'ref.ID'),
                array('join_type' => 'LEFT')
            ),
            'QUESTION_ID' => array(
                'data_type' => 'integer',
                'required' => true,
            ),
            'QUESTION' => new Entity\ReferenceField(
                'QUESTION',
                '\Learning\QuestionTable',
                array('=this.QUESTION_ID' => 'ref.ID'),
                array('join_type' => 'LEFT')
            ),
            'RESPONSE' => array(
                'data_type' => 'text',
            ),
            'POINT' => array(
                'data_type' => 'integer',
                'required' => true,
            ),
            'CORRECT' => array(
                'data_type' => 'boolean',
                'values' => array('N', 'Y'),
            ),
            'ANSWERED' => array(
                'data_type' => 'boolean',
                'values' => array('N', 'Y'),
            ),
        );
    }
}

