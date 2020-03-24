# bitrix-learning-orm
ORM for bitrix learning module.

## Requirements

* PHP >= 7.1.0
* Bitrix CMS >= 18.0

namespace \ES\Learning

## Installation with composer

in composer.json add:

"php-evs/bitrix-learning-orm": "dev-master"
in "require" section

and
{
  "type": "git",
  "url": "https://github.com/php-evs/bitrix-learning-orm"
}
in "repositories" section

# Use Examples

## 1 Get all Lessons from specific Site sorted by Course active date, Lesson active date
```php
\ES\Learning\LessonTable::getList([
  'order' => ['COURSE.ACTIVE_FROM' => 'ASC', 'ACTIVE_FROM' => 'ASC'],
  'filter' => [
    'ACTIVE' => 'Y',
    'COURSE.SITE.SITE_ID' => SITE_ID,
    'CHECK_PERMISSIONS' => 'Y'
  ],
  'select' => [
    'NAME',
    'LESSON_ID' => 'ID',
    'COURSE_ID' => 'COURSE.ID',
    'ACTIVE_FROM' => 'COURSE.ACTIVE_FROM',
    'SORT',
    'CREATED_BY'
  ]
])->fetchAll();
```
