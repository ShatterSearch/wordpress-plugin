<?php
    function photo_shortcode($attributes){
        global $wpdb;
        $return = '';
        $photoResults = $wpdb->get_results( 
            "select * from {$wpdb->prefix}ss_drop_items order by id desc limit 3" 
        );
        if(is_array($photoResults)){
            $return .= '<div class="ss-photo-cards">';
            foreach($photoResults as $photo){
                $retailer = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}ss_retailers WHERE id = %d", $photo->retailer_id ) );
                $return .= '
                    <div class="ss-photo-card">
                        <div class="ss-photo-image-wrapper">
                            <img src="' . $photo->image . '">
                        </div>
                        <div class="ss-photo-body">
                            <h3 class="ss-photo-heading">
                                <b>' . $photo->strain . '</b>
                                <span>' . $photo->type . '</span>
                            </h3>
                        </div>
                ';
                if($retailer){
                    $return .= '
                        <div class="ss-photo-store">
                            <div class="ss-photo-store-info">
                                <h3>' . $retailer->name . '</h3>
                    ';
                    if(!empty($retailer->address)){
                        $return .= '<p>' . $retailer->address;
                        if(!empty($retailer->city) && !empty($retailer->state) && !empty($retailer->zip)){
                            $return .= '<br />' . $retailer->city . ', &nbsp;' . $retailer->state . '&nbsp; ' . $retailer->zip . '</span>';
                        }
                        $return .= '</p>';
                    }
                    $return .= '<a href="https://www.google.com/maps/dir/?api=1&amp;destination=' . urlencode($retailer->address . ' ' . $retailer->city . ' ' . $retailer->state . ' ' . $retailer->zip) . '" target="_blank" class="ss-photo-directions-link">Directions</a>';
                    $return .= '</div>';
                    if(!empty($retailer->logo)){
                        $return .= '
                            <div class="ss-photo-logo-wrapper">
                                <img src="https://assets.shattersearch.com/a/storage' . $retailer->logo . '">
                            </div>
                        ';
                    }
                    $return .= '</div>';
                }
                $return .= '</div>';
            }
            $return .= '</div>';
        }
        return $return;
    }
?>