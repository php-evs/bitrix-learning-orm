# bitrix-learning-orm
ORM for bitrix learning module

namespace Learning;

# Examples

## 1
Get all Lessons from specific Site sorted by Course active date, Lesson active date
```php
\Learning\LessonTable::getList([
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
]);
```
