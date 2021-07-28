<!-- PHP Part-->
<?php

//other element admin 
use App\Models\bisnis;
use App\Models\kpi_library;

// =======================================================
// ========  TARGET FORMULA ===============
// =======================================================
function getBisnisCount($id_business_categories)
{
    $count = bisnis::where('id_business_categories', $id_business_categories)->count();
    return $count;
}

function getKpiLibraryCount($id_so_library)
{
    $count = kpi_library::where('id_so_library', $id_so_library)->count();
    return $count;
}
?>

<!--end of PHP part-->
