/**
 * Created by encir on 2016/7/8.
 */

/**
 * 拆分url参数, 链接+参数
 * @param url
 * @returns {Array}
 */
function splitURL(url){
    var arr=new Array(null);
    var split_num=url.indexOf("&");
    if(split_num==-1){
        arr['uri']=url;
        arr['info']="";
    }else{
        arr['uri']=url.substr(0,split_num);
        arr['info']=url.substr(split_num);
    }
    return arr;
}

/**
 * 获取链接中的 id 信息
 * @param url
 * @returns {string}
 */
function getUrlId(url){
    var id_index=url.indexOf("=");
    var and_index=url.indexOf("&id");
    var end=id_index - and_index -1;
    return url.substr(id_index+1,end);
}