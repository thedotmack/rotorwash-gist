<?php
/*
Plugin Name:    RotorWash Embed GitHub Gist
Plugin URI:     http://github.com/copterlabs/rotorwash-plugin-gist
Description:    Adds support for a shortcode which will embed 
                <a href="http://gist.github.com">GitHub Gists</a> into content.
Version:        1.0
Author:         Jason Lengstorf <jason.lengstorf@copterlabs.com>
Author URI:     http://www.copterlabs.com/blog/

Copyright 2012 Copter Labs

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

$gist = new RW_Gist;

class RW_Gist
{
    public function __construct(  )
    {
        add_shortcode('gist', array($this, 'embed_shortcode'));
    }

    public function embed_shortcode( $attr )
    {
        $defaults = array(
                'id' => NULL
            );
        extract(shortcode_atts($defaults, $attr));

        if( empty($id) )
        {
            return;
        }

        ob_start();
?>
        <!-- Begin Rotorwash Gist (ID: <?php echo $id; ?>) -->
        <script src="https://gist.github.com/<?php echo $id; ?>.js"> </script>
        <noscript>
            <p>
                Since JavaScript is disabled, you'll need to view this gist on 
                GitHub: 
                <a href="https://gist.github.com/<?php echo $id; ?>">https://gist.github.com/<?php echo $id; ?></a>
            </p>
        </noscript>
<?php
        return ob_get_clean();
    }
}
