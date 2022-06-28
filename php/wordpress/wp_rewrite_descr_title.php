<?php

// wordrpess
// Переписать заголовки title + description поверх плагинов

add_filter( 'wpseo_title', 'my_title', 100);
add_filter( 'wpseo_metadesc', 'my_description', 100);

function my_title($title) {
    $title = 'Статьи компании XSA Ramps';
    return $title;
}

function my_description($description) {
    $description = 'Статьи о строительстве и проектировании скейт парков компанией XSA Ramps';
    return $description;
}

?>