<!-- PHP Part-->
<?php

use App\Models\target_so;
use App\Models\target_kpi;
use App\Models\target_si;
use App\Models\active_target_kpi;

// =======================================================
// ========  TARGET FORMULA ===============
// =======================================================
// Color Function For Level and Name
function color($level)
{
    switch ($level)
    {
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

function levelName($level)
{
    switch ($level)
    {
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

function getCountSO($id_user, $tahun)
{
    $count = target_so::where('id_user', $id_user)->where('periode_th', $tahun)->count();
    return $count;
}

function getCountKPI($id_user, $tahun)
{
    $count = target_kpi::where('id_user', $id_user)->where('periode_th', $tahun)->count();
    return $count;
}

function getStatusTarget($id_user, $tahun)
{
    $count = target_kpi::where('id_user', $id_user)->where('periode_th', $tahun)->sum('is_active');
    if ($count == 0)
    {
        $text = "Not Active";
    }
    else
    {
        $text = 'Active';
    }
    return $text;
}

function getTargetbyMonth($id_user, $bulan, $tahun, $idtargetkpi)
{
    $target = active_target_kpi::where('id_user', $id_user)
            ->where('id_target_kpi', $idtargetkpi)
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->first();
    //get data from array first();
    $targetbln = $target['target'];

    return $targetbln;
}

// =======================================================
// ========  STRATEGIC INITIATIVE FORMULA ===============
// =======================================================


function getCountSIbyUser($id_user)
{
    $cout = target_si::where('id_user', $id_user)->count();
    return $cout;
}

function getCountSIbyKPI($id_target_kpi)
{
    $cout = target_si::where('id_target_kpi', $id_target_kpi)->count();
    return $cout;
}
?>

<!--end of PHP part-->
