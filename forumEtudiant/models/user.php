<?php
function user_model_list(){
    require(CONNEX_DIR);
    $sql = "SELECT * FROM user";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($con);
    return $result;
}


function user_model_insert($request){
    require(CONNEX_DIR);
    $birthday="";
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $password = password_hash($password, PASSWORD_BCRYPT);
    // condition d'anniversaire puisque n'est pas requis dans le modèle logique de la bd
    if($birthday == ""){
        $sql = "INSERT INTO user (idUser, name, userName, password, birthday) VALUES (NULL, '$name','$userName','$password', NULL)";
    }
    else{
        $sql = "INSERT INTO user (idUser, name, userName, password, birthday) VALUES (NULL, '$name','$userName','$password','$birthday')";
    }
    mysqli_query($con, $sql);
    mysqli_close($con);
}

function user_model_view(){
    require(CONNEX_DIR);
    // On accède à la variable gloable _SESSION donc on s'en sert pour la requête mysql
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM user WHERE userName = '$username'";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($result);
    mysqli_close($con);
    return $result;
}

function user_model_edit($request){
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "UPDATE user SET name = '$name', userName = '$userName', birthday = '$birthday' WHERE idUser = '$idUser'";
    // réaffecter la variable globale session à la position nom
    $_SESSION['name']=$request['name'];
    mysqli_query($con, $sql);
    mysqli_close($con);
}

function user_model_delete($request){
    // print_r($request);
    require(CONNEX_DIR);
    foreach($request as $key=>$value){
        $$key=mysqli_real_escape_string($con,$value);
    }
    $sql = "DELETE FROM user WHERE idUser = '$idUser'";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

function user_model_login($request){
    // session_start();
    require(CONNEX_DIR);
    foreach($request as $key =>$value){
        $$key=mysqli_real_escape_string($con, $value);
    };
    // print_r($request); die();
    $sql="SELECT * FROM user WHERE userName = '$username'";
    $result=mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    // print_r($count); die();
    if($count == 1){
        $user = mysqli_fetch_assoc($result); // $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $dbpassword = $user['password'];
        // si le mot de passe est exact après déchiffrage, affecter la variable globale session
        if(password_verify($password, $dbpassword)){ 
            $_SESSION['name'] = $user['name']; 
            $_SESSION['idUser'] = $user['idUser']; 
            $_SESSION['username'] = $user['userName']; 
            $_SESSION['birthday'] = $user['birthday']; 
            $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']); 
        }
    }
    mysqli_close($con);
}
function user_model_logout($request){
    require(CONNEX_DIR);
}

?>