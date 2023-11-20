<?php
function xmldb_dockmod_install($oldversion) {
    global $DB;

    $dbman = $DB->get_manager();

    if ($oldversion < XXXXXXXXXX) { // Aktualisiere, wenn die alte Version kleiner ist als die neue Versionsnummer
        // Füge hier Aktualisierungsskript hinzu
    }

    return true;
}
