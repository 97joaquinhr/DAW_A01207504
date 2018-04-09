<?php
/**
 * Created by PhpStorm.
 * User: joaqu
 * Date: 4/7/2018
 * Time: 1:28 PM
 */
// Refer to the PHP quickstart on how to setup the environment:
// https://developers.google.com/calendar/quickstart/php
// Change the scope to Google_Service_Calendar::CALENDAR and delete any stored
// credentials.
session_start();
require_once __DIR__ . '/vendor/autoload.php';

echo "<a role='button' class='button' href='logout.php'>Log out</a>";
define('APPLICATION_NAME', 'Google Calendar API PHP Evento');
define('CREDENTIALS_PATH', '~/.credentials/calendar-php-evento1.json');
define('CLIENT_SECRET_PATH', __DIR__ . '/client_secret.json');
// If modifying these scopes, delete your previously saved credentials
// at ~/.credentials/calendar-php-evento.json
define('SCOPES', implode(' ', array(
        Google_Service_Calendar::CALENDAR)
));
// Prevent DateTime tz exception
date_default_timezone_set('America/Mexico_City');


/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient() {
    if (!isset($_SESSION["authCode"]) || !isset($client)) {
        $client = new Google_Client();
        $client->setApplicationName(APPLICATION_NAME);
        $client->setScopes(SCOPES);
        $client->setAuthConfig(CLIENT_SECRET_PATH);
        $client->setAccessType('offline');

        // Load previously authorized credentials from a file.
        $_SESSION["credentialPath"] = expandHomeDirectory(CREDENTIALS_PATH);

        $authUrl = $client->createAuthUrl();
        header("location:" . filter_var($authUrl, FILTER_SANITIZE_URL));
    }
}

/**
 * Expands the home directory alias '~' to the full path.
 * @param string $path the path to expand.
 * @return string the expanded path.
 */
function expandHomeDirectory($path) {
    $homeDirectory = getenv('HOME');
    if (empty($homeDirectory)) {
        $homeDirectory = getenv('HOMEDRIVE') . getenv('HOMEPATH');
    }
    return str_replace('~', realpath($homeDirectory), $path);
}

getClient();
