<?php
require_once "SqlHelper.class.php";

class udService{

    public function addContent($name,$title,$content,$nowtime){
        $name=addslashes($name);
        $title=addslashes($title);
        $content=addslashes($content);
        $nowtime=addslashes($nowtime);
        $sql="insert into usersdata(name,title,content,nowtime) values('$name','$title','$content','$nowtime')";
        $sh=new SqlHelper();
        $b=$sh->execute_dml($sql);
        return $b;
    }

    public function delContent($id){
        $sql="delete from usersdata where id='{$id}'";
        $sh=new SqlHelper();
        $b=$sh->execute_dml($sql);
        return $b;
    }

    public function getContentArr(){
        $sql="select * from usersdata";
        $sh=new SqlHelper();
        $arr=$sh->execute_dql_arr($sql);
        return $arr;
    }

    public function getFenyePage(Fenye $fenye){
        $sql1="select * from usersdata order by id desc limit ".($fenye->getPageNow()-1)*($fenye->getPageSize())
            .",".$fenye->getPageSize();
        $sql2="select count(id) from usersdata";
        $sh=new SqlHelper();
        $sh->execute_dql_fenye($sql1,$sql2,$fenye);
        $sh->close_connect();
    }

    public function getAjaxFenyePage(Fenye $fenye){
        $sql1="select * from usersdata order by id desc limit ".($fenye->getPageNow()-1)*($fenye->getPageSize())
            .",".$fenye->getPageSize();
        $sql2="select count(id) from usersdata";
        $sh=new SqlHelper();
        $sh->execute_dql_fenye2($sql1,$sql2,$fenye);
        $sh->close_connect();
    }

    public function getHeart($id){
        $sql="select hearts from usersdata where id='$id'";
        $sh=new SqlHelper();
        $arr=$sh->execute_dql_arr($sql);
        return $arr;
    }

    public function addHeart($id,$j){
        $arr=$this->getHeart($id);
        $n=$arr[0]['hearts']+$j;
        $sql="update usersdata set hearts='$n' where id='$id'";
        $sh=new SqlHelper();
        $b=$sh->execute_dml($sql);
        return $b;
    }


}

?>
