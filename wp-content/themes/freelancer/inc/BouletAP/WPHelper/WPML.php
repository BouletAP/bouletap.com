<?php

namespace BouletAP\WPHelper;

class WPML {

	function init() {}
    
    static function getSwitcher() {
        $languages = apply_filters( 'wpml_active_languages', NULL, array( 
            'skip_missing' => 0
        ));
        
        if( !empty( $languages ) ) {
            foreach( $languages as $language ){
                if( !$language['active'] ) {
                    $native_name =  $language['native_name'];
                    echo '<a href="' . $language['url'] . '">'.$native_name.'</a>';
                }
            }
        }
    }
}

