<?php

namespace App\Services;

class CollectItems
{
    public function in_deep_array($value, $items)
    {
        foreach ($items as $index => $element) {
            if (is_array($element) && $this->in_deep_array($value, $element)) {
                return true;
            }else if ($index == 'id' && $element == $value) {
                return true;
            }
        }

        return false;
    }

    function array_columns($input, $column_keys=null, $index_key=null)
    {
        $result = array();
    
        $keys = isset($column_keys) ? explode(',', $column_keys) : array();
    
        if($input){
            foreach($input as $k => $v){
    
                // Specify the return column
                if($keys){
                    $tmp = array();
                    foreach($keys as $key){
                        $tmp[$key] = $v[$key];
                    }
                }else{
                    $tmp = $v;
                }
    
                // Specify the index column
                if(isset($index_key)){
                    $result[$v[$index_key]] = $tmp;
                }else{
                    $result[] = $tmp;
                }
    
            }
        }
    
        return $result;
    }
}