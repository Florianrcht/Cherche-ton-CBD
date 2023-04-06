<?php

header("Access-Control-Allow-Origin: *");

include_once __DIR__ . "/../src/init.php";

$pageglobal ='global';
$pagecss ='';

$page ='accueilUser';


if (isset($_GET['page'])){
        $page = $_GET['page'];
        
}
if ($page == 'accueilUser'){
    $pagecss = 'accueilUser';
}
if ($page == 'boutiques'){
    $pagecss = 'boutiques';
}
if ($page == 'administrateur'){
    $pagecss = 'administrateur';
}
if ($page == 'producteur'){
    $pagecss = 'producteur';
}
if ($page!="register" && $page!="login"){
    include_once __DIR__ . "/../src/templates/partials/$pageglobal/header_".$pageglobal.".php";
}


include_once __DIR__ . "/../src/templates/pages/$page.php";


include_once __DIR__ . "/../src/templates/template.php";


    
if ($page!='register' && $page!='login'){
    include_once __DIR__ . "/../src/templates/partials/$pageglobal/footer_".$pageglobal.".php";
}

?>

