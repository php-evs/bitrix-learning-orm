<?php
namespace Learning;

use Bitrix\Main\Entity;

class AttemptTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_learn_attempt';
    }

    /**
     * Returns User Fields ID.
     *
     * @return array
     */
    public static function getUfId()
    {
        return 'LEARN_ATTEMPT';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return array(
            new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),
            new Entity\IntegerField('TEST_ID', array(
                'required' => true
            )),
            new Entity\ReferenceField(
                'TEST',
                '\Learning\TestTable',
                array('=this.TEST_ID' => 'ref.ID'),
                array('join_type' => 'LEFT')
            ),
            new Entity\IntegerField('STUDENT_ID', array(
                'required' => true
            )),
            new Entity\ReferenceField(
                'STUDENT',
                'Bitrix\Main\UserTable',
                array('=this.STUDENT_ID' => 'ref.ID'),
                array('join_type' => 'LEFT')
            ),
            new Entity\DateTimeField('DATE_START'),
            new Entity\DateTimeField('DATE_END'),
            new Entity\StringField('STATUS', array(
                'required' => true,
                'validation' => array(__CLASS__, 'validateStatus'),
            )),
            new Entity\BooleanField('COMPLETED', array(
                'values' => array('N', 'Y')
            )),
            new Entity\IntegerField('SCORE'),
            new Entity\IntegerField('MAX_SCORE'),
            new Entity\IntegerField('QUESTIONS', array(
                'required' => true
            )),
            //new Entity\ExpressionField('TIME',
                //'DATEDIFF(%s, %s)', array('DATE_END', 'DATE_START')
            //)
        );

        // Для проверки \Learning\AttemptTable::getEntity()->compileDbTableStructureDump()
        //              \Learning\AttemptTable::getEntity()->getFields()
    }

    public static function validateStatus()
    {
        return array(
            new Entity\Validator\Length(null, 1),
        );
    }
}

