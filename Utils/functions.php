<?php

/**
 * Fonction échappant les caractères html dans $message
 * @param string $message chaîne à échapper
 * @return string chaîne échappée
 */
function e($message){

    return htmlspecialchars($message, ENT_QUOTES);
}

function AfficheAlerte(?string $message) {
    
    if(!is_null($message) && !empty($message)) {
        return "<p><strong><i> Alerte : {$message}</i></strong></p>";
    }
}