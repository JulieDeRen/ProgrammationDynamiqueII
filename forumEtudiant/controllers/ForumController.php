<?php
// Afficher tous les articles
function forum_controller_index(){
    require(MODEL_DIR.'/forum.php');
    $data = forum_model_list();
    render(VIEW_DIR.'/forum/index.php', $data); 
}
// Nouveaux article envoie vers création qui renvoie vers la vue create
function forum_controller_create(){
    render(VIEW_DIR.'/forum/create.php');
}
// Insérer la requête de l'utilisateur dans la base de donnée et renvoyer vers le forum index
function forum_controller_insert($request){
    require(MODEL_DIR.'/forum.php');
    forum_model_insert($request);
    header("Location: ?module=forum&action=index");
}
// Diriger vers la vue de l'article que l'utilisateur choisi avec tous les champs important d'avoir les donées utilisateurs et forum
function forum_controller_view($request){
    require(MODEL_DIR.'/forum.php');
    require(MODEL_DIR. '/user.php');
    $user = user_model_view($request); 
    $forum = forum_model_view($request);
    $data = array_merge(array('forum' => $forum), array('user' => $user)); 
    render(VIEW_DIR.'/forum/view.php', $data);
}
// La vue envoie l'infos entrées par utilisateur vers la fonction du modèle d'édition pour updater la base de données
function forum_controller_edit($request){
    require(MODEL_DIR.'/forum.php');
    $forum = forum_model_edit($request);
    $data = array('forum' => $forum); 
    header("Location: ?module=forum&action=index");
}
// Effacer la ligne sélectionnée
function forum_controller_delete($request){
    require(MODEL_DIR.'/forum.php');
    forum_model_delete($request);
    // une fois que que la fonction est exécuté on redirige vers l'index 
    header("Location: ?module=forum&action=index"); 
}

?>