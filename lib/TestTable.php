<?php
namespace Learning;
use Bitrix\Main\Entity;

class TestTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_learn_test';
    }

    /**
     * Returns entity map definition.
     *
     * Reference идет со стороны вопроса на урок, отношение N:1
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
            new Entity\IntegerField('COURSE_ID', array(
                'required' => true
            )),
            new Entity\ReferenceField(
                'COURSE',
                '\Learning\CourseTable',
                array('=this.COURSE_ID' => 'ref.ID'),
                array('join_type' => 'LEFT')
            ),
            new Entity\DateTimeField('TIMESTAMP_X', array(
                'required' => true
            )),
            new Entity\IntegerField('SORT'),
            new Entity\BooleanField('ACTIVE', array(
                'values' => array('N', 'Y')
            )),
            new Entity\StringField('NAME', array(
                'required' => true,
                'validation' => array(__CLASS__, 'validateName'),
            )),
            new Entity\TextField('DESCRIPTION'),
            new Entity\EnumField('DESCRIPTION_TYPE', array(
                'values' => array('text', 'html')
            )),
            new Entity\IntegerField('ATTEMPT_LIMIT', array(
                'required' => true
            )),
            new Entity\IntegerField('ATTEMPT_LIMIT'),
            new Entity\IntegerField('COMPLETED_SCORE'),
            new Entity\StringField('QUESTIONS_FROM', array(
                'required' => true,
                'validation' => array(__CLASS__, 'validateQuestionsFrom'),
            )),
            // @todo @ESimchenko Ref QUESTIONS_FROM
            new Entity\IntegerField('QUESTIONS_FROM_ID', array(
                'required' => true
            )),
            new Entity\IntegerField('QUESTIONS_AMOUNT', array(
                'required' => true
            )),
            new Entity\BooleanField('RANDOM_QUESTIONS', array(
                'values' => array('N', 'Y')
            )),
            new Entity\BooleanField('RANDOM_ANSWERS', array(
                'values' => array('N', 'Y')
            )),
            new Entity\BooleanField('APPROVED', array(
                'values' => array('N', 'Y')
            )),
            new Entity\BooleanField('INCLUDE_SELF_TEST', array(
                'values' => array('N', 'Y')
            )),
            new Entity\StringField('PASSAGE_TYPE', array(
                'required' => true,
                'validation' => array(__CLASS__, 'validatePassageType'),
            )),
            new Entity\IntegerField('PREVIOUS_TEST_ID'),
            // @todo @ESimchenko Ref PREVIOUS_TEST
            new Entity\IntegerField('PREVIOUS_TEST_SCORE'),
            new Entity\BooleanField('INCORRECT_CONTROL', array(
                'values' => array('N', 'Y')
            )),
            new Entity\IntegerField('CURRENT_INDICATION', array(
                'required' => true
            )),
            new Entity\IntegerField('FINAL_INDICATION', array(
                'required' => true
            )),
            new Entity\IntegerField('FINAL_INDICATION', array(
                'required' => true
            )),
            new Entity\IntegerField('MIN_TIME_BETWEEN_ATTEMPTS', array(
                'required' => true
            )),
            new Entity\BooleanField('SHOW_ERRORS', array(
                'values' => array('N', 'Y')
            )),
            new Entity\BooleanField('NEXT_QUESTION_ON_ERROR', array(
                'values' => array('N', 'Y')
            ))
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
     * Returns validators for QUESTIONS_FROM field.
     *
     * В тесте участвуют вопросы из:
     * A - со всего курса,
     * C - с каждой главы,
     * L - с каждого урока.
     * S - все вопросы урока
     * R -
     *
     * @return array
     */
    public static function validateQuestionsFrom()
    {
        return array(
            new Main\Entity\Validator\Length(null, 1),
        );
    }
    /**
     * Returns validators for PASSAGE_TYPE field.
     *
     * @return array
     */
    public static function validatePassageType()
    {
        return array(
            new Main\Entity\Validator\Length(null, 1),
        );
    }

}
