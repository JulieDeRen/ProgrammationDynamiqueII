<?php
function forum_model_list(){
    require(CONNEX_DIR);
    $sql = "SELECT * FROM forum INNER JOIN user ON idUserForum=idUser";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($con);
    return $result;
}


function forum_model_insert($request){
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $dateForum = date("Y-m-d");
    $idUserForum = $_SESSION['idUser'];
    $sql = "INSERT INTO forum (titleForum, articleForum, dateForum, idUserForum) VALUES ('$titleForum','$articleForum','$dateForum', '$idUserForum')";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

// la vue à éditer
function forum_model_view($request){
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    // établir une variable globale
    $_SESSION['idForumModelView'] = $id;
    $sql = "SELECT * FROM forum WHERE idForum = $id";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($result);
    mysqli_close($con);
    return $result;
}

function forum_model_edit($request){
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "UPDATE forum SET titleForum = '$titleForum', articleForum = '$articleForum', dateForum = '$dateForum' WHERE idForum = ".$_SESSION['idForumModelView'];
    mysqli_query($con, $sql);
    mysqli_close($con);
}

function forum_model_delete($request){
    // print_r($request);
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    } 
    $sql = "DELETE FROM forum WHERE idForum = '$idForum'";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

?>