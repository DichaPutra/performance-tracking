<!-- PHP Part-->
<?php

use App\Models\target_so;
use App\Models\target_kpi;
use App\Models\target_si;
use App\Models\active_target_kpi;
use App\Models\capaian_kpi;
use App\Models\actionplan;

// =======================================================
// ========  TARGET FORMULA ===============
// =======================================================
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

function getRangePeriod($id_user, $tahun)
{
    $period = target_kpi::where('id_user', $id_user)->where('periode_th', $tahun)->first();
    if ($period == null)
    {
        return 'n/a';
    }
    else
    {
        return $period['range_period'];
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

function getCountSI($id_user, $tahun)
{
    $count = target_si::where('id_user', $id_user)->where('periode_th', $tahun)->count();
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

function getTargetbyMonth($id_user, $idtargetkpi, $bulan, $tahun)
{
    $target = active_target_kpi::where('id_user', $id_user)
            ->where('id_target_kpi', $idtargetkpi)
            ->where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->first();
    //get data from array first();
    //var_dump($target);
    if ($target == null)
    {
        $targetbln = '-';
    }
    else
    {
        $targetbln = $target['target'];
    }

    return $targetbln;
}

function checkActiveTarget($id_user, $bulan, $tahun)
{
    $cekActive = active_target_kpi::where('id_user', $id_user)->where('bulan', $bulan)->where('tahun', $tahun)->first();
    return $cekActive['bulan'];
}

function checkTargetTerakhir($id_user, $tahun)
{
    $cekActive = active_target_kpi::where('id_user', $id_user)->where('tahun', $tahun)->orderBy('bulan', 'desc')->first();
    if ($cekActive == null)
    {
        return 0;
    }
    else
    {
        return $cekActive['bulan'];
    }
}

// =======================================================
// ========  PERFORMANCE REPORT FORMULA ===============
// =======================================================

function getPeriodePerformance($id_user, $periode_th)
{
    $sumweightedscore = capaian_kpi::where('id_user', $id_user)
            ->where('periode_th', $periode_th)
            ->where('approval', 'approved')
            ->sum('weightedscore');
    $sumweight = capaian_kpi::where('id_user', $id_user)
            ->where('periode_th', $periode_th)
            ->where('approval', 'approved')
            ->sum('weight');

    if ($sumweight == 0)
    {
        $performance = 'n/a';
    }
    else
    {
        $performance = round($sumweightedscore / $sumweight, 2);
    }

    return $performance;
}

function isTargetExist($id_user, $periode_th)
{
    $cektarget = target_kpi::where('id_user', $id_user)->where('periode_th', $periode_th)->first();
    if ($cektarget != null)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function detailCapaianApprove($bulan, $tahun, $id_user)
{
    $capaianApproval = capaian_kpi::where('bulan', $bulan)
                    ->where('tahun', $tahun)
                    ->where('id_user', $id_user)
                    ->where('approval', 'waiting for approval')->get();

    return $capaianApproval;
}

// =======================================================
// ========  STRATEGIC INITIATIVE FORMULA ===============
// =======================================================


function getCountSIbyUser($id_user, $tahun)
{
    $count = target_si::where('id_user', $id_user)->where('periode_th', $tahun)->count();
    return $count;
}

function getCountSIbyKPI($id_target_kpi, $tahun)
{
    $count = target_si::where('id_target_kpi', $id_target_kpi)->where('periode_th', $tahun)->count();
    return $count;
}

function getCountActionPlan($idsi, $tahun)
{
    $count = actionplan::where('id_target_si', $idsi)->where('periode_th', $tahun)->count();
    return $count;
}
?>

<!--end of PHP part-->
