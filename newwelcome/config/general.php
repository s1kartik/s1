<?php
/* GENERAL CONFIG */

$siteTitle = 'S1 Safety Systems'; /* will be displayed above the url-bar / in tab / on Google */
$siteName = 'Safety 1'; /* The biggest title on your homepage */
$siteDesc ='Integration Systems'; /* subtitle on your homepage */
$siteTitleHome = 'S1'; // will be displayed above the url-ba / in tab / in google when the home-page is open
$siteFooter = '© HRQ Solutions';

$siteMetaDesc = 'A description of your site for Google here';
$siteMetaKeywords = 'Some, keywords, seperated, by, commas, here, max 10';

$favicon_url = "img/welcome/icons/favicon.png";

$googleAnalyticsCode = ""; // Your Google Analytics Web Property ID in the form UA-XXXXX-Y or UA-XXXXX-YY. (check: http://support.google.com/analytics/bin/answer.py?hl=en&answer=1032385)

$lang = "en"; // lang of the site (used for locale file! So if you put "nl" you need a file nl.php in the locale folder. (to create such a file: start by copying the default en.php file)

/* Compressing settings */
$compressJS = false; // compress JS
$compressCSS = false; // compress CSS
$autoFlush = true;
$autoFlushPlugins = true;

$compressJS_mob = false; // compress JS of mobile site
$compressCSS_mob = false; // compress CSS of mobile site
$autoFlush_mob = true;
$autoFlushPlugins_mob = true;

/* Plugin settings*/
$disabledPluginsDesktop = array(); // add the folder names here if you want to specifically disable plugins on the main (full/desktop) site
$disabledPluginsMobile = array(); // add the folder names here if you want to specifically disable plugins on the mobile site





/* Database Settings */
/*$db['hostname'] = 'ip-72-167-35-104.ip.secureserver.net';
$db['username'] = 'dbdevsafe';
$db['password'] = 'Safdev#1';
$db['database'] = 'dbdevsafe';*/

$db['hostname'] = '127.0.0.1';
$db['username'] = 'root';
$db['password'] = '';
$db['database'] = 'dbdevsafe'; // 'dbindevsafe'

$db['dbdriver'] = 'mysql';
$db['dbprefix'] = '';
$db['pconnect'] = TRUE;
$db['db_debug'] = TRUE;
$db['cache_on'] = FALSE;
$db['cachedir'] = '';
$db['char_set'] = 'utf8';
$db['dbcollat'] = 'utf8_general_ci';
$db['swap_pre'] = '';
$db['autoinit'] = TRUE;
$db['stricton'] = FALSE;

$db['connection'] 	= mysqli_connect($db['hostname'], $db['username'], $db['password'], $db['database']);
// $db['select_db']	= mysql_select_db($db['database'], $db['connection'] );
?>