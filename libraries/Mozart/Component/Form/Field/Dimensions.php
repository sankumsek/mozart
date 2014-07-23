<?php
namespace Mozart\Component\Form\Field;

use Mozart\Component\Form\Field;
use Mozart\Component\Config\Utils;

class Dimensions extends Field
{
    /**
     * Field Render Function.
     * Takes the vars and outputs the HTML for the field in the settings
     */
    public function render()
    {
        /*
         * So, in_array() wasn't doing it's job for checking a passed array for a proper value.
         * It's wonky.  It only wants to check the keys against our array of acceptable values, and not the key's
         * value.  So we'll use this instead.  Fortunately, a single no array value can be passed and it won't
         * take a dump.
         */

        // No errors please
        $defaults = array(
            'width'          => true,
            'height'         => true,
            'units_extended' => false,
            'units'          => 'px',
            'mode'           => array(
                'width'  => false,
                'height' => false,
            ),
        );

        $this->field = array_merge( $defaults, $this->field );

        $defaults = array(
            'width'  => '',
            'height' => '',
            'units'  => 'px'
        );

        $this->value = array_merge( $defaults, $this->value );

        if (isset( $this->value['unit'] )) {
            $this->value['units'] = $this->value['unit'];
        }

        /*
         * Acceptable values checks.  If the passed variable doesn't pass muster, we unset them
         * and reset them with default values to avoid errors.
         */

        // If units field has a value but is not an acceptable value, unset the variable
        if (isset( $this->field['units'] ) && !in_array_recursive(
                $this->field['units'],
                array(
                    '',
                    false,
                    '%',
                    'in',
                    'cm',
                    'mm',
                    'em',
                    'ex',
                    'pt',
                    'pc',
                    'px'
                )
            )
        ) {
            unset( $this->field['units'] );
        }

         // if there is a default unit value  but is not an accepted value, unset the variable
        if (isset( $this->value['units'] ) && !in_array_recursive(
                $this->value['units'],
                array(
                    '',
                    '%',
                    'in',
                    'cm',
                    'mm',
                    'em',
                    'ex',
                    'pt',
                    'pc',
                    'px'
                )
            )
        ) {
            unset( $this->value['units'] );
        }

        /*
         * Since units field could be an array, string value or bool (to hide the unit field)
         * we need to separate our functions to avoid those nasty PHP index notices!
         */

        // if field units has a value and IS an array, then evaluate as needed.
        if (isset( $this->field['units'] ) && !is_array( $this->field['units'] )) {

            // if units fields has a value but units value does not then make units value the field value
            if (isset( $this->field['units'] ) && !isset( $this->value['units'] ) || $this->field['units'] == false) {
                $this->value['units'] = $this->field['units'];

                // If units field does NOT have a value and units value does NOT have a value, set both to blank (default?)
            } elseif (!isset( $this->field['units'] ) && !isset( $this->value['units'] )) {
                $this->field['units'] = 'px';
                $this->value['units'] = 'px';

                // If units field has NO value but units value does, then set unit field to value field
            } elseif (!isset( $this->field['units'] ) && isset( $this->value['units'] )) {
                $this->field['units'] = $this->value['units'];

                // if unit value is set and unit value doesn't equal unit field (coz who knows why)
                // then set unit value to unit field
            } elseif (isset( $this->value['units'] ) && $this->value['units'] !== $this->field['units']) {
                $this->value['units'] = $this->field['units'];
            }

            // do stuff based on unit field NOT set as an array
        } elseif (isset( $this->field['units'] ) && is_array( $this->field['units'] )) {
            // nothing to do here, but I'm leaving the construct just in case I have to debug this again.
        }

        echo '<fieldset id="' . $this->field['id'] . '" class="redux-dimensions-container" data-id="' . $this->field['id'] . '">';

        if (isset( $this->field['select2'] )) { // if there are any let's pass them to js
            $select2_params = json_encode( $this->field['select2'] );
            $select2_params = htmlspecialchars( $select2_params, ENT_QUOTES );

            echo '<input type="hidden" class="select2_params" value="' . $select2_params . '">';
        }

        // This used to be unit field, but was giving the PHP index error when it was an array,
        // so I changed it.
        echo '<input type="hidden" class="field-units" value="' . $this->value['units'] . '">';

        /**
         * Width
         * */
        if ($this->field['width'] === true) {
            if (!empty( $this->value['width'] ) && strpos( $this->value['width'], $this->value['units'] ) === false) {
                $this->value['width'] = filter_var(
                    $this->value['width'],
                    FILTER_SANITIZE_NUMBER_FLOAT,
                    FILTER_FLAG_ALLOW_FRACTION
                );
                if ($this->field['units'] !== false) {
                    $this->value['width'] .= $this->value['units'];
                }
            }
            echo '<div class="field-dimensions-input input-prepend">';
            echo '<span class="add-on"><i class="el-icon-resize-horizontal icon-large"></i></span>';
            echo '<input type="text" class="redux-dimensions-input redux-dimensions-width mini' . $this->field['class'] . '" placeholder="' . __(
                    'Width',
                    'mozart-options'
                ) . '" rel="' . $this->field['id'] . '-width" value="' . filter_var(
                    $this->value['width'],
                    FILTER_SANITIZE_NUMBER_FLOAT,
                    FILTER_FLAG_ALLOW_FRACTION
                ) . '">';
            echo '<input data-id="' . $this->field['id'] . '" type="hidden" id="' . $this->field['id'] . '-width" name="' . $this->field['name'] . '[width]' . $this->field['name_suffix'] . '" value="' . $this->value['width'] . '"></div>';
        }

        /**
         * Height
         * */
        if ($this->field['height'] === true) {
            if (!empty( $this->value['height'] ) && strpos( $this->value['height'], $this->value['units'] ) === false) {
                $this->value['height'] = filter_var(
                    $this->value['height'],
                    FILTER_SANITIZE_NUMBER_FLOAT,
                    FILTER_FLAG_ALLOW_FRACTION
                );
                if ($this->field['units'] !== false) {
                    $this->value['height'] .= $this->value['units'];
                }
            }
            echo '<div class="field-dimensions-input input-prepend">';
            echo '<span class="add-on"><i class="el-icon-resize-vertical icon-large"></i></span>';
            echo '<input type="text" class="redux-dimensions-input redux-dimensions-height mini' . $this->field['class'] . '" placeholder="' . __(
                    'Height',
                    'mozart-options'
                ) . '" rel="' . $this->field['id'] . '-height" value="' . filter_var(
                    $this->value['height'],
                    FILTER_SANITIZE_NUMBER_FLOAT,
                    FILTER_FLAG_ALLOW_FRACTION
                ) . '">';
            echo '<input data-id="' . $this->field['id'] . '" type="hidden" id="' . $this->field['id'] . '-height" name="' . $this->field['name'] . '[height]' . $this->field['name_suffix'] . '" value="' . $this->value['height'] . '"></div>';
        }

        /**
         * Units
         * */
        // If units field is set and units field NOT false then
        // fill out the options object and show it, otherwise it's hidden
        // and the default units value will apply.
        if (isset( $this->field['units'] ) && $this->field['units'] !== false) {
            echo '<div class="select_wrapper dimensions-units" original-title="' . __(
                    'Units',
                    'mozart-options'
                ) . '">';
            echo '<select data-id="' . $this->field['id'] . '" data-placeholder="' . __(
                    'Units',
                    'mozart-options'
                ) . '" class="redux-dimensions redux-dimensions-units select' . $this->field['class'] . '" original-title="' . __(
                    'Units',
                    'mozart-options'
                ) . '" name="' . $this->field['name'] . '[units]' . $this->field['name_suffix'] . '">';

            //  Extended units, show 'em all
            if ($this->field['units_extended']) {
                $testUnits = array( 'px', 'em', 'rem', '%', 'in', 'cm', 'mm', 'ex', 'pt', 'pc' );
            } else {
                $testUnits = array( 'px', 'em', 'rem', '%' );
            }

            if ($this->field['units'] != "" && is_array( $this->field['units'] )) {
                $testUnits = $this->field['units'];
            }

            if (in_array( $this->field['units'], $testUnits )) {
                echo '<option value="' . $this->field['units'] . '" selected="selected">' . $this->field['units'] . '</option>';
            } else {
                foreach ($testUnits as $aUnit) {
                    echo '<option value="' . $aUnit . '" ' . selected(
                            $this->value['units'],
                            $aUnit,
                            false
                        ) . '>' . $aUnit . '</option>';
                }
            }
            echo '</select></div>';
        };
        echo "</fieldset>";
    }

    /**
     * Enqueue Function.
     * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
     *
     *
     */
    public function enqueue()
    {
        wp_enqueue_script(
            'redux-field-dimensions-js',
            \Mozart::parameter(
                'wp.plugin.uri'
            ) . '/mozart/public/bundles/mozart/form/fields/dimensions/field_dimensions.js',
            array( 'jquery', 'select2-js', 'redux-js' ),
            time(),
            true
        );

        wp_enqueue_style(
            'redux-field-dimensions-css',
            \Mozart::parameter(
                'wp.plugin.uri'
            ) . '/mozart/public/bundles/mozart/form/fields/dimensions/field_dimensions.css',
            time(),
            true
        );
    }

    public function output()
    {
        // if field units has a value and IS an array, then evaluate as needed.
        if (isset( $this->field['units'] ) && !is_array( $this->field['units'] )) {

            // if units fields has a value but units value does not then make units value the field value
            if (isset( $this->field['units'] ) && !isset( $this->value['units'] ) || $this->field['units'] == false) {
                $this->value['units'] = $this->field['units'];

                // If units field does NOT have a value and units value does NOT have a value, set both to blank (default?)
            } elseif (!isset( $this->field['units'] ) && !isset( $this->value['units'] )) {
                $this->field['units'] = 'px';
                $this->value['units'] = 'px';

                // If units field has NO value but units value does, then set unit field to value field
            } elseif (!isset( $this->field['units'] ) && isset( $this->value['units'] )) {
                $this->field['units'] = $this->value['units'];

                // if unit value is set and unit value doesn't equal unit field (coz who knows why)
                // then set unit value to unit field
            } elseif (isset( $this->value['units'] ) && $this->value['units'] !== $this->field['units']) {
                $this->value['units'] = $this->field['units'];
            }

            // do stuff based on unit field NOT set as an array
        } elseif (isset( $this->field['units'] ) && is_array( $this->field['units'] )) {
            // nothing to do here, but I'm leaving the construct just in case I have to debug this again.
        }

        $units = isset( $this->value['units'] ) ? $this->value['units'] : "";

        $height = isset( $this->field['mode'] ) && !empty( $this->field['mode'] ) ? $this->field['mode'] : 'height';
        $width = isset( $this->field['mode'] ) && !empty( $this->field['mode'] ) ? $this->field['mode'] : 'width';

        $cleanValue = array(
            $height => isset( $this->value['height'] ) ? filter_var(
                $this->value['height'],
                FILTER_SANITIZE_NUMBER_INT
            ) : '',
            $width  => isset( $this->value['width'] ) ? filter_var(
                $this->value['width'],
                FILTER_SANITIZE_NUMBER_INT
            ) : '',
        );

        $style = "";

        foreach ($cleanValue as $key => $value) {
            if ($value) {
                $style .= $key . ':' . $value . $units . ';';
            }
        }

        if (!empty( $style )) {
            if (!empty( $this->field['output'] ) && is_array( $this->field['output'] )) {
                $keys = implode( ",", $this->field['output'] );
                $this->builder->addToOutputCSS( $keys . "{" . $style . '}');
            }

            if (!empty( $this->field['compiler'] ) && is_array( $this->field['compiler'] )) {
                $keys = implode( ",", $this->field['compiler'] );
                $this->builder->addToCompilerCSS( $keys . "{" . $style . '}');
            }
        }
    }
}
