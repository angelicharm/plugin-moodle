<?php
// This file is part of Moodle - http://moodle.org/
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Block which allows you to search in the connected edu-sharing-repository.
 *
 * @package    block_edusharing_search
 * @copyright  metaVentis GmbH — http://metaventis.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Block which allows you to search in the connected edu-sharing-repository.
 *
 * @copyright  metaVentis GmbH — http://metaventis.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_edusharing_search extends block_base
{

    /**
     * Initialize this block.
     *
     */
    public function init() {
        $this->title   = get_string('block_title', 'block_edusharing_search');
        $this->version = 2015060901;
    }

    /**
     * (non-PHPdoc)
     * @see blocks/block_base::get_content()
     */
    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }

        global $CFG;
        global $COURSE;

        $this->content         = new stdClass;
        $this->content->text   = '<form action="'.$CFG->wwwroot.'/blocks/edusharing_search/helper/cc_search.php" method="get">
                                 <input type="hidden" name="id" value="'.htmlentities($COURSE->id).'" /><input type="text" style="width: 100%;margin-bottom: 5px;" name="search"
                                 value="'.htmlentities(get_string('search_field_hint', 'block_edusharing_search')).'"
                                 onclick="if (this.value==\''.htmlentities(get_string('search_field_hint', 'block_edusharing_search')).'\') this.value=\'\';" />
                                 <input type="submit" class="btn btn-primary" value="'.htmlentities(get_string('button_text', 'block_edusharing_search')).'" />
                                 <input type="hidden" name="sesskey" value="'.sesskey().'"/></form>';

        return $this->content;
    }

}
