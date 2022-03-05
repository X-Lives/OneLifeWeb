<?php

// Basic settings
// You must set these for the server to work

require '../config.php';

// The URL of to the server.php script.
$fullServerURL = "http://play.twohoursonelife.com/ticketServer/server.php";


// The URL of the main, public-face website
$mainSiteURL = "http://play.twohoursonelife.com/";



// End Basic settings



// Customization settings

// Adjust these to change the way the server  works.


// Prefix to use in table names (in case more than one application is using
// the same database).  Three tables are created:  "log", "tickets", and
// "downloads".
//
// If $tableNamePrefix is "test_" then the tables will be named
// "test_log" and "test_tickets" and "test_downloads".
//
// Thus, more than one server installation can use the same database
// (or the server can share a database with another application that uses
//  similar table names).
$tableNamePrefix = "ticketServer_";


// number of "readable base-32" digits (2-9,A-H,J-N,P-Z) in each ticket ID
// Tickets are broken up into clumps of 5 digits separated by "-"
// max supported length is 210 (with separators inserted, this is a
// 251-character string)
// 5 bits of security per digit.
$ticketIDLength = 20;

// Replace this with a secret string.
// Used when generating random, unguessable ticket IDs
// also used to generate nonces for Yubikey authentication
$ticketGenerationSecret = $sharedEncryptionSecret;



$enableLog = 1;


// should web-based admin require yubikey two-factor authentication?
// $enableYubikey = 1;

// 12-character Yubikey IDs, one list for each access password
// each list is a set of ids separated by :
// (there can be more than one Yubikey ID associated with each password)
$yubikeyIDs = array( "ccccccbjlfbi:ccccccbjnhjc:ccccccbjnhjn", "ccccccbjlfbi" );

// used for verifying response that comes back from yubico
// Note that these are working values, but because they are in a public
// repository, they are not secret and should be replaced with your own
// values (go here:  https://upgrade.yubico.com/getapikey/ )
$yubicoClientID = "9943";
$yubicoSecretKey = "rcGgz0rca1gqqsa/GDMwXFAHjWw=";


// For hashing admin passwords so that they don't appear in the clear
// in this file.
// You can change this to your own string so that password hashes in
// this file differ from hashes of the same passwords used elsewhere.
// $passwordHashingPepper = "262f43f043031282c645d0eb352df723a3ddc88f";

// passwords are given as hashes below, computed by:
// hmac_sha1( $passwordHashingPepper,
//            hmac_sha1( $passwordHashingPepper, $password ) )
// Where $passwordHashingPepper is used as the hmac key.
// Client-side hashing sends the password to the server as:
//   hmac_sha1( $passwordHashingPepper, $password )
// The extra hash performed by the server prevents the hashes in
// this file from being used to login directly without knowing the actual
// password.

// For convenience, after setting a $passwordHashingPepper and chosing a
// password, hashes can be generated by invoking passwordHashUtility.php
// in your browser.

// default passwords that have been included as hashes below are:
// "secret" and "secret2"

// hashes of passwords for for web-based admin access
// $accessPasswords = array( "8e409075ab35b161f6d2d57775e5efbee8d7b674",
//                          "20e1883a3d63607b60677dca87b41e04316ffc63" );


// secret used for encrypting a download code when it is requested for a
// given email address
// (for remote procedure calls that need to obtain a download code for a given
//  user)
// MUST replace this to keep ticket ids secret from outsiders
// $sharedEncryptionSecret = "19fbc6168268d7a80945e35d999f0d0ddae4cdff";


// batch size for sending email to all opt-in users
// useful if your server has a "max emails per hour" limit
// (My server has a limit of 1000/hour)
$emailMaxBatchSize = 900;




// maps item purchase tags to dates in New York time
$allowedDownloadDates = array( "april_9" => "2010-04-09 00:00:00",
                               "april_12" => "2010-04-12 00:00:00" );

