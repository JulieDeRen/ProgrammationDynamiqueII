<?php
function user_controller_index(){
    require(MODEL_DIR.'/user.php');
    // sert à maintenir une liste des utilisateurs, en créer et les updater
    $data = user_model_list();
    render(VIEW_DIR.'/user/index.php', $data);
}

// Création d'un nouvel utilisateur lorsqu'on appuie sur l'onglet
function user_controller_create(){
    // création d'utilisateur
    render(VIEW_DIR.'/user/create.php'); 
}

// Fonction qui envoie au modèle pour insérer dans la bd les infos provenant du formulaire
function user_controller_insert($request){
    require(MODEL_DIR.'/user.php');
    user_model_insert($request);
    // se loguer
    header("Location: ?module=user&action=login");
}
// Voir le profil de l'utilisateur et on dirige vers la vue utilisateur pour éditer ensuite
function user_controller_view($request){
    require(MODEL_DIR.'/user.php');
    $user = user_model_view($request);
    $data = (array('user' => $user)); 
    render(VIEW_DIR.'/user/view.php', $data);
}
// éditer le profil et renvoyer vers page index du forum
function user_controller_edit($request){
    require(MODEL_DIR.'/user.php');
    user_model_edit($request);
    header("Location: ?module=forum&action=index");
}

// Effacer un utilisateur.  Je n'utilise pas cette fonction actuellement, mais je pourrais ajouter option
function user_controller_delete($request){
    require(MODEL_DIR.'/user.php');
    user_model_delete($request);
    // header("Location: ?module=user&action=delete"); *Dans le form il y a l'indication que l'action c'est aller chercher controller delete
    header("Location: ?module=user&action=index"); // une fois que que la fonction est exécuté on redirige vers l'index **
}

// Pour ouvrir une session tout passe du formulaire à la fonction login dans le controleur user
function user_controller_login(){
    require(MODEL_DIR.'/user.php');
    render(VIEW_DIR.'/user/login.php'); 
}
// On authentifie le login qui passe en paramètre les info avec modèle et bd est redirige vers la page d'index du forum.  Si l'authenticité est validé, les options s'ouvrent sur la page d'index des vues
function user_controller_authentification($request){
    require(MODEL_DIR.'/user.php');
    user_model_login($request);
    header("Location: ?module=forum&action=index");
}
// Détruire une session et redirection vers la vue user login.
function user_controller_logout($request){
    require(MODEL_DIR. '/forum.php');
    require(MODEL_DIR.'/user.php');
    session_destroy();
    user_model_logout($request);
    header("Location: ?module=user&action=login");
    // header("Location: ?module=user&action=login");
}
?>