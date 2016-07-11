<?php
require_once "dbconfig.php";
require_once "Fenye.class.php";


class SqlHelper{
    private $conn;

    public function __construct(){
        $this->conn=mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PW);
        if(!$this->conn){
            die("连接失败".mysql_error());
        }
        mysql_query(DB_CHARSET) or die("设置字符编码失败".mysql_error());
        mysql_select_db(MYSQL_SELECT_DB) or die("选择数据库失败".mysql_error());
    }

    //返回结果集
    public function execute_dql($sql){
        $res=mysql_query($sql,$this->conn) or die(mysql_error());
        return $res;
    }

    //返回数组
    public function execute_dql_arr($sql){
        $arr=array();
        $res=mysql_query($sql,$this->conn) or die(mysql_error());
        //while($row=mysql_fetch_array($res)){
        while($row=mysql_fetch_assoc($res)){
            $arr[]=$row;
        }
        mysql_free_result($res);
        return $arr;
    }

    public function execute_dml($sql){
        $b=mysql_query($sql,$this->conn) or die(mysql_error());
        if(!$b){
            return 0;
        }else{
            if(mysql_affected_rows($this->conn)>0){
                return 1; //表示执行成功
            }else{
                return 2; //表示没有行受影响
            }
        }
    }

    //考虑分页情况的查询,这是一个比较通用的并体现面向对象的代码
    //sql1="select * from tablename limit 0,6";
    //sql2="select count(id) from emp";
    public function execute_dql_fenye($sql1,$sql2,Fenye &$fenye){
        //查询要分页显示的数据
        $res=mysql_query($sql1,$this->conn) or die(mysql_error());
        $arr=array();
        while($row=mysql_fetch_assoc($res)){
            $arr[]=$row;
        }
        //把要显示的数据封装到FenyeClass
        $fenye->setResArray($arr);
        mysql_free_result($res);
        //查询$rowCount
        $res2=mysql_query($sql2,$this->conn) or die(mysql_error());
        if($row=mysql_fetch_row($res2)){
            $fenye->setPageCount(ceil($row[0]/$fenye->getPageSize()));
            $fenye->setRowCount($row[0]);
        }
        mysql_free_result($res2);
        //把分页导航信息封装到Fenye中

        $navigate="";
        //首页
        $navigate.="<a href='?page=1'>首页</a>&nbsp;";
        //显示上一页
        if($fenye->getPageNow()>1){
            $prePage=$fenye->getPageNow()-1;
            $navigate.= "<a href='?page=$prePage'>上一页</a>&nbsp;";
        }
        //前十页
        if($fenye->getPageNow()>$fenye->getPageWhole()){
            $uPage=((ceil($fenye->getPageNow()/$fenye->getPageWhole())-1)-1)*$fenye->getPageWhole()+1;
            $navigate.="<a href='?page=$uPage'><<</a>&nbsp;";
        }
        //分页
        $pages=(ceil($fenye->getPageNow()/$fenye->getPageWhole())-1)*$fenye->getPageWhole()+1;
        for($i=0;$i<$fenye->getPageWhole();$i++){
            $p=$pages+$i;
            if($p>$fenye->getPageCount()){
                break;
            }
            if($fenye->getPageNow()==$p){
                $navigate.="<a style='color:#2aa7ff'>&nbsp;$p&nbsp;</a>&nbsp;";
                continue;
            }
            $navigate.="<a href='?page=$p'>&nbsp;$p&nbsp;</a>&nbsp;";
        }
        //后十页
        $ePage=(ceil($fenye->getPageCount()/$fenye->getPageWhole())-1)*$fenye->getPageWhole()+1;
        if($fenye->getPageNow()<$ePage){
            $dPage=ceil($fenye->getPageNow()/$fenye->getPageWhole())*$fenye->getPageWhole()+1;
            $navigate.="<a href='?page=$dPage'>>></a>&nbsp;";
        }
        //显示下一页
        if($fenye->getPageNow() < $fenye->getPageCount()){
            $nextPage=$fenye->getPageNow()+1;
            $navigate.= "<a href='?page=$nextPage'>下一页</a>&nbsp;";
        }
        //尾页
        $endPage=$fenye->getPageCount();
        $navigate.="<a href='?page=$endPage'>尾页</a>&nbsp;";
        //当前页/总页数
        $navigate.="当前<span style='color:red;'>{$fenye->getPageNow()}</span>页/总共{$fenye->getPageCount()}页";

        $fenye->setNavigate($navigate);

    }

    //ajax分页
    public function execute_dql_fenye2($sql1,$sql2,Fenye &$fenye,$rows=""){
        //查询要分页显示的数据
        $res=mysql_query($sql1,$this->conn) or die(mysql_error());
        $arr=array();
        while($row=mysql_fetch_assoc($res)){
            $arr[]=$row;
        }
        //把要显示的数据封装到FenyeClass
        $fenye->setResArray($arr);
        mysql_free_result($res);

        if($rows==""){
            //查询$rowCount
            $res2=mysql_query($sql2,$this->conn) or die(mysql_error());
            if($row=mysql_fetch_row($res2)){
                $fenye->setPageCount(ceil($row[0]/$fenye->getPageSize()));
                $fenye->setRowCount($row[0]);
            }
            mysql_free_result($res2);
        }else{
            //如果有$rows参数传入的话,执行这一步
            $fenye->setPageCount(ceil($rows/$fenye->getPageSize()));
            $fenye->setRowCount($rows);
        }


        //把分页导航信息封装到Fenye中

        $navigate="";
        //首页
        //$navigate.="<a href='".$fenye->getUri()."page=1'>首页</a>&nbsp;";
        $navigate.="<a href='javascript:showpage(\"".$fenye->getUri()."&page=1\")'>首页</a>&nbsp;";
        //显示上一页
        if($fenye->getPageNow()>1){
            $prePage=$fenye->getPageNow()-1;
            $navigate.= "<a href='javascript:showpage(\"".$fenye->getUri()."&page=$prePage\")'>上一页</a>&nbsp;";
        }
        //前十页
        if($fenye->getPageNow()>$fenye->getPageWhole()){
            $uPage=((ceil($fenye->getPageNow()/$fenye->getPageWhole())-1)-1)*$fenye->getPageWhole()+1;
            $navigate.="<a href='javascript:showpage(\"".$fenye->getUri()."&page=$uPage\")'><<</a>&nbsp;";
        }
        //分页
        $pages=(ceil($fenye->getPageNow()/$fenye->getPageWhole())-1)*$fenye->getPageWhole()+1;
        for($i=0;$i<$fenye->getPageWhole();$i++){
            $p=$pages+$i;
            if($p>$fenye->getPageCount()){
                break;
            }
            if($fenye->getPageNow()==$p){
                $navigate.="<a style='color:#2aa7ff'>&nbsp;$p&nbsp;</a>&nbsp;";
                continue;
            }
            $navigate.="<a href='javascript:showpage(\"".$fenye->getUri()."&page=$p\")'>&nbsp;$p&nbsp;</a>&nbsp;";
        }
        //后十页
        $ePage=(ceil($fenye->getPageCount()/$fenye->getPageWhole())-1)*$fenye->getPageWhole()+1;
        if($fenye->getPageNow()<$ePage){
            $dPage=ceil($fenye->getPageNow()/$fenye->getPageWhole())*$fenye->getPageWhole()+1;
            $navigate.="<a href='javascript:showpage(\"".$fenye->getUri()."&page=$dPage\")'>>></a>&nbsp;";
        }
        //显示下一页
        if($fenye->getPageNow() < $fenye->getPageCount()){
            $nextPage=$fenye->getPageNow()+1;
            $navigate.= "<a href='javascript:showpage(\"".$fenye->getUri()."&page=$nextPage\")'>下一页</a>&nbsp;";
        }
        //尾页
        $endPage=$fenye->getPageCount();
        //$navigate.="<a href='?page=$endPage'>尾页</a>&nbsp;";
        $navigate.="<a href='javascript:showpage(\"".$fenye->getUri()."&page=$endPage\")'>尾页</a>&nbsp;";
        //当前页/总页数
        $navigate.="当前<span style='color:red;'>{$fenye->getPageNow()}</span>页/总共{$fenye->getPageCount()}页";

        $fenye->setNavigate($navigate);

    }

    //关闭数据库连接
    public function close_connect(){
        if(!empty($this->conn)){
            mysql_close($this->conn);
        }
    }
}

?>
