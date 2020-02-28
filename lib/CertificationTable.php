<?php
namespace ES\Learning;
use Bitrix\Main\Entity;

/**
 *
 * \ES\Learning\AttemptTable::getEntity()->compileDbTableStructureDump()
 * \ES\Learning\AttemptTable::getEntity()->getFields()
 *
 * Class AttemptTable
 * @package ES\Learning
 *
 */

class CertificationTable extends Entity\DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'b_learn_certification';
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
			new Entity\IntegerField('STUDENT_ID', array(
				'required' => true
			)),
			new Entity\ReferenceField(
				'STUDENT',
				'Bitrix\Main\UserTable',
				array('=this.STUDENT_ID' => 'ref.ID'),
				array('join_type' => 'LEFT')
			),
			new Entity\IntegerField('COURSE_ID', array(
				'required' => true
			)),
			new Entity\ReferenceField(
				'COURSE',
				'\ES\Learning\CourseTable',
				array('=this.COURSE_ID' => 'ref.ID'),
				array('join_type' => 'LEFT')
			),
			new Entity\DateTimeField('TIMESTAMP_X', array(
				'required' => true
			)),
			new Entity\DateTimeField('DATE_CREATE'),
			new Entity\IntegerField('SORT'),
			new Entity\BooleanField('ACTIVE', array(
				'values' => array('N', 'Y')
			)),
			new Entity\BooleanField('FROM_ONLINE', array(
				'values' => array('N', 'Y')
			)),
			new Entity\BooleanField('PUBLIC_PROFILE', array(
				'values' => array('N', 'Y')
			)),
			new Entity\IntegerField('SUMMARY'),
			new Entity\IntegerField('MAX_SUMMARY')
		);
	}

}