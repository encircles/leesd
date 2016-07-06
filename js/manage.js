
window.onload=function(){
    var um=document.getElementById("usermanage");
    showpage('./userdata.php');
    um.style.backgroundColor="#2aa7ff";
};

//显示页面
function showpage(url){
    var xhr=new XMLHttpRequest();
    xhr.onreadystatechange=function(){
        if(xhr.readyState==4){
            document.getElementById('userlist').innerHTML=xhr.responseText;
        }
    };
    xhr.open('get',url);
    xhr.send(null);
}

//search
function searchContent(){
    var content=document.getElementById("searchContent").value;
    if(content!=""){
        var url="./userdata.php?searchVal="+content;
        showpage(url);
    }else{
        showpage('./userdata.php');
    }
}

//切换导航条
function switchNav(v){
    var um=document.getElementById("usermanage");
    var cm=document.getElementById("contentmanage");
    if(v=="用户管理"){
        showpage('./userdata.php');
        um.style.backgroundColor="#2aa7ff";
        cm.style.backgroundColor="";
    }else if(v=="留言管理"){
        showpage('./contentdata.php');
        um.style.backgroundColor="";
        cm.style.backgroundColor="#2aa7ff";
    }
}

function delMsg(uid){
    return confirm("是否删除uid=="+uid+"的用户");
}

function goToIndex(){
    window.location="../index.php";
}

function goToManageIndex(){
    window.location="../manage/index.php";
}

function showHideDiv(i){
    var id="hidecontent"+i;
    var d=document.getElementById(id);
    if(d.style.display=="block"){
        d.style.display="none";
    }else if(d.style.display=="none"){
        d.style.display="block";
    }
}



