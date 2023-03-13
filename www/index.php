<?php
header("Access-Control-Allow-Origin: *");

include_once __DIR__ . "/../src/init.php";

$pagecssautre ='';
$pagecss ='';

$page ='accueilUser';


if (isset($_GET['page'])){
        $page = $_GET['page'];
    

}
if ($page == 'accueilUser'){
    $pagecss = 'accueilUser';
}


if ($page == 'accueilUser'){
    include_once __DIR__ . "/../src/templates/partials/$pagecss/header_".$pagecss.".php";
} 

include_once __DIR__ . "/../src/templates/pages/$page.php";

include_once __DIR__ . "/../src/templates/template.php";


if ($page == 'accueilUser'){
    include_once __DIR__ . "/../src/templates/partials/$pagecss/footer_".$pagecss.".php";
    
}

?>
