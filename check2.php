<?php
require_once "classBlog.php";

session_start();
Blog::update();

header("Location: formManageBlog.html");
?>