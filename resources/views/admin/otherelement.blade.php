<!-- PHP Part-->
<?php

//other element admin 
use App\Models\bisnis;

// =======================================================
// ========  TARGET FORMULA ===============
// =======================================================
function getBisnisCount($id_business_categories)
{
    $count = bisnis::where('id_business_categories',$id_business_categories)->count();
    return $count;
}
?>

<!--end of PHP part-->
