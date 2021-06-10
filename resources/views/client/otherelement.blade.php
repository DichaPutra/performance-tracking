<!-- PHP Part-->
<?php

use App\Models\target_so;

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

function getCountSO($id_user) {
    $count = target_so::where('id_user', $id_user)->count();
    return $count;
}

function getCountKPI($id_user) {

}
?>

<!--end of PHP part-->
