<?php
session_start();
var_dump($_SESSION);

if (sizeof($_SESSION) > 0) {
    echo "coba";
}

echo sizeof($_SESSION);
