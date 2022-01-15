<?php
    global $wpdb;
    print '<div id="ssDrops">';
    $dropsResults = $wpdb->get_results( 
        "select * from {$wpdb->prefix}ss_drops order by id desc limit 10" 
    );
    print '<div class="ss-drops">';

    foreach($dropsResults as $drop){
        $dropItems = $wpdb->get_results(
            $wpdb->prepare("
                SELECT * FROM {$wpdb->prefix}ss_drop_items
                WHERE drop_id = %d
            ", $drop->id)
        );
        $retailer = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}ss_retailers WHERE id = %d", $drop->retailer_id ) );

        print '
            <div class="ss-drop">
                <div class="ss-drop-heading">
                    <div class="ss-drop-heading-info">
                        <div class="ss-drop-heading-tags">
                            <b class="ss-drop-heading-time">' . $drop->created_at . '</b>
                        </div>
                        <h3 class="ss-drop-retailer-name">' . $retailer->name  . '</h3>
                        <p class="ss-drop-retailer-address">
                            ' . $retailer->address .
                            (!empty($retailer->city) && !empty($retailer->state) && !empty($retailer->zip) ?
                                '<br />' . $retailer->city . ', &nbsp;' . $retailer->state . '&nbsp; ' . $retailer->zip
                            : '') . 
                        '</p>
                        
                        <p class="ss-drop-retailer-phone">
                            ' . $retailer->phone .
                        '</p>
                        
                    </div>
        ';
        if(!empty($retailer->logo)){
            print '
                <div class="ss-drop-heading-logo">
                    <img src="https://assets.shattersearch.com/a/storage' . $retailer->logo . '" />
                </div>
            ';
        }
        print '</div>';
        if($dropItems){
            print '
                <div class="ss-drop-items">
                    <div class="ss-drop-items-row">
            ';
            foreach($dropItems as $item){
                print '
                    <div class="ss-drop-item-col">
                        <div class="ss-drop-item-photo">
                            <img src="' . $item->image . '" loading="lazy">
                        </div>
                        <h5 class="ss-drop-item-info">
                            <span>' . $item->strain . '</span>
                            <span>' . $item->type . '</span>
                        </h5>
                    </div>
                ';
            }
            print '
                    </div>
                </div>
            ';
        }
        print '</div>';
    }
    
    print '</div>';
    print '</div>';
?>