<?php

// Basic settings
// You must set these for the server to work

require '../dbconfig.php';

// The URL of to the server.php script.
$fullServerURL = "http://play.twohoursonelife.com/curseServer/server.php";




// The URL of the main, public-face website
$mainSiteURL = "https://twohoursonelife.com";



// End Basic settings



// Customization settings

// Adjust these to change the way the server  works.


$secondsPerCurseScoreDecrement = 3600;

// isCursed returns 1 if player has this curse score or higher
$curseThreshold = 8;

// people serve longer and longer times as "isCursed" as their
// lifetime total curse score grows.
// hours must be fraction < 1 or a whole number >= 1
$lifetimeThresholds = array(   0, 15, 25, 55, 65, 75 );
$hoursToServe =       array( 0.5,  1,  2,  3,  4,  5 );
$servingThreshold =   array(   8,  8,  7,  6,  4,  3 );

// how long you have to live in a life before it "counts" toward
// time served to decrement your curse score
// shorter lives don't count, to prevent auto-clickers from serving time
// by starving over and over.
$minServedSecondsCount = 600;





// secret shared with trusted game servers that allows them to post
// game stats

// MUST be changed from this default to prevent false game stats reporting.

// should not contain spaces

$sharedGameServerSecret = "secret_phrase";




// Prefix to use in table names (in case more than one application is using
// the same database).  Multiple tables are created (example: "log", "reviews",
//  and so on).
//
// If $tableNamePrefix is "test_" then the tables will be named
// "test_log" and "test_reviews" and son on.
//
// Thus, more than one server installation can use the same database
// (or the server can share a database with another application that uses
//  similar table names).
$tableNamePrefix = "curseServer_";



$enableLog = 1;


// should web-based admin require yubikey two-factor authentication?
$enableYubikey = 0;

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
$passwordHashingPepper = "262f43f043031282c645d0eb352df723a3ddc88f";

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
$accessPasswords = array( "8e409075ab35b161f6d2d57775e5efbee8d7b674",
                          "20e1883a3d63607b60677dca87b41e04316ffc63" );




// number of users shown per page in the browse view
$usersPerPage = 20;



// header and footers for various pages
$header = "include( \"../noBotsHeader.php\" );";
$footer = "include( \"../noCounterFooter.php\" );";





?>
