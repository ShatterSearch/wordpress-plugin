<?php
    function states_shortcode(){
        global $wpdb;
        $return = '
            <div id="ssStates">
               <div>
                    <ul class="ss-state-list">
                        <li><a href="#Colorado">Colorado</a></li>
                        <li><a href="#California">California</a></li>
                    </ul>
                </div>
            </div>
        ';
        return $return;
    }
?>