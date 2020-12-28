<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'us';
$active_record = TRUE;
$db['us']['hostname'] = 'localhost';
$db['us']['username'] = 'social_f';
$db['us']['password'] = 'seo0209';
$db['us']['database'] = 'social';
$db['us']['dbdriver'] = 'mysql';
$db['us']['dbprefix'] = 'us_';
$db['us']['pconnect'] = TRUE;
$db['us']['db_debug'] = TRUE;
$db['us']['cache_on'] = FALSE;
$db['us']['cachedir'] = '';
$db['us']['char_set'] = 'utf8';
$db['us']['dbcollat'] = 'utf8_general_ci';
$db['us']['swap_pre'] = '';
$db['us']['autoinit'] = TRUE;
$db['us']['stricton'] = FALSE;

$db['wb']['hostname'] = 'localhost';
$db['wb']['username'] = 'social_f';
$db['wb']['password'] = 'seo0209';
$db['wb']['database'] = 'social';
$db['wb']['dbdriver'] = 'mysql';
$db['wb']['dbprefix'] = 'wb_';
$db['wb']['pconnect'] = TRUE;
$db['wb']['db_debug'] = TRUE;
$db['wb']['cache_on'] = FALSE;
$db['wb']['cachedir'] = '';
$db['wb']['char_set'] = 'utf8';
$db['wb']['dbcollat'] = 'utf8_general_ci';
$db['wb']['swap_pre'] = '';
$db['wb']['autoinit'] = TRUE;
$db['wb']['stricton'] = FALSE;

$db['set']['hostname'] = 'localhost';
$db['set']['username'] = 'social_f';
$db['set']['password'] = 'seo0209';
$db['set']['database'] = 'social';
$db['set']['dbdriver'] = 'mysql';
$db['set']['dbprefix'] = 'set_';
$db['set']['pconnect'] = TRUE;
$db['set']['db_debug'] = TRUE;
$db['set']['cache_on'] = FALSE;
$db['set']['cachedir'] = '';
$db['set']['char_set'] = 'utf8';
$db['set']['dbcollat'] = 'utf8_general_ci';
$db['set']['swap_pre'] = '';
$db['set']['autoinit'] = TRUE;
$db['set']['stricton'] = FALSE;

$db['hy']['hostname'] = 'localhost';
$db['hy']['username'] = 'social_f';
$db['hy']['password'] = 'seo0209';
$db['hy']['database'] = 'ebay';
$db['hy']['dbdriver'] = 'mysql';
$db['hy']['dbprefix'] = 'hy_';
$db['hy']['pconnect'] = TRUE;
$db['hy']['db_debug'] = TRUE;
$db['hy']['cache_on'] = FALSE;
$db['hy']['cachedir'] = '';
$db['hy']['char_set'] = 'utf8';
$db['hy']['dbcollat'] = 'utf8_general_ci';
$db['hy']['swap_pre'] = '';
$db['hy']['autoinit'] = TRUE;
$db['hy']['stricton'] = FALSE;

$db['web']['hostname'] = 'localhost';
$db['web']['username'] = 'social_f';
$db['web']['password'] = 'seo0209';
$db['web']['database'] = 'social';
$db['web']['dbdriver'] = 'mysql';
$db['web']['dbprefix'] = 'web_';
$db['web']['pconnect'] = TRUE;
$db['web']['db_debug'] = TRUE;
$db['web']['cache_on'] = FALSE;
$db['web']['cachedir'] = '';
$db['web']['char_set'] = 'utf8';
$db['web']['dbcollat'] = 'utf8_general_ci';
$db['web']['swap_pre'] = '';
$db['web']['autoinit'] = TRUE;
$db['web']['stricton'] = FALSE;

$db['wx']['hostname'] = 'localhost';
$db['wx']['username'] = 'social_f';
$db['wx']['password'] = 'seo0209';
$db['wx']['database'] = 'social';
$db['wx']['dbdriver'] = 'mysql';
$db['wx']['dbprefix'] = 'wx_';
$db['wx']['pconnect'] = TRUE;
$db['wx']['db_debug'] = TRUE;
$db['wx']['cache_on'] = FALSE;
$db['wx']['cachedir'] = '';
$db['wx']['char_set'] = 'utf8';
$db['wx']['dbcollat'] = 'utf8_general_ci';
$db['wx']['swap_pre'] = '';
$db['wx']['autoinit'] = TRUE;
$db['wx']['stricton'] = FALSE;

/* End of file database.php */
/* Location: ./application/config/database.php */