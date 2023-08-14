<?php
//removendo a rota w2_user do wordpress para segurança do usuario;
//remove_action('rest_api_init', 'create_initial_rest_routes', 99);

$dirbase = get_template_directory();

//Buscando o arquivo de endpoint "user_post.php";
require_once $dirbase . '/endpoints/user_post.php';
require_once $dirbase . '/endpoints/user_get.php';

require_once $dirbase . '/endpoints/photo_post.php';
require_once $dirbase . '/endpoints/photo_delete.php';


update_option('large_size_w', 1000);
update_option('large_size_h', 1000);
update_option('large_crop', 1);



function change_api(){
    return 'json';
}
add_filter('rest_url_prefix', 'change_api');

function expire_token(){
    return time() + (60 * 60 * 24);
}

add_action('jwt_auth_expire', 'expire_token');

?>