<?php
include_once "index.html.html";
include_once "datebase.php";

section_start();



user_reg($connect);
user_login($connect);
session_destroy();


session_destroy();


include_once get_path_to_page();

?>