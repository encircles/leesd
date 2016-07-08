<?php

class Fenye{
    private $pageSize=5;
    private $res_array;     //结果集数组
    private $rowCount;      //总共多少条留言信息
    private $pageNow=1;     //当前页
    private $pageCount=1;     //总共有多少页
    private $navigate;      //分页导航条
    private $pageWhole=10;  //显示多少个分页链接
    private $uri;


    public function __construct($pa=""){
        $this->uri=$this->setUri($pa);
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    private function setUri($pa)
    {
        $url=$_SERVER["REQUEST_URI"].(strpos($_SERVER["REQUEST_URI"],"?")?"":"?").$pa;
        $parse=parse_url($url);
        if(isset($parse["query"])){
            parse_str($parse['query'],$params);
            unset($params["page"]);
            $url=$parse['path'].'?&'.http_build_query($params);
        }
        return $url;
    }


    /**
     * @return mixed
     */
    public function getPageCount()
    {
        return $this->pageCount;
    }

    /**
     * @param mixed $pageCount
     */
    public function setPageCount($pageCount)
    {
        $this->pageCount = $pageCount;
    }

    /**
     * @return int
     */
    public function getPageWhole()
    {
        return $this->pageWhole;
    }

    /**
     * @param int $pageWhole
     */
    public function setPageWhole($pageWhole)
    {
        $this->pageWhole = $pageWhole;
    }

    /**
     * @return int
     */
    public function getPageNow()
    {
        return $this->pageNow;
    }

    /**
     * @param int $pageNow
     */
    public function setPageNow($pageNow)
    {
        $this->pageNow = $pageNow;
    }

    /**
     * @return mixed
     */
    public function getNavigate()
    {
        return $this->navigate;
    }

    /**
     * @param mixed $navigate
     */
    public function setNavigate($navigate)
    {
        $this->navigate = $navigate;
    }

    /**
     * @return int
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

    /**
     * @param int $pageSize
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    /**
     * @return mixed
     */
    public function getResArray()
    {
        return $this->res_array;
    }

    /**
     * @param mixed $res_array
     */
    public function setResArray($res_array)
    {
        $this->res_array = $res_array;
    }

    /**
     * @return mixed
     */
    public function getRowCount()
    {
        return $this->rowCount;
    }

    /**
     * @param mixed $rowCount
     */
    public function setRowCount($rowCount)
    {
        $this->rowCount = $rowCount;
    }

}

?>
