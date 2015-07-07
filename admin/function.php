<?php

/**
 * Indique si le client est authentifié en tant qu’administrateur, selon sa 
 * session.
 * @return bool
 */
function is_admin() {
    return (isset($_SESSION['admin']) && $_SESSION['admin']);
}
?>