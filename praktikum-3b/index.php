<?php
require_once("function/CallPage.php");
callPage("navbar");
callPage("header");
if (isset($_GET['page'])) {
    callPage($_GET['page']);
} else{
    callPage("home");
   
}
callPage("footer");
callPage("about")


?>
