<?php
/**
 * Converts an associative array into tree
 * @author Anton Makarenko php[at]ripfolio[dot]com
 * @copyright GPL
 *
 * @param array $source_arr
 * @param mixed $parent_id
 * @param string $key_children
 * @param string $key_id
 * @param string $key_parent_id
 * @return array $tree
 *
 * @example :
 * $source = array(
 *         array('id'=>1, 'parent_id'=>0, 'foo'=>'bar'),
 *         array('id'=>2, 'parent_id'=>1, 'foo'=>'barr'),
 *         array('id'=>3, 'parent_id'=>1, 'foo'=>'barrr')
 *         );
 * $tree = array2tree($source, 0);
 */
function array2tree($source_arr, $parent_id, $key_children='child_nodes', $key_id='id', $key_parent_id='parent_id'){
        $tree=array();
        if (empty($source_arr))
                return $tree;
        _array2treer($source_arr, $tree, $parent_id, $parent_id, $key_children, $key_id, $key_parent_id);
        return $tree;
}
/**
 * A private function. Background for array2tree. It is unnecessarily to use this function directly
 * @author Anton Makarenko php[at]ripfolio[dot]com
 * @copyright GPL
 *
 * @param array $source_arr
 * @param array &$_this
 * @param mixed $parent_id
 * @param mixed $_this_id
 * @param string $key_children
 * @param string $key_id
 * @param string $key_parent_id
 * @return null
 */
function _array2treer($source_arr, &$_this, $parent_id, $_this_id, $key_children, $key_id, $key_parent_id){
        // populate current children
        foreach ($source_arr as $value)
                if ($value[$key_parent_id]===$_this_id)
                        $_this[$key_children][$value[$key_id]]=$value;
        if (isset($_this[$key_children])){
                // populate children of the current children
                foreach ($_this[$key_children] as $value)
                        _array2treer($source_arr, $_this[$key_children][$value[$key_id]], $parent_id, $value[$key_id], $key_children, $key_id, $key_parent_id);
                // make the tree root look pretty (more convenient to use such tree)
                if ($_this_id===$parent_id)
                        $_this=$_this[$key_children];
        }
}
?>