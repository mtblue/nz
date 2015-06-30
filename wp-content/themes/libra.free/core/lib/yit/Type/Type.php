<?php
/**
 * Your Inspiration Themes
 * 
 * @package WordPress
 * @subpackage Your Inspiration Themes
 * @author Your Inspiration Themes Team <info@yithemes.com>
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

/**
 * Load field types to be used in theme option panel
 * 
 * @since 1.0.0
 */
class YIT_Type {
	/**
	 * Load and print the correspondent field type.
	 * 
	 * @param @field
	 */
	public static function display( $field ) {
		$type = ucfirst($field['type']);
		$className =  'YIT_Type_' . $type;
            
			require_once('Types/' . $type . '.php');
			if( class_exists($className) ) {
                if( $field['type'] != 'title' ) {
				    //add id_container field to the array
				    $field['id_container'] = $field['id'] ? $field['id'] . '-container' : '';
                }
				
				//print out the html
				$className = new $className();
				echo $className->display( $field );
                echo self::_print_deps( $field );
			}
        
		return false;
	}
    
    /**
     * Create the name for a field
     * 
     * @param string $id
     * @return string
     * @since 1.0.0
     */
    public static function name( $id ) {      
        return 'yit_panel_option[' . $id . ']';
    }
    
    /**
     * Check if the current value has dependencies. If yes, print the JS handler.
     * 
     * @param array $value
     * @return bool|string
     * @access protected
     * @since 1.0.0
     */
    protected static function _print_deps( $value ) {
        if( !isset( $value['deps'] ) )
            { return false; }
        
        $deps = $value['deps'];
        
        //If is multi-dependencies
        if( strpos( $deps['ids'], ',' ) ) {
            $all_ids = explode( ',', $deps['ids'] );
            $all_ids = array_map( 'trim', $all_ids );
            
            $all_values = explode( ',', $deps['values'] );
            $all_values = array_map( 'trim', $all_values );
            
            if( count( $all_ids ) != count( $all_values ) )
                { return false; }
                
            $ids = '';
            foreach( $all_ids as $cur_id ) {
                $ids .= '"#' . $cur_id . '",'; 
            }
            
            $ids = rtrim( $ids, ',' );
            
            $values = '';
            foreach( $all_values as $cur_value ) {
                $values .= '"' . $cur_value . '",'; 
            }
            
            $values = rtrim( $values, ',' );
                
            ob_start(); ?>
            <script type="text/javascript">
            jQuery( '#yit-content' ).bind( 'panelLoaded', function( $ ) {                
                var k = 0;
                var deps = [];
                $.each( [<?php echo $ids ?>], function( i, val ) {
                    if( $( val + '-' + [<?php echo $values ?>][k] ).attr( 'type' ) == 'radio' ) {
                        val = ':radio[id^="' + val.substr( 1 ) + '"]';
                    }
                    
                    deps.push( val );
                    
                    k++;
                });
                
                var ids = deps.join( ',' );
                
                dependencies_handler( '#<?php echo $value['id'] ?>', deps, [<?php echo $values ?>] );
                $( ids ).change( function() {
                    dependencies_handler( '#<?php echo $value['id'] ?>', deps, [<?php echo $values ?>] );
                }); 
            });
            </script>
            <?php
            return ob_get_clean();
        } else { //Single dependency
            ob_start(); ?>
            <script type="text/javascript">           
            jQuery( '#yit-content' ).bind( 'panelLoaded', function( $ ) {
                dependencies_handler( '#<?php echo $value['id'] ?>', '#<?php echo $deps['ids'] ?>', '<?php echo $deps['values'] ?>' );
            });
        
 
            jQuery( document ).ready( function( $ ) {
                $( '#<?php echo $deps['ids'] ?>' ).change( function() {
                    dependencies_handler( '#<?php echo $value['id'] ?>', '#<?php echo $deps['ids'] ?>', '<?php echo $deps['values'] ?>' );
                }); 
            });
            </script>
            <?php
            return ob_get_clean();
        }
    }
}

if( !function_exists( 'yit_field_name' ) ) {
    /**
     * Format the name of the field
     * 
     * @param string $id
     * @return void
     * @since 1.0.0
     */
    function yit_field_name( $id ) {
        echo YIT_Type::name( $id );
    }
}

if( !function_exists( 'yit_get_field_name' ) ) {
    /**
     * Format the name of the field
     * 
     * @param string $id
     * @return void
     * @since 1.0.0
     */
    function yit_get_field_name( $id ) {
        return YIT_Type::name( $id );
    }
}