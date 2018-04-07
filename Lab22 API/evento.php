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

date_default_timezone_set('America/Mexico_City'); // Prevent DateTime tz exception
//if (php_sapi_name() != 'cli') {
//    throw new Exception('This application must be run on the command line.');
//}

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
//        print_r($client) ;


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

// Get the API client and construct the service object.
getClient();
//$service = new Google_Service_Calendar($client);
//$event = new Google_Service_Calendar_Event(array(
//    'summary' => 'Google I/O 2015',
//    'location' => '800 Howard St., San Francisco, CA 94103',
//    'description' => 'A chance to hear more about Google\'s developer products.',
//    'start' => array(
//        'dateTime' => '2018-05-01T09:00:00-07:00',
//        'timeZone' => 'America/Los_Angeles',
//    ),
//    'end' => array(
//        'dateTime' => '2018-05-01T17:00:00-07:00',
//        'timeZone' => 'America/Los_Angeles',
//    ),
//    'recurrence' => array(
//        'RRULE:FREQ=DAILY;COUNT=2'
//    ),
//    'attendees' => array(
//        array('email' => 'lpage@example.com'),
//        array('email' => 'sbrin@example.com'),
//    ),
//    'reminders' => array(
//        'useDefault' => FALSE,
//        'overrides' => array(
//            array('method' => 'email', 'minutes' => 24 * 60),
//            array('method' => 'popup', 'minutes' => 10),
//        ),
//    ),
//));
//
//$calendarId = 'primary';
//$event = $service->events->insert($calendarId, $event);
//printf('Event created: %s\n', $event->htmlLink);