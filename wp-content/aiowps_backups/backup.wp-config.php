<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'ug_1');

/** Имя пользователя MySQL */
define('DB_USER', 'ug_1');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'Qr?hy597');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'vmLJ#H{_/x!g?YmA^CLzj,l6w%^)EiSfT|?,-Ib!^_^K%pQ/,C~/4s0jIh9~>_-+');
define('SECURE_AUTH_KEY',  '-O!>o&gC)x/Np0y68!8o4>COkBUc0m14|`$oyx~ T8%|LF-Y;@V?ml2paS<57r8X');
define('LOGGED_IN_KEY',    'go)NMG(CcU6}Pu?^(Js/]DOzDhe9MW>b@vi;+@oYHpR65;Id!seV:JE..QY^:CDe');
define('NONCE_KEY',        'zl-E:tGW+]vIo[Kgx[3[Cs;ye;{)/VRt8I,f*h41!jtEj-_!z{~v!=sqY|M]D /Q');
define('AUTH_SALT',        'qMRAwmbrBC;9AVfv)}%#**3?A]N w{Z[GzUsx6vEXe-pTo0mE5UuzYKoAzs-gNuQ');
define('SECURE_AUTH_SALT', 'C.,#>6|[ >Bu Q`6!Qq$F~H|XjmE q$#8QE-?erAKcfeYSZH:Gm&W)VW+AVW0VEa');
define('LOGGED_IN_SALT',   '7Si3&N,nAq!R<c[j:,Xm:u]f4mIyR/dI]{>fs]}3MXBL:z:lGf oaw}@f[cM:5O#');
define('NONCE_SALT',       'ozrVwwd6[/Cc?UE-o:.U=QHWLp_`6@$go:XU}Ml[Tdf^X^ZX-h.}Z(BFG83[O2;U');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
