<?php

namespace markroland\Formbuilder;

/**
 * FormBuilder Class
 *
 * @author Mark Roland
 * @version 1.1.0
 * @copyright 2015 Mark Roland
 * @license http://opensource.org/licenses/MIT
 * @link https://github.com/markroland/formbuilder
 **/
class Formbuilder {

    function build_form($data){

        $data = unserialize($data);

        // Initialize form
        $html = '<form';
        $html .= ' '.trim($data['attributes']);
        //foreach( (array) $form_data['attributes'] as $key => $val)
        //  $html .= ' '.$key.'="'.$val.'"';
        $html .= '>'."\n";

        // Add fieldset
        foreach( (array) $data['fieldset'] as $fieldset){
            $html .= "\t".'<fieldset'.( !empty($fieldset['class']) ? ' class="'.$fieldset['class'].'"' : '').'>'."\n";
            $html .= "\t\t".'<legend>'.$fieldset['legend'].'</legend>'."\n";
            foreach( (array) $fieldset['field'] as $field){


                if( $field['element'] == 'div' ){

                    $html .= "\t\t".'<div class="form_item">'.$field['value']."\n";
                    if( !empty($field['error']) )
                        $html .= "\t\t\t".'<div class="error">'.$field['error'].'</div>'."\n";
                    $html .= "\t\t".'</div>'."\n";


                }

                elseif( $field['element'] == 'input' ){

                    if( $field['type'] == 'button'  ){

                    }

                    elseif( $field['type'] == 'checkbox'  ){

                        $html .= "\t\t".'<div class="form_item checkbox">'."\n";
                        // $html .= "\t\t\t".'<label for="'.$field['name'].'"'.( $field['required'] ? ' class="required"' : '').'>'.$field['label'].'</label>'."\n";
                        $html .= "\t\t\t".'<label'.( $field['required'] ? ' class="required"' : '').'><input type="'.$field['type'].'" name="'.$field['name'].'" value="'.$field['value'].'" '.(!empty($field['checked']) ? 'checked="checked"' : '' ).'/>'.$field['label'].'</label>'."\n";

                        if( !empty($field['tip']) ){
                            $html .= "\t\t\t".'<a href="#" class="tip">?</a>'."\n";
                            $html .= "\t\t\t".'<div class="tip">'.$field['tip'].'</div>'."\n";
                        }

                        if( !empty($field['error']) )
                            $html .= "\t\t\t".'<div class="error">This box must be checked.</div>'."\n";

                        $html .= "\t\t".'</div>'."\n";

                    }

                    elseif( $field['type'] == 'file'  ){

                    }

                    elseif( $field['type'] == 'hidden'  ){

                        $html .= "\t\t".'<input type="'.$field['type'].'" name="'.$field['name'].'" value="'.$field['value'].'" />'."\n";

                    }

                    elseif( $field['type'] == 'image'  ){

                    }

                    elseif( $field['type'] == 'password'  ){

                    }

                    elseif( $field['type'] == 'radio'  ){

                    }

                    elseif( $field['type'] == 'reset'  ){

                    }

                    elseif( $field['type'] == 'submit' ){

                        $html .= "\t\t\t".'<input type="'.$field['type'].'" name="'.$field['name'].'" class="button" value="'.$field['value'].'" />'."\n";

                    }

                    elseif( $field['type'] == 'text'  ){

                        $html .= "\t\t".'<div class="form_item">'."\n";
                        // $html .= "\t\t".'<div class="form_item'.( !empty($field['error']) ? ' error' : '' ).'">'."\n";
                        $html .= "\t\t\t".'<label for="'.$field['name'].'"'.( $field['required'] ? ' class="required"' : '').'>'.$field['label'].'</label>'."\n";
                        $html .= "\t\t\t".'<input type="'.$field['type'].'" name="'.$field['name'].'" value="'.$field['value'].'"'.( $field['max'] > 0 ? ' maxlength="'.$field['max'].'"' : '').'/>'."\n";

                        if( !empty($field['tip']) ){
                            $html .= "\t\t\t".'<a href="#" class="tip">?</a>'."\n";
                            $html .= "\t\t\t".'<div class="tip">'.$field['tip'].'</div>'."\n";
                        }

                        if( !empty($field['error']) ){
                            $html .= "\t\t\t".'<div class="error">'.$field['error'].'</div>'."\n";
                        }

                        $html .= "\t\t".'</div>'."\n";

                    }

                }

                elseif( $field['element'] == 'select' ){

                    $html .= "\t\t".'<div class="form_item">'."\n";
                    $html .= "\t\t\t".'<label for="'.$field['name'].'"'.( $field['required'] ? ' class="required"' : '').( strpos($field['style'], 'display: block') !== FALSE ? ' style="width: auto;"' : '').'>'.$field['label'].'</label>'."\n";
                    $html .= "\t\t\t".'<select name="'.$field['name'].'"'.( !empty($field['style']) ? ' style="'.$field['style'].'"' : '').'>'."\n";

                    // Unserialize options
                    if( !empty($field['value']) ){

                        $select_options = unserialize($field['value']);
                        foreach( (array) $select_options as $val){
                            $html .= "\t\t\t\t".'<option value="'.$val['k'].'"'.( $field['selected'] == $val['k'] ? ' selected="selected"' : '').'>'.$val['v'].'</option>'."\n";
                        }

                    }elseif( !empty($field['html']) ){

                        $select_options = unserialize($field['html']);
                        foreach( (array) $select_options as $val){
                            $html .= "\t\t\t\t".'<option value="'.$val['k'].'"'.( $field['selected'] == $val['k'] ? ' selected="selected"' : '').'>'.$val['v'].'</option>'."\n";
                        }

                    }else{

                        for($i = $field['min']; $i <= $field['max']; $i++)
                            $html .= "\t\t\t\t".'<option value="'.$i.'"'.( $field['selected'] == $i ? ' selected="selected"' : '').'>'.$i.'</option>'."\n";

                    }

                    $html .= "\t\t\t".'</select>'."\n";

                    if( !empty($field['tip']) ){
                        $html .= "\t\t\t".'<a href="#" class="tip">?</a>'."\n";
                        $html .= "\t\t\t".'<div class="tip">'.$field['tip'].'</div>'."\n";
                    }

                    if( !empty($field['error']) ){
                        $html .= "\t\t\t".'<div class="error">'.$field['error'].'</div>'."\n";
                    }

                    $html .= "\t\t".'</div>'."\n";

                }

                elseif( $field['element'] == 'textarea' ){

                    $html .= "\t\t".'<div class="form_item">'."\n";
                    $html .= "\t\t\t".'<label for="'.$field['name'].'"'.( $field['required'] ? ' class="required"' : '').'>'.$field['label'].'</label>'."\n";
                    $html .= "\t\t\t".'<textarea name="'.$field['name'].'"'.( !empty($field['style']) ? ' style="'.$field['style'].'"' : '').'>'.$field['value'].'</textarea>'."\n";

                    if( !empty($field['tip']) ){
                        $html .= "\t\t\t".'<a href="#" class="tip">?</a>'."\n";
                        $html .= "\t\t\t".'<div class="tip">'.$field['tip'].'</div>'."\n";
                    }

                    if( !empty($field['error']) ){
                        $html .= "\t\t\t".'<div class="error">'.$field['error'].'</div>'."\n";
                    }

                    $html .= "\t\t".'</div>'."\n";

                }

            }
            $html .= "\t".'</fieldset>'."\n";
        }

        // Close form
        $html .= '</form>'."\n";

        return $html;
    }
}
