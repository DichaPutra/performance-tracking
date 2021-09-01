<!-- PHP Part-->
<?php

use App\Models\capaian_kpi;
use Illuminate\Support\Facades\Auth;

// =======================================================
// ========  CAPAIAN FORMULA ===============
// =======================================================
// Color Function For Level and Name
function getCapaianPersonnel($bulan, $tahun, $id_acive_target_kpi)
{
    $capaianq = capaian_kpi::where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->where('id_user', Auth::user()->id)
            ->where('id_active_target_kpi', $id_acive_target_kpi)
            ->first();

    $capaian = $capaianq['capaian'];
    return $capaian;
}

function getStatusApproval($bulan, $tahun)
{
    $capaianq = capaian_kpi::where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->where('id_user', Auth::user()->id)
            ->first();

    if ($capaianq != null)
    {
        $approval = $capaianq['approval'];
    }
    else
    {
        $approval = null;
    }
    return $approval;
}

// =======================================================
// ========  STRATEGIC INITIATIVE FORMULA ===============
// =======================================================
?>

<!--end of PHP part-->
