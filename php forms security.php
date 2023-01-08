<?php
/*
| -----------------------------------------------------
| PRODUCT NAME:     PHP SECURITY
| -----------------------------------------------------
| AUTHOR:           HOSEA LEONARD SANGA -HOLESA
| -----------------------------------------------------
| EMAIL:            hosea.leonard@yahoo.com
| -----------------------------------------------------
| COPYRIGHT:        ALL RIGHTS RESERVED BY HOSEA LEONARD SANGA
| -----------------------------------------------------
| WEBSITE:          https://holesatech.co.tz
| -----------------------------------------------------
*/
function holesainject($test) {

    $find = array(
        "/[\r\n]/", 
        "/%0[A-B]/",
        "/%0[a-b]/",
        "/bcc\:/i",
        "/Content\-Type\:/i",
        "/Mime\-Version\:/i",
        "/cc\:/i",
        "/from\:/i",
        "/to\:/i",
        "/Content\-Transfer\-Encoding\:/i"
    );
    $ret = preg_replace($find, "", $test);
    return $ret;
}

function holesageneratescsrftoken() {

    if (!isset($_SESSION)) {

        session_start();
    }

    if (empty($_SESSION['token'])) {

        $_SESSION['token'] = bin2hex(random_bytes(32));
    }
}

function holesainsertcsrftokeninform() {

    holesainsertcsrftokeninform();

    echo '<input type="hidden" name="token" value="' . $_SESSION['token'] . '" />';
}

function holesaverifygeneratedcsrftoken() {

    holesainsertcsrftokeninform();

    if (!empty($_POST['token'])) {

        if (hash_equals($_SESSION['token'], $_POST['token'])) {

            return true;
        } 
        else {
            
            return false;
        }
    }
    else {

        return false;
    }
}
