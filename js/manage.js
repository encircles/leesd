
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
    var searchVal=document.getElementById("searchVal").value;
    var url="";
    if(content!=""){
        if(searchVal=="搜索用户"){
            url="./userdata.php?searchVal="+content;
        }else if(searchVal=="搜索留言"){
            url="./contentdata.php?searchVal="+content;
        }
        showpage(url);
    }else{
        if(searchVal=="搜索用户"){
            showpage('./userdata.php');
        }else if(searchVal=="搜索留言"){
            showpage('./contentdata.php');
        }

    }
}

function test(){
    var searchdiv=document.getElementById("searchVal");
    alert(searchdiv.value);
}

//切换导航条
function switchNav(v){
    var um=document.getElementById("usermanage");
    var cm=document.getElementById("contentmanage");
    var searchBt=document.getElementById("searchVal");
    if(v=="用户管理"){
        showpage('./userdata.php');
        um.style.backgroundColor="#2aa7ff";
        cm.style.backgroundColor="";
        searchBt.value="搜索用户";
    }else if(v=="留言管理"){
        showpage('./contentdata.php');
        um.style.backgroundColor="";
        cm.style.backgroundColor="#2aa7ff";
        searchBt.value="搜索留言";
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



