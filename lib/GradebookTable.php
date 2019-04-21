<?php 
namespace Learning;
use Bitrix\Main\Entity;

class GradebookTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_learn_gradebook';
    }

    /**
     * Returns User Fields ID.
     *
     * @return array
     */
    public static function getUfId()
    {
        return 'LEARNING_GRADEBOOK';
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
            new Entity\IntegerField('STUDENT_ID', array(
                'required' => true
            )),
            new Entity\ReferenceField(
                'STUDENT',
                '\Bitrix\Main\User',
                array('=this.STUDENT_ID' => 'ref.ID'),
                array('join_type' => 'LEFT')
            ),
            new Entity\IntegerField('TEST_ID', array(
                'required' => true
            )),
            new Entity\ReferenceField(
                'TEST',
                '\Learning\TestTable',
                array('=this.TEST_ID' => 'ref.ID'),
                array('join_type' => 'LEFT')
            ),
            new Entity\IntegerField('RESULT', array(
                'required' => true
            )),
            new Entity\IntegerField('MAX_RESULT', array(
                'required' => true
            )),
            new Entity\IntegerField('ATTEMPTS', array(
                'required' => true
            )),
            new Entity\BooleanField('COMPLETED', array(
                'values' => array('N', 'Y')
            )),
            new Entity\IntegerField('EXTRA_ATTEMPTS', array(
                'required' => true
            ))
        );
    }
}

