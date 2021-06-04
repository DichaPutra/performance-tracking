<!-- PHP Part-->
<?php

// Color Function For Level and Name
function color($level) {
    switch ($level) {
        case 0:
            return "#BDD7EE";
            break;
        case 1:
            return "#FEE599";
            break;
        case 2:
            return "#C5E0B3";
            break;
    }
}

function levelName($level) {
    switch ($level) {
        case 0:
            return "0. Corporate";
            break;
        case 1:
            return "1. Division";
            break;
        case 2:
            return "2. Departement";
            break;
    }
}
?>
<!--end of PHP part-->
