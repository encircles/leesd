<?php
require_once 'SqlHelper.class.php';

class usersService{

    public function checkForRepetition($username){
        $sql="select uname from users where uname='{$username}'";
        $sh=new SqlHelper();
        $res=$sh->execute_dql($sql);
        if(mysql_fetch_assoc($res)){
            return "用户名已存在,请重新输入!";
        }else{
            return 0;
        }
    }

    public function checkUser($username,$password){
        $sql="select password,p_level,uid from users where uname='$username'";
        $sh=new SqlHelper();
        $res=$sh->execute_dql($sql);
        $arr=array();
        if($row=mysql_fetch_assoc($res)){
            if(md5($password)==$row['password']){
                $arr['p_level']= $row['p_level'];
                $arr['uid']= $row['uid'];
                return $arr;
            }
        }
        mysql_free_result($res);
        $sh->close_connect();
        return 0;
    }

    public function addUser($username,$password,$tel,$qq){
        $b=null;
        $sql="insert into users(uname,password,tel,qq,p_level) values
              ('{$username}',md5('{$password}'),'{$tel}','{$qq}','1')";
        $sh=new SqlHelper();
        $res=$sh->execute_dml($sql);
        $b=$res;
        $sh->close_connect();
        return $b;
    }

    //包含返回false,不包含返回true
    public function checkLikes($arr,$cid){
        if(in_array($cid,$arr)){
            return false;
        }else{
            return true;
        }

        /*foreach($arr as $k=>$v){
            if($v==$cid){
                return false;
            }
        }
        return true;*/
    }

    public function addLikes($uid,$cid){
        $likes_arr=$this->getLikesArr($uid);
        $likes="";
        foreach($likes_arr as $k=>$v){
            if($likes_arr[$k]=="") break;
            $likes.="@".$v;
        }
        //检查是否点过赞
        if($this->checkLikes($likes_arr,$cid)){
            $likes.="@".$cid;
            $sql="update users set likes='{$likes}' where uid={$uid}";
            $sh=new SqlHelper();
            $b=$sh->execute_dml($sql);
            if($b==1){
                return true;
            }else{
                return false;
            }
        }
        return false;
    }

    public function reduceLikes($uid,$cid){
        $likes_arr=$this->getLikesArr($uid);
        $likes="";
        if(in_array($cid,$likes_arr)){
            foreach($likes_arr as $k=>$v){
                if($v==$cid){
                    array_splice($likes_arr,$k,1);
                }
            }
            foreach($likes_arr as $k=>$v){
                if($likes_arr[$k]=="") break;
                $likes.="@".$v;
            }
            $sql="update users set likes='{$likes}' where uid={$uid}";
            $sh=new SqlHelper();
            $b=$sh->execute_dml($sql);
            if($b==1){
                return true;
            }else{
                return false;
            }
        }
        return false;
    }

    public function getLikesArr($uid){
        $sql="select likes from users where uid='$uid'";
        $sh=new SqlHelper();
        $arr=$sh->execute_dql_arr($sql);
        $likes_arr=explode("@",substr($arr[0]['likes'],1,strlen($arr[0]['likes'])));
        return $likes_arr;
    }

    public function updateUser($uid,$tel,$qq,$p_level){
        $b=null;
        $sql="update users set tel='{$tel}',qq='{$qq}',p_level='$p_level' where uid={$uid}";
        $sh=new SqlHelper();
        $res=$sh->execute_dml($sql);
        $b=$res;
        $sh->close_connect();
        return $b;
    }

    public function delUser($uid){
        $b=null;
        $sql="delete from users where uid='$uid'";
        $sh=new SqlHelper();
        $res=$sh->execute_dml($sql);
        $b=$res;
        $sh->close_connect();
        return $b;
    }

    public function getUsers(){
        $sql="select * from users";
        $sh=new SqlHelper();
        $arr=$sh->execute_dql_arr($sql);
        $sh->close_connect();
        return $arr;
    }

    /**
     * @param $uname
     * @return array (uid,uname,tel,qq,likes)
     */
    public function getUser($name){
        $sql="select uid,uname,tel,qq,likes from users where uname='$name'";
        $sh=new SqlHelper();
        $arr=$sh->execute_dql_arr($sql);
        $sh->close_connect();
        return $arr;
    }

    public function getSearchUsers($val){
        $sql="select * from users where uname like '%$val%'";
        $sh=new SqlHelper();
        $arr=$sh->execute_dql_arr($sql);
        $sh->close_connect();
        return $arr;
    }

    public function getFenyePage(Fenye $fenye,$mode="",$val=""){
        $sh=new SqlHelper();
        if($mode==""){
            $sql1="select * from users order by uid desc limit ".($fenye->getPageNow()-1)*($fenye->getPageSize())
                .",".$fenye->getPageSize();
            $sql2="select count(uid) from users";
            $sh->execute_dql_fenye2($sql1,$sql2,$fenye);
        }else if($mode=="search"){
            $sql1="select * from users where uname like '%$val%' COLLATE utf8_general_ci order by uid desc limit "
                .($fenye->getPageNow()-1)*($fenye->getPageSize()) .",".$fenye->getPageSize();
            $sql2="select * from users where uname like '%$val%' COLLATE utf8_general_ci";
            $res=$sh->execute_dql($sql2);
            $rows=mysql_num_rows($res) or die("<span style='font-size: 30px;'>没有搜索到</span>");
            $sh->execute_dql_fenye2($sql1,"",$fenye,$rows);
            mysql_free_result($res);
        }
        $sh->close_connect();

    }

}

?>
