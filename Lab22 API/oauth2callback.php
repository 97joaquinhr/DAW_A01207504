<?php
/**
 * Created by PhpStorm.
 * User: joaqu
 * Date: 4/7/2018
 * Time: 2:53 PM
 */
session_start();
require_once __DIR__ . '/vendor/autoload.php';
$authCode = $_GET['code'];
if(isset($_GET["error"])){
    header("Location:logout.php");
}
define('APPLICATION_NAME', 'Google Calendar API PHP Evento');
define('CLIENT_SECRET_PATH', __DIR__ . '/client_secret.json');
define('SCOPES', implode(' ', array(
        Google_Service_Calendar::CALENDAR)
));
$client = new Google_Client();
$client->setApplicationName(APPLICATION_NAME);
$client->setScopes(SCOPES);
$client->setAuthConfig(CLIENT_SECRET_PATH);
$client->setAccessType('offline');
$accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

// Store the credentials to disk.
if (!file_exists(dirname($_SESSION["credentialPath"]))) {
    mkdir(dirname($_SESSION["credentialPath"]), 0700, true);
}
file_put_contents($_SESSION["credentialPath"], json_encode($accessToken));

$client->setAccessToken($accessToken);

// Refresh the token if it's expired.
if ($client->isAccessTokenExpired()) {
    $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
    file_put_contents($_SESSION["credentialPath"], json_encode($client->getAccessToken()));
}
$service = new Google_Service_Calendar($client);
$event = new Google_Service_Calendar_Event(array(
    'summary' => 'Google I/O 2015',
    'location' => '800 Howard St., San Francisco, CA 94103',
    'description' => 'A chance to hear more about Google\'s developer products.',
    'start' => array(
        'dateTime' => '2018-05-01T09:00:00-07:00',
        'timeZone' => 'America/Los_Angeles',
    ),
    'end' => array(
        'dateTime' => '2018-05-01T17:00:00-07:00',
        'timeZone' => 'America/Los_Angeles',
    ),
    'recurrence' => array(
        'RRULE:FREQ=DAILY;COUNT=2'
    ),
    'attendees' => array(
        array('email' => 'lpage@example.com'),
        array('email' => 'sbrin@example.com'),
    ),
    'reminders' => array(
        'useDefault' => FALSE,
        'overrides' => array(
            array('method' => 'email', 'minutes' => 24 * 60),
            array('method' => 'popup', 'minutes' => 10),
        ),
    ),
));

$calendarId = 'primary';
$event = $service->events->insert($calendarId, $event);
echo "<h1>Evento creado</h1> <br><a href='logout.php'>Regresar</a>";

//header("location:evento.php");