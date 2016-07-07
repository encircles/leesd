/**
 * Created by encir on 2016/6/27.
 */


window.onscroll=function(){
    var t = document.documentElement.scrollTop || document.body.scrollTop;
    var topdiv=document.getElementById("triangle-up");
    if( t >= 300 ) {
        topdiv.style.display = "block";
    } else {
        topdiv.style.display = "none";
    }
};

function confirmDelete(user,title){
    return window.confirm("是否要删除\n标题:  "+title+"\n用户:  "+user+"  的留言")
}

function checkLogin(){
    alert("请登录");
}

function t(){
    var d=document.getElementById("talkbubble").scrollTop(500);
}

function addheart(id,zan){
    var zz=zan.nextSibling;
    var url;
    var xhr;
    if(zan.style.color==""){
        url="./controller/addHeartsProcess.php?&id="+id+"&type=add";
        xhr=new XMLHttpRequest();
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4){
                zz.innerText=xhr.responseText;
                zan.style.color="#ff0000";
            }
        };
        xhr.open('get',url);
        xhr.send(null);
    }else if(zan.style.color=="rgb(255, 0, 0)"){
        url="./controller/addHeartsProcess.php?&id="+id+"&type=reduce";
        xhr=new XMLHttpRequest();
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4){
                zz.innerText=xhr.responseText;
                zan.style.color="";
            }
        };
        xhr.open('get',url);
        xhr.send(null);
    }

}

function addheart2(id,zan){

    var zz=zan.nextSibling;
    var url;
    var xhr;
    if(zan.id=="heart"){
        url="./controller/addHeartsProcess.php?&id="+id+"&type=add";
        xhr=new XMLHttpRequest();
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4){
                zz.innerText=xhr.responseText;
                zan.id="heart_other";

            }
        };
        xhr.open('get',url);
        xhr.send(null);
    }else if(zan.id=="heart_other"){
        url="./controller/addHeartsProcess.php?&id="+id+"&type=reduce";
        xhr=new XMLHttpRequest();
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4){
                zz.innerText=xhr.responseText;
                zan.id="heart";
            }
        };
        xhr.open('get',url);
        xhr.send(null);
    }

}

function showCommentInfo(id){
    var url="./showcomment.php?id="+id;
    var showct="showCommentDiv"+id;
    var sct=document.getElementById(showct);
    var xhr=new XMLHttpRequest();
    xhr.onreadystatechange=function(){
        if(xhr.readyState==4){
            if(xhr.responseText==""){
                sct.innerHTML="暂时没有评论...";
            }else{
                sct.innerHTML=xhr.responseText;
            }
        }
    };
    xhr.open('get',url);
    xhr.send(null);
}

function openComment(id){
    var c="commentDiv"+id;
    var ta="commentText"+id;
    var cid="comment"+id;
    var ct=document.getElementById(c);
    var d1=document.getElementById(cid);
    var textarea=document.getElementById(ta);
    if(d1.style.display=="block"){
        d1.style.display="none";
        ct.innerHTML="评论";
    }else if(d1.style.display=="none"){
        d1.style.display="block";
        ct.innerHTML="收起评论";
        showCommentInfo(id);
        textarea.focus();
    }
}

function showpage(url){
    var id_index=url.indexOf("=");
    var and_index=url.indexOf("&");
    var end=and_index - id_index -1;
    var id=url.substr(id_index+1,end);
    var showct="showCommentDiv"+id;
    var xhr=new XMLHttpRequest();
    xhr.onreadystatechange=function(){
        if(xhr.readyState==4){
            document.getElementById(showct).innerHTML=xhr.responseText;
        }
    };
    xhr.open('get',url);
    xhr.send(null);
}

function addComment(id,uid,sender,receiver){
    var ct_id="commentText"+id;
    var content=document.getElementById(ct_id).value;
    if(content!=""){
        var info="&id="+id+"&uid="+uid+"&sender="+sender+"&receiver="+receiver+"&content="+content;
        var xhr=new XMLHttpRequest();
        xhr.onreadystatechange=function(){
            if(xhr.readyState==4){
                showCommentInfo(id);
                getCounmentCount(id);
                document.getElementById(ct_id).value="";
                document.getElementById(ct_id).focus();
            }
        };
        xhr.open("post","./controller/addCommentProcess.php");
        xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
        xhr.send(info);
    }

}

function getCounmentCount(id){
    var count_id="commentCount"+id;
    var countdiv=document.getElementById(count_id);
    var url="./getCommentCount.php?&id="+id;
    var xhr=new XMLHttpRequest();
    xhr.onreadystatechange=function(){
        if(xhr.readyState==4){
            countdiv.innerHTML=xhr.responseText;
        }
    };
    xhr.open("get",url);
    xhr.send(null);
}

function showDiv(divname){
    var div=document.getElementById(divname);
    if(div.style.display=="none"){
        div.style.display="block";
    }else if(div.style.display=="block"){
        div.style.display="none";
    }
}

function openDiv(s){
    var divs="divs"+s;
    var divh="divh"+s;
    var bt1="bt1"+s;
    var bt2="bt2"+s;
    var b1=document.getElementById(bt1);
    var b2=document.getElementById(bt2);
    var dh=document.getElementById(divh);
    var ds=document.getElementById(divs);
    if(dh.style.display=="none"){
        dh.style.display="block";
        ds.style.display="none";
        b1.innerText="收起↑↑";
        b2.innerText="收起↑↑";
        b2.style.display="inline";
    } else if(dh.style.display=="block"){
        dh.style.display="none";
        ds.style.display="block";
        b1.innerText="展开↓↓";
        b2.innerText="展开↓↓";
        b2.style.display="none";
    }
}

function hideDiv(){
    document.getElementById('menudiv2').style.display="none";
}

function safeQuit(){
    window.location="./safeQuit.php";
}

