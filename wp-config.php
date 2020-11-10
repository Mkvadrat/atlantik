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
define( 'DB_NAME', 'atlantik' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '1234' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '+Lhz)@W*,t[vh&#8G2Q83#^+WL7xO%potpq~UDq1JCWs/uWr L:Sg3B`1TM,>iJ$' );
define( 'SECURE_AUTH_KEY',  'F=Iy[l.}%Cv7WR:`06zKRKtqZ(gSo6Vn33(|IyZd*oP8~D=ME2pinx~O+]yyJ7-|' );
define( 'LOGGED_IN_KEY',    '$hsVNIet^agco[D>[0MF4^8s)vP+(&.$a%gj6XwIBJnG]n{Iq_7w}t}B!yiN9x^%' );
define( 'NONCE_KEY',        'EfdsD2:{Zn`uGJqWU7)<!gN{GAnu-WT>Qc8w|aK[PY96`%4l#E*`7H;HPsr:?|mT' );
define( 'AUTH_SALT',        'xdSxX={Eyd:1f9;Xao**R8[m-s> ot+m*/bUXvJer:q._ }k@-Tp|*;wKB>Mfo?@' );
define( 'SECURE_AUTH_SALT', 'Lpw@Dk.JC)Gn*&&#U1~22eZ+){oLJDl!sNmH|Q_@r`BQ-n/zKL*) }T8W/yQ[DC>' );
define( 'LOGGED_IN_SALT',   'p]*@FpV~()X<,WF@*N}`QP?c?&K%Kq21mP@xM[Z NVZk9*QmM}#0R=Rk(N@%^;;;' );
define( 'NONCE_SALT',       '#aQLq]7Jv{^Xcek}q1Y_qV,EM# /s82=q^gji$m83Aw27 8/a z,c!Gayp1m`if?' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