// secret shared with fastspring server, one per purchase tag from above
$fastspringPrivateKeys = array( "april_9" => "secret A",
                                "april_12" => "secret B" );


// files to serve, from path below
$fileList = array( "sueFamilyWeb.jpg", "SleepIsDeath_v2_UnixSource.tar.gz" );

$fileDescriptions = array(
    "Sue's family picture, from the archive.",
    "Unix (and Mac/Windows) Source Code (<A HREF=\"sourceCompileNotes.shtml\">notes</A>)" );



// should not be web-accessible
$downloadFilePath = "/home/jcr13/sidDownloads/";


// should remote mirrors be used instead?
$useRemoteMirrors = 0;

// one URL per line, each ending with "/"
// appending file names from $fileList directly should produce valid
// download URLs
//
// NOTE:  using the mirror system eliminates download security, as these
// URLs do NOT use ticket IDs.
// If one of these URLs leaks, anyone can download the file from the mirror
//
// On the other hand, it makes rolling out new mirrors trivial.
// The trade-off may be acceptable in some cases (a server-based game
// where the download is useless without an account---people will not be
// motivated to waste our bandwidth by downloading it without paying).
$remoteMirrorURLFile = "/home/jcr13/sidDownloads/remoteServerList.ini";




// header and footers for various pages
$header = "include( \"header.php\" );";
$footer = "include( \"footer.php\" );";

$fileListHeader = $header .
'echo "<center><font size=6>Downloads</font><br><br>"; ' .
'echo "Your account email is: <b>$email</b><br><br>"; '.
'echo "Your Download Code is: <b>$ticket_id</b><br><br><br>"; '.
'if( $coupon_code != "" ) { '.
'    echo "Give this coupon code to a friend: "; '.
'    echo "<b>$coupon_code</b><br><br><br>"; '.
'    } '.
'echo "</center>"; ';




// parameters for download emails that are sent out
$siteName = "Sleep Is Death";
$siteEmailAddress = "Jason Rohrer <jcr13@cornell.edu>";
$siteEmailDomain = "cornell.edu";

// can be left blank to just give download information
// should contain newlines to separate it from next part of email
// if not blank
$extraEmailMessage =
"Please share the following information with a friend, so that you ".
"have someone to play the game with.\n\n";




// number of tickets shown per page in the browse view
$ticketsPerPage = 6;


// can users edit their own email?
$canEditEmail = false;



// SMTP settings

// if off, then raw sendmail is used instead 
$useSMTP = 0;

// SMTP requires that the PEAR Mail package is installed
// set the include path here for Mail.php, if needed:
/*
ini_set( 'include_path',
         ini_get( 'include_path' ) . PATH_SEPARATOR . '/home/jcr13/php' );
*/

$smtpHost = "ssl://mail.server.com";

$smtpPort = "465";

$smtpUsername = "jason@server.com";

$smtpPassword = "secret";



// separate SMTP for mission-critical, transactional emails (like download code
// emails)
// Defaults to being same as the above SMTP, which is used for bulk messages
//  (like a note sent to everyone).
$smtpHostTrans = $smtpHost;

$smtpPortTrans = $smtpPort;

$smtpUsernameTrans = $smtpUsername;

$smtpPasswordTrans = $smtpPassword;


// set to 1 to use bulk emailer instead of smtp directly
// this is ONLY used for bulk notes to all
$useBulkEmailerForNotes = 0;

// path to bulkEmailer api
$bulkEmailerPath = "../bulkEmailer/bulkEmailerAPI.php";


// transfering all data to the bulk emailer can still
// take a while, causing PHP gateway timeouts
// Even if timeout wasn't an issue, running a long sever-side
// process is fragile (browser can crash, etc.)
// so split it up into batches.
$bulkEmailBatchSize = 10000;



// key to prove our publisher identity to Steam API
// this key must be kept secret.
$steamWebAPIKey = "REPLACE_ME";


// the app ID that we check ownership for
// example ID is for The Castle Doctrine
$steamAppID = "249570";


?>