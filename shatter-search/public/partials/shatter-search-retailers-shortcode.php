<?php
    global $wpdb;
    function state_abbr_to_state($param){
		switch($param) {
            case 'CO':
                return 'Colorado';
            case 'CA':
                return 'California';
            case 'OR':
                return 'Oregon';
            case 'WA':
                return 'Washington';
            case 'NM':
                return 'New Mexico';
            case 'OK':
                return 'Oklahoma';
            case 'ME':
                return 'Maine';
            default:
                return '';
			break;
        }
	}
    function store_locator_shortcode(){
        $return = '';
        global $wpdb;

        $return .= '
            <div id="ssRetailers">
                <div class="ss-retailers">
        ';

        $storedRetailers = [];
        $stateResults = $wpdb->get_results( 
            "select distinct `state` from {$wpdb->prefix}ss_retailers order by state asc" 
        );
        if(is_array($stateResults)){
            foreach($stateResults as $retailerState){
                $return .= '
                <div class="ss-state" id="' . state_abbr_to_state($retailerState->state) . '">
                    <div class="ss-state-header"><h1>' . state_abbr_to_state($retailerState->state) . '</h1></div>
                    <div class="ss-cities">
                ';

                $cityResults = $wpdb->get_results(
                    $wpdb->prepare("select distinct `city` from {$wpdb->prefix}ss_retailers where `state` = %s order by city asc", $retailerState->state)
                );

                if(is_array($cityResults)){
                    foreach($cityResults as $retailerCity){
                        $cityKey = preg_replace("/[^A-Za-z0-9 ]/", '', $retailerCity->city);
                        $storedRetailers[$cityKey] = $wpdb->get_results(
                            $wpdb->prepare("select * from {$wpdb->prefix}ss_retailers where `state` = %s and `city` = %s order by city asc", $retailerState->state, $retailerCity->city)
                        );
                        $bigCity = (count($storedRetailers[$cityKey]) > 5 ? true : false);
                        $return .= '
                            <a href="#' . strtolower($retailerCity->city) . '" class="' . ($bigCity ? 'ss-warning-bg' : 'ss-pale-bg') . '">' . ucwords($retailerCity->city) . '</a>
                        ';
                    }
                }
                $return .= '
                    </div>
                    <div class="ss-retailers">
                ';
                foreach($cityResults as $retailerCity){
                    $cityKey = preg_replace("/[^A-Za-z0-9 ]/", '', $retailerCity->city);
                    $return .= '
                        <div class="ss-city">
                            <div class="ss-city-header">
                                <h5 id="' . strtolower($retailerCity->city) . '">' . $retailerCity->city . '</h5>
                                <a href="#ssStates">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-up" class="svg-inline--fa fa-arrow-up fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path
                                            fill="currentColor"
                                            d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"
                                        ></path>
                                    </svg>
                                </a>
                            </div>
                            <div class="ss-store-row">
                    ';
                    foreach($storedRetailers[$cityKey] as $retailer){
                        $return .= '
                            <div class="ss-store">
                                <div>
                                    <div class="ss-store-main">
                                        <div class="ss-store-info">
                                            <h3>' . $retailer->name . '</h3>
                                            ' . (!empty($retailer->address) ? 
                                                    '<p class="ss-store-address">
                                                        ' . $retailer->address 
                                                    .
                                                        (!empty($retailer->city) && !empty($retailer->state) && !empty($retailer->zip) ? 
                                                            '<br />
                                                            <b>' . $retailer->city . '</b>, ' . $retailer->state . ' ' . $retailer->zip
                                                        : '')
                                                    . '</p>'
                                                : '')
                                            . (!empty($retailer->phone) ? '<p class="ss-store-phone">' . $retailer->phone . '</p>' : null) . '
                                        </div>
                                        ' . (!empty($retailer->logo) ? 
                                            '<div class="ss-store-logo">
                                                <div class="ss-store-logo-wrapper"><img loading="lazy" src="https://assets.shattersearch.com/a/storage' . $retailer->logo . '" /></div>
                                            </div>'
                                        : '')
                                    . '</div>
                                </div>
                            </div>
                        ';
                    }
                    $return .= '</div>';
                }
                $return .= '</div>';
            }
        }
        $return .= '</div></div>';
        return $return;
    }    
?>