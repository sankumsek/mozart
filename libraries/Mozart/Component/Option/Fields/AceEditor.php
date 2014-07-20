<?php
namespace Mozart\Component\Option\Fields;

use Mozart\Component\Option\Field;

class AceEditor extends Field
{
    /**
     * Field Constructor.
     * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
     *
     */
    function __construct( $field = array(), $value = '', $parent )
    {
        $this->parent = $parent;
        $this->field = $field;
        $this->value = trim( $value );
    }

    /**
     * Field Render Function.
     * Takes the vars and outputs the HTML for the field in the settings
     *
     */
    function render()
    {
        if (!isset( $this->field['mode'] )) {
            $this->field['mode'] = 'javascript';
        }
        if (!isset( $this->field['theme'] )) {
            $this->field['theme'] = 'monokai';
        }
        ?>
        <div class="ace-wrapper">
            <textarea name="<?php echo $this->field['name'] . $this->field['name_suffix']; ?>"
                      id="<?php echo $this->field['id']; ?>-textarea"
                      class="ace-editor hide <?php echo $this->field['class']; ?>"
                      data-editor="<?php echo $this->field['id']; ?>-editor"
                      data-mode="<?php echo $this->field['mode']; ?>"
                      data-theme="<?php echo $this->field['theme']; ?>">
                <?php echo $this->value; ?>
            </textarea>
                    <pre id="<?php echo $this->field['id']; ?>-editor"
                         class="ace-editor-area"><?php echo htmlspecialchars( $this->value ); ?></pre>
        </div>
    <?php
    }

    /**
     * Enqueue Function.
     * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
     *
     * @since       1.0.0
     * @access      public
     * @return      void
     */
    public function enqueue()
    {
        wp_enqueue_script(
            'ace-editor-js',
            \Mozart::parameter('wp.plugin.uri') . '/mozart/public/bundles/mozart/option/fields/ace_editor/vendor/ace.js',
            array( 'jquery' ),
            filemtime( \Mozart::parameter('wp.plugin.dir') . '/mozart/public/bundles/mozart/option/fields/ace_editor/vendor/ace.js' ),
            true
        );

        wp_enqueue_style(
            'redux-field-ace-editor-css',
            \Mozart::parameter('wp.plugin.uri') . '/mozart/public/bundles/mozart/option/fields/ace_editor/field_ace_editor.css',
            time(),
            true
        );

        wp_enqueue_script(
            'redux-field-ace-editor-js',
            \Mozart::parameter('wp.plugin.uri') . '/mozart/public/bundles/mozart/option/fields/ace_editor/field_ace_editor.js',
            array( 'jquery', 'ace-editor-js', 'redux-js' ),
            time(),
            true
        );
    }

    /**
     * Functions to pass data from the PHP to the JS at render time.
     *
     * @return array Params to be saved as a javascript object accessable to the UI.
     *
     */
    function localize( $field, $value = "" )
    {
        $params = array(
            'minLines' => 10,
            'maxLines' => 30,
        );

        if (isset( $field['options'] ) && !empty( $field['options'] ) && is_array( $field['options'] )) {
            $params = wp_parse_args( $field['options'], $params );
        }

        return $params;
    }
}