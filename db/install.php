<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Code to be executed after the plugin's database scheme has been installed is defined here.
 *
 * @package     mod_dockmod
 * @category    upgrade
 * @copyright   2023 Eva 
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Custom code to be run on installing the plugin.
 */
function xmldb_dockmod_install() {
        global $DB;
    
        // Tabelle für Lernmaterialien erstellen
        $table = new xmldb_table('myplugin_learning_materials');
    
        // Spalten definieren
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('title', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null);
        $table->add_field('description', XMLDB_TYPE_TEXT, null, null, null, null, null);
        $table->add_field('fileurl', XMLDB_TYPE_CHAR, '255', null, null, null, null);
        $table->add_field('courseid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
        $table->add_field('timecreated', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
        $table->add_field('timemodified', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
    
        // Index hinzufügen
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));
    
        // Tabelle erstellen
        $dbman = $DB->get_manager();
        $dbman->create_table($table);
    
        // Beispiel-Daten einfügen (optional)
        $data = array(
            'title' => 'Introduction to Programming',
            'description' => 'A comprehensive guide to programming basics.',
            'fileurl' => '/path/to/intro_programming.pdf',
            'courseid' => 1,
            'timecreated' => time(),
            'timemodified' => time()
        );
        $DB->insert_record('myplugin_learning_materials', $data);
    }


