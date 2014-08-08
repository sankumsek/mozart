<?php

namespace Mozart\Bundle\FieldBundle\ACF\Extension;

/**
 * Class NavMenuField
 *
 * @package ACF\Extensions\NavMenu
 */
class NavMenu extends \acf_field
{

    /*
    *  __construct
    *
    *  This function will setup the field type data
    *
    *  @type	function
    *  @date	5/03/2014
    *  @since	5.0.0
    *
    *  @param	n/a
    *  @return	n/a
    */

    /**
     *
     */
    public function __construct()
    {

        /*
        *  name (string) Single word, no spaces. Underscores allowed
        */

        $this->name = 'nav_menu';

        /*
        *  label (string) Multiple words, can include spaces, visible when selecting a field type
        */

        $this->label = __( 'Nav Menu', 'acf' );

        /*
        *  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
        */

        $this->category = 'relational';

        /*
        *  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
        */

        $this->defaults = array(
            'save_format' => 'id',
            'allow_null'  => 0,
            'container'   => 'div'
        );

        /*
        *  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
        *  var message = acf._e('nav_menu', 'error');
        */

        $this->l10n = array(
            'error' => __( 'Error! Please enter a higher value', 'acf' ),
        );

        // do not delete!
        parent::__construct();
    }

    /*
    *  render_field_settings()
    *
    *  Create extra settings for your field. These are visible when editing a field
    *
    *  @type	action
    *  @since	3.6
    *  @date	23/01/13
    *
    *  @param	$field (array) the $field being edited
    *  @return	n/a
    */

    /**
     * @param $field
     */
    public function render_field_settings($field)
    {

        /*
        *  acf_render_field_setting
        *
        *  This function will create a setting for your field. Simply pass the $field parameter and an array of field settings.
        *  The array of settings does not require a `value` or `prefix`; These settings are found from the $field array.
        *
        *  More than one setting can be added by copy/paste the above code.
        *  Please note that you must also have a matching $defaults value for the field name (font_size)
        */

        acf_render_field_setting(
            $field,
            array(
                'label'        => __( 'Return Value', 'acf' ),
                'instructions' => __( '', 'acf' ),
                'type'         => 'radio',
                'name'         => 'save_format',
                'layout'       => 'horizontal',
                'choices'      => array(
                    'object' => __( "Object", 'acf' ),
                    'menu'   => __( "HTML", 'acf' ),
                    'id'     => __( "ID", 'acf' )
                )
            )
        );

        $choices = $this->get_allowed_nav_container_tags();

        acf_render_field_setting(
            $field,
            array(
                'label'        => __( 'Menu Container', 'acf' ),
                'instructions' => __( '', 'acf' ),
                'type'         => 'select',
                'name'         => 'container',
                'choices'      => $choices
            )
        );

        acf_render_field_setting(
            $field,
            array(
                'label'        => __( 'Allow Null', 'acf' ),
                'instructions' => __( '', 'acf' ),
                'type'         => 'radio',
                'name'         => 'allow_null',
                'choices'      => array(
                    1 => __( "Yes", 'acf' ),
                    0 => __( "No", 'acf' ),
                ),
                'layout'       => 'horizontal',
            )
        );
    }

    /**
     * @return array
     */
    public function get_nav_menus()
    {
        $navs = get_terms( 'nav_menu', array( 'hide_empty' => false ) );

        $nav_menus = array();
        foreach ($navs as $nav) {
            $nav_menus[$nav->term_id] = $nav->name;
        }

        return $nav_menus;
    }

    /**
     * @return array
     */
    public function get_allowed_nav_container_tags()
    {
        $tags           = apply_filters( 'wp_nav_menu_container_allowedtags', array( 'div', 'nav' ) );
        $formatted_tags = array(
            array( '0' => 'None' )
        );
        foreach ($tags as $tag) {
            $formatted_tags[0][$tag] = ucfirst( $tag );
        }

        return $formatted_tags;
    }

    /**
     * @param $value
     * @param $post_id
     * @param $field
     *
     * @return \stdClass|bool|string
     */
    public function format_value_for_api($value, $post_id, $field)
    {
        // defaults
        $field = array_merge( $this->defaults, $field );

        if (!$value) {
            return false;
        }

        // check format
        if ($field['save_format'] == 'object') {
            $wp_menu_object = wp_get_nav_menu_object( $value );

            if (!$wp_menu_object) {
                return false;
            }

            $menu_object = new \stdClass;

            $menu_object->ID    = $wp_menu_object->term_id;
            $menu_object->name  = $wp_menu_object->name;
            $menu_object->slug  = $wp_menu_object->slug;
            $menu_object->count = $wp_menu_object->count;

            return $menu_object;

        } elseif ($field['save_format'] == 'menu') {

            ob_start();

            wp_nav_menu(
                array(
                    'menu'      => $value,
                    'container' => $field['container']
                )
            );

            return ob_get_clean();

        }

        return $value;
    }

    /*
    *  render_field()
    *
    *  Create the HTML interface for your field
    *
    *  @param	$field (array) the $field being rendered
    *
    *  @type	action
    *  @since	3.6
    *  @date	23/01/13
    *
    *  @param	$field (array) the $field being edited
    *  @return	n/a
    */

    /**
     * @param $field
     */
    public function render_field($field)
    {
        // create Field HTML
        echo sprintf( '<select id="%d" class="%s" name="%s">', $field['id'], $field['class'], $field['name'] );

        // null
        if ($field['allow_null']) {
            echo '<option value=""> - Select - </option>';
        }

        // Nav Menus
        $nav_menus = $this->get_nav_menus();

        foreach ($nav_menus as $nav_menu_id => $nav_menu_name) {
            $selected = selected( $field['value'], $nav_menu_id );
            echo sprintf( '<option value="%1$d" %3$s>%2$s</option>', $nav_menu_id, $nav_menu_name, $selected );
        }

        echo '</select>';
    }

    /*
    *  input_admin_enqueue_scripts()
    *
    *  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
    *  Use this action to add CSS + JavaScript to assist your render_field() action.
    *
    *  @type	action (admin_enqueue_scripts)
    *  @since	3.6
    *  @date	23/01/13
    *
    *  @param	n/a
    *  @return	n/a
    */

    /*

    public function input_admin_enqueue_scripts()
    {
        $dir = plugin_dir_url( __FILE__ );

        // register & include JS
        wp_register_script( 'acf-input-nav_menu', "{$dir}js/input.js" );
        wp_enqueue_script('acf-input-nav_menu');

        // register & include CSS
        wp_register_style( 'acf-input-nav_menu', "{$dir}css/input.css" );
        wp_enqueue_style('acf-input-nav_menu');

    }

    */

    /*
    *  input_admin_head()
    *
    *  This action is called in the admin_head action on the edit screen where your field is created.
    *  Use this action to add CSS and JavaScript to assist your render_field() action.
    *
    *  @type	action (admin_head)
    *  @since	3.6
    *  @date	23/01/13
    *
    *  @param	n/a
    *  @return	n/a
    */

    /*

    public function input_admin_head()
    {
    }

    */

    /*
       *  input_form_data()
       *
       *  This function is called once on the 'input' page between the head and footer
       *  There are 2 situations where ACF did not load during the 'acf/input_admin_enqueue_scripts' and
       *  'acf/input_admin_head' actions because ACF did not know it was going to be used. These situations are
       *  seen on comments / user edit forms on the front end. This function will always be called, and includes
       *  $args that related to the current screen such as $args['post_id']
       *
       *  @type	function
       *  @date	6/03/2014
       *  @since	5.0.0
       *
       *  @param	$args (array)
       *  @return	n/a
       */

    /*

    public function input_form_data($args)
    {
    }

    */

    /*
    *  input_admin_footer()
    *
    *  This action is called in the admin_footer action on the edit screen where your field is created.
    *  Use this action to add CSS and JavaScript to assist your render_field() action.
    *
    *  @type	action (admin_footer)
    *  @since	3.6
    *  @date	23/01/13
    *
    *  @param	n/a
    *  @return	n/a
    */

    /*

    public function input_admin_footer()
    {
    }

    */

    /*
    *  field_group_admin_enqueue_scripts()
    *
    *  This action is called in the admin_enqueue_scripts action on the edit screen where your field is edited.
    *  Use this action to add CSS + JavaScript to assist your render_field_options() action.
    *
    *  @type	action (admin_enqueue_scripts)
    *  @since	3.6
    *  @date	23/01/13
    *
    *  @param	n/a
    *  @return	n/a
    */

    /*

    public function field_group_admin_enqueue_scripts()
    {
    }

    */

    /*
    *  field_group_admin_head()
    *
    *  This action is called in the admin_head action on the edit screen where your field is edited.
    *  Use this action to add CSS and JavaScript to assist your render_field_options() action.
    *
    *  @type	action (admin_head)
    *  @since	3.6
    *  @date	23/01/13
    *
    *  @param	n/a
    *  @return	n/a
    */

    /*

    public function field_group_admin_head()
    {
    }

    */

    /*
    *  load_value()
    *
    *  This filter is applied to the $value after it is loaded from the db
    *
    *  @type	filter
    *  @since	3.6
    *  @date	23/01/13
    *
    *  @param	$value (mixed) the value found in the database
    *  @param	$post_id (mixed) the $post_id from which the value was loaded
    *  @param	$field (array) the field array holding all the field options
    *  @return	$value
    */

    /*

    public function load_value($value, $post_id, $field)
    {
        return $value;

    }

    */

    /*
    *  update_value()
    *
    *  This filter is applied to the $value before it is saved in the db
    *
    *  @type	filter
    *  @since	3.6
    *  @date	23/01/13
    *
    *  @param	$value (mixed) the value found in the database
    *  @param	$post_id (mixed) the $post_id from which the value was loaded
    *  @param	$field (array) the field array holding all the field options
    *  @return	$value
    */

    /*

    public function update_value($value, $post_id, $field)
    {
        return $value;

    }

    */

    /*
    *  format_value()
    *
    *  This filter is appied to the $value after it is loaded from the db and before it is returned to the template
    *
    *  @type	filter
    *  @since	3.6
    *  @date	23/01/13
    *
    *  @param	$value (mixed) the value which was loaded from the database
    *  @param	$post_id (mixed) the $post_id from which the value was loaded
    *  @param	$field (array) the field array holding all the field options
    *
    *  @return	$value (mixed) the modified value
    */

    /*

    public function format_value($value, $post_id, $field)
    {
        // bail early if no value
        if ( empty($value) ) {
            return $value

        }

        // apply setting
        if ($field['font_size'] > 12) {

            // format the value
            // $value = 'something';

        }

        // return
        return $value;
    }

    */

    /*
    *  validate_value()
    *
    *  This filter is used to perform validation on the value prior to saving.
    *  All values are validated regardless of the field's required setting. This allows you to validate and return
    *  messages to the user if the value is not correct
    *
    *  @type	filter
    *  @date	11/02/2014
    *  @since	5.0.0
    *
    *  @param	$valid (boolean) validation status based on the value and the field's required setting
    *  @param	$value (mixed) the $_POST value
    *  @param	$field (array) the field array holding all the field options
    *  @param	$input (string) the corresponding input name for $_POST value
    *  @return	$valid
    */

    /*

    public function validate_value($valid, $value, $field, $input)
    {
        // Basic usage
        if ($value < $field['custom_minimum_setting']) {
            $valid = false;
        }

        // Advanced usage
        if ($value < $field['custom_minimum_setting']) {
            $valid = __('The value is too little!','acf'),
        }

        // return
        return $valid;

    }

    */

    /*
    *  delete_value()
    *
    *  This action is fired after a value has been deleted from the db.
    *  Please note that saving a blank value is treated as an update, not a delete
    *
    *  @type	action
    *  @date	6/03/2014
    *  @since	5.0.0
    *
    *  @param	$post_id (mixed) the $post_id from which the value was deleted
    *  @param	$key (string) the $meta_key which the value was deleted
    *  @return	n/a
    */

    /*

    public function delete_value($post_id, $key)
    {
    }

    */

    /*
    *  load_field()
    *
    *  This filter is applied to the $field after it is loaded from the database
    *
    *  @type	filter
    *  @date	23/01/2013
    *  @since	3.6.0
    *
    *  @param	$field (array) the field array holding all the field options
    *  @return	$field
    */

    /*

    public function load_field($field)
    {
        return $field;

    }

    */

    /*
    *  update_field()
    *
    *  This filter is applied to the $field before it is saved to the database
    *
    *  @type	filter
    *  @date	23/01/2013
    *  @since	3.6.0
    *
    *  @param	$field (array) the field array holding all the field options
    *  @return	$field
    */

    /*

    public function update_field($field)
    {
        return $field;

    }

    */

    /*
    *  delete_field()
    *
    *  This action is fired after a field is deleted from the database
    *
    *  @type	action
    *  @date	11/02/2014
    *  @since	5.0.0
    *
    *  @param	$field (array) the field array holding all the field options
    *  @return	n/a
    */

    /*

    public function delete_field($field)
    {
    }

    */

}