<?php
function forum_controller_index(){
    require(MODEL_DIR.'/forum.php');
    $data = forum_model_list();
    // print_r($data);
    // Array ( [0] => Array ( [idForum] => 2 [titleForum] => Hello World ! [articleForum] => Tous les chemins mènent vers google [dateForum] => 2022-09-11 [idUserForum] => 1 [idUser] => 1 [name] => paul [userName] => julie@hotmail.com [password] => [birthday] => 1983-02-07 ) )
    render(VIEW_DIR.'/forum/index.php', $data); 
}

function forum_controller_create(){
    // require(MODEL_DIR.'/city.php');
    // $data = user_model_list();
    render(VIEW_DIR.'/forum/create.php'); // j'ai enlevé , $data)
}

function forum_controller_insert($request){
    require(MODEL_DIR.'/forum.php');
    forum_model_insert($request);
    header("Location: ?module=forum&action=index");
    render(VIEW_DIR.'/forum/view.php', $data);
}

function forum_controller_view($request){
        //print_r($request);,
    require(MODEL_DIR.'/forum.php');
    require(MODEL_DIR. '/user.php');
    $user = user_model_view($request); // $_SESSION['username'];
    $forum = forum_model_view($request);
    // require(MODEL_DIR.'/city.php');
    // $city = city_model_list();
    $data = array_merge(array('forum' => $forum), array('user' => $user)); 
    render(VIEW_DIR.'/forum/view.php', $data);
}

function forum_controller_edit($request){
    require(MODEL_DIR.'/forum.php');
    require(MODEL_DIR. '/user.php');
    $user = user_model_view($request); // $_SESSION['username'];
    $forum = forum_model_view($request);
    // require(MODEL_DIR.'/city.php');
    // $city = city_model_list();
    $data = array_merge(array('forum' => $forum), array('user' => $user)); 
    header("Location: ?module=forum&action=index");
}


function forum_controller_delete($request){
    require(MODEL_DIR.'/forum.php');
    forum_model_delete($request);
    // header("Location: ?module=user&action=delete"); *Dans le form il y a l'indication que l'action c'est aller chercher controller delete
    header("Location: ?module=forum&action=index"); // une fois que que la fonction est exécuté on redirige vers l'index **
}

?>