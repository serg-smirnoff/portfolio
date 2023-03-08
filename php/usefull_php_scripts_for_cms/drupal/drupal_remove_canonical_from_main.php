<?php

// Drupal - убрать Canonical на главной

function nazvanietemy_html_head_alter(&$head_elements) {
    foreach ($head_elements as $key => $element) {
        if (isset($element['#attributes']['rel']) && $element['#attributes']['rel'] == 'canonical') {
            unset($head_elements[$key]);
        }
    }
}
?>