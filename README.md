Simple mvc mini blog
============================


DIRECTORY STRUCTURE
-------------------

      application/controllers/        contains Web controller classes
      application/models/             contains model classes
      application/core/            	  contains base classes
      application/core/traits         contains various traits for the application
      application/views/              contains view files for the Web application
      public/                         contains the entry script and Web resources



REQUIREMENTS
------------

PHP 5.6+
MySQL
Apache


INSTALLATION
------------

You should be able to access the application through the following URL, assuming `project` is the directory
directly under the Web root.

You can then access the application through the following URL for example:

~~~
http://localhost/project/public/
~~~

CONFIGURATION
-------------

### Database

Edit the file `application/config.php` with real data, for example:

```php
return [
    'host' => 'localhost',
    'user' => 'root',
    'password' => 'vfhfrfy',
    'db' => 'test_blog',
];
```

**NOTE:**
- project directory сontains two dumps of the test database: with test data and empty