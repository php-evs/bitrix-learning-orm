<?php
namespace ES\Learning;
use Bitrix\Main\Entity;

class CourseSiteTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_learn_course_site';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return array(
            new Entity\IntegerField('COURSE_ID', array(
                'required' => true,
                'primary' => true
            )),
            new Entity\ReferenceField(
                'COURSE',
                '\ES\Learning\CourseTable',
                array('=this.COURSE_ID' => 'ref.ID'),
                array('join_type' => 'LEFT')
            ),
            new Entity\StringField('SITE_ID', array(
                'primary' => true,
                'validation' => array(__CLASS__, 'validateSiteId'),
            )),
            new Entity\ReferenceField(
                'SITE',
                '\Bitrix\Main\SiteTable',
                array('=this.SITE_ID' => 'ref.LID'),
                array('join_type' => 'LEFT')
            ),
        );
    }
    /**
     * Returns validators for SITE_ID field.
     *
     * @return array
     */
    public static function validateSiteId()
    {
        return array(
            new Main\Entity\Validator\Length(null, 2),
        );
    }
}
