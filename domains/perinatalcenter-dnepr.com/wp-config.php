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
define('DB_NAME', 'perin_base');

/** Имя пользователя MySQL */
define('DB_USER', 'perin_admin');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '$media_perin');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '15svD[z8;c,?J<|Y09pBnx.#GZhhpy:dcY~Z5Q=z0aK>-kiJuARJzE#^Crj:7k5,');
define('SECURE_AUTH_KEY',  'Vk@G>x.54FiB+^}k(M)2t|r==PS8(|fWes.r3FwH0oZj*#=]6Ew3o]g$prVI*YF2');
define('LOGGED_IN_KEY',    'D::*gKP8we|9S>vDQ-|FT4jD-@XoN?3#Xr+.^T>n-]rE11X8r{!#y1?8l|Ww~`e7');
define('NONCE_KEY',        'pbcrJm>mWn`Pq;f-!Nlk@*C.?uZ+2-S!(hMTntg[~Y2RBN.#e[1Ygy9L6{Y+,$lY');
define('AUTH_SALT',        'Ch;7Ue|.yWj`kca}w`[OvpQ@t9Vro$t%wb5q[8R;T#rn%J5;cQ^ehM.-0&6^Tr0!');
define('SECURE_AUTH_SALT', '~<UL3[UGdXUO@#*5M{0`G_2i%`OQPVI[w8icWZ-z,N(/PkQb>k<6b2og>Z#*<Vd2');
define('LOGGED_IN_SALT',   '+5q-u-&TAW|6+D3}XVtmFc5/(KaLzu|<V:pB6VVatR6K>f,mMC3+rA5db-Bcihr8');
define('NONCE_SALT',       'F9Fgi0&N#>`vD!n[L+Ue|B+m-zE,L|<X!fL<pBa~=/}5?}x?U~OXmo}3B+7qup>}');

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
