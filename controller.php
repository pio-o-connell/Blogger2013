<?php

include("library.php");

// start point for script 
main();

function main() {


    $cmd = "";

    if (isset($_POST['cmd'])) {
        $cmd = $_POST['cmd'];
    } else if (isset($_GET['cmd'])) {
        $cmd = $_GET['cmd'];
    }


    switch ($cmd) {
        case "":
            new View1();
            break;
        case "register":
            new View4();
            break;
        case "login":
            new View2();
            break;
        case "loginRequest":
            handleLogin();
            break;
        case "addPost":
            handleAddpost();
            break;
    }
}

function handleAddpost() {
    if (isset($_COOKIE['username'])) {
        new InsideView();
    } else {
        new View2();
    }
}

function handleLogin() {


    $DBM = new DBManager();

    $result = $DBM->processLogin($_POST['username'], $_POST['password']);
    if ($result == "blogger") {

        // no output before setCookie
        setCookie("username", $_POST['username'], time() + 3600);
        new InsideView();
    } else {
        // admin can't login at the moment
        new View2();
    }
}
