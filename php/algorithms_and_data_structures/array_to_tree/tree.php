<?php

    function ttree($DB, $pid, $level){

        global $menu;
        global $level;

        $level++;
        $sql="select * from table where pid='.$pid.' order by id";
        $res=$DB->select($sql);

        if ($res){
            foreach($res as $row){
                $row['level']=$level;
                $menu[]=$row;
                ttree($DB, $row['id'], $level);
                $level--;
            }
        }
        return $menu;
    }

    $res=ttree($DB, 0, 0);

    if ($res){
        foreach($res as $row){
            echo '<div>'.str_repeat(' ', $row['level']).$row['title'].'</div>';
        }
    }

?>