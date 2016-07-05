<?php
require_once 'SqlHelper.class.php';


class ctService{

    function addComment(ct $ct){
        $id=addslashes($ct->getId());
        $uid=addslashes($ct->getUid());
        $sender=addslashes($ct->getSender());
        $receiver=addslashes($ct->getReceiver());
        $content=addslashes($ct->getContent());
        $time=addslashes($ct->getTime());
        $sql="insert into comment_table(id,uid,sender,receiver,content,time) "
            ."values ('{$id}','{$uid}','{$sender}','{$receiver}'"
            .",'{$content}','{$time}')";
        $sh=new SqlHelper();
        $b=$sh->execute_dml($sql);
        if($b){
            if($b==1){
                echo "执行成功";
            }else if($b==2){
                echo "没有行受影响";
            }
        }else{
            echo "执行失败";
        }
    }

    function getComment($id){
        $sql="select id,sender,receiver,content,time from comment_table "
            ."where id={$id} order by time desc";
        $sh=new SqlHelper();
        $arr=$sh->execute_dql_arr($sql);
        return $arr;
    }

    function getCommentCount($id){
        return count($this->getComment($id));
    }


    function delComment($id){
        $sql="delete from comment_table where id=$id";
        $sh=new SqlHelper();
        $b=$sh->execute_dml($sql);
        if($b){
            if($b==1){
                echo "执行成功";
            }else if($b==2){
                echo "没有行受影响";
            }
        }else{
            echo "执行失败";
        }
    }

    function delUserComment($uid){
        $sql="delete from comment_table where uid=$uid";
        $sh=new SqlHelper();
        $b=$sh->execute_dml($sql);
        if($b){
            if($b==1){
                echo "执行成功";
            }else if($b==2){
                echo "没有行受影响";
            }
        }else{
            echo "执行失败";
        }
    }

}


?>
