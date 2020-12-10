<?php
if ($_SERVER['REQUEST_URI'] =='/'){
    return readfile('index.html');
}

?>