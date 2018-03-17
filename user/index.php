<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="../CSS/head.css" />
<link rel="stylesheet" type="text/css" href="../CSS/index.css" />
<link rel="stylesheet" href="../CSS/luara.css" type="text/css"  />
<link rel="stylesheet" href="../CSS/style.css" type="text/css" />
<SCRIPT src="../JS/tbhb.js" type="text/javascript"></SCRIPT>
<script src="../JS/jquery-1.8.3.min.js"></script>
    <!--Luara js文件-->
<script src="../JS/jquery.luara.0.0.1.min.js" ></script>
<link href="../CSS/css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="../CSS/normalize.css">

        <link rel="stylesheet" type="text/css" href="../CSS/demo.css">

        <link rel="stylesheet" type="text/css" href="../CSS/set2.css">

        <link rel="stylesheet" type="text/css" href="../CSS/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../CSS/demoadpacks.css">

<title>食尚</title>
</head>
<body>
<?php
    include("../CLASS/Mysql_db.php");
    $db=new Mysql_db("shishang","");
	require_once("head.php");
?>

<div id="main">
	<div class="tplb">
        
        <!--Luara图片切换骨架begin-->
        <ul>
            <li><a href="#"><img src="../images/index/lunbo1.jpg"/></a></li>
            <li><a href="#"><img src="../images/index/lunbo2.jpg"/></a></li>
        </ul>
        <ol>
            <li></li>
            <li></li>
        </ol>
    <!--Luara图片切换骨架end-->
    </div><!--tplb图片轮播-->
     <script>
    $(function(){
        <!--调用Luara示例-->
        $(".tplb").luara({width:"100%",height:"750",interval:6000,selected:"seleted"});                 /*  宽度          高度       切换时间  毫秒ms*/

    });
    </script>
    
    <div id="caidan">
        <div class="caidanliaoli">菜单料理</div>
        <div class="pic_kuang">
        <div class="grid">
            <figure class="effect-hera">
                <img src="../images/index/C_type.jpg" alt="C_type">
                    <figcaption>
                        <h2>中式菜品</h2>
                        <p>
                            <a href="#/index2.html#"><i class="fa fa-fw fa-file-pdf-o"></i></a>
                            <a href="#/index2.html#"><i class="fa fa-fw fa-file-image-o"></i></a>
                            <a href="#/index2.html#"><i class="fa fa-fw fa-file-archive-o"></i></a>
                            <a href="#/index2.html#"><i class="fa fa-fw fa-file-code-o"></i></a>

                        </p>
                    </figcaption>           
            </figure>

            <figure class="effect-hera">
                <img src="../images/index/ALL_desert.jpg" alt="ALL_desert">
                    <figcaption>
                        <h2>各式甜点</h2>
                        <p>
                            <a href="#/index2.html#"><i class="fa fa-fw fa-file-pdf-o"></i></a>
                            <a href="#/index2.html#"><i class="fa fa-fw fa-file-image-o"></i></a>
                            <a href="#/index2.html#"><i class="fa fa-fw fa-file-archive-o"></i></a>
                            <a href="#/index2.html#"><i class="fa fa-fw fa-file-code-o"></i></a>

                        </p>
                    </figcaption>           
            </figure>
            
            <figure class="effect-hera">
                <img src="../images/index/J_type.jpg" alt="J_type">
                    <figcaption>
                        <h2>日式料理</h2>
                        <p>
                            <a href="#/index2.html#"><i class="fa fa-fw fa-file-pdf-o"></i></a>
                            <a href="#/index2.html#"><i class="fa fa-fw fa-file-image-o"></i></a>
                            <a href="#/index2.html#"><i class="fa fa-fw fa-file-archive-o"></i></a>
                            <a href="#/index2.html#"><i class="fa fa-fw fa-file-code-o"></i></a>

                        </p>
                    </figcaption>           
            </figure>

            </div>
        </div>
    </div>

    <div id="hot">
        <div class="hotname">
            <p class="pro_n">热销产品</p>
            <p class="eat">在好吃之上 更讲求营养 关心顾客最本质的需求</p>
            <div class="co">
                <ul>
                    <li><a href="hot_product.php?id=<?php echo $type=1;?>">中式菜品</a></li>
                    <li><a href="hot_product.php?id=<?php echo $type=2;?>">各式甜点</a></li>
                    <li><a href="hot_product.php?id=<?php echo $type=3;?>">日式料理</a></li>
                    <li style="border-right:none;"><a href="hot_product.php?id=<?php echo $type=4;?>">饮品饮料</a></li>
                </ul>
            </div>
        </div>

        <div id="pro_kuang">
            <?php  
                $rs=array();
                $rs=$db->get_all("select * from hot_product order by p_time desc limit 0,7");
                foreach ($rs as $pro ) {
                    echo "<div class='pro'>";
                    echo "<div class='grid'>";
                    echo "<a href='caidan_count.php?food=".$pro['p_id']."'>";
                    echo "<figure class='effect-apollo'>";
                    echo "<img src='".$pro['p_image']."' />";
                    echo "<figcaption>";
                    echo "<div class='zhezhao'><a class='zz_a'>".$pro['p_name']."</a></div>";
                    echo "</figcaption>";
                    echo "</figure></a>";
                    echo "</div>";                    
                    echo "</div>";
                }
            ?>
            <div class="pro">
                <div class="grid">
                    <a href="hot_product.php">
                    <figure class="effect-apollo"><img src="../images/product/xjnygnx.jpg">
                        <figcaption><div class="zz">更多+</div></figcaption>
                    </figure></a>
                </div>
            </div>
        </div>
    </div>

    <div id="pinpai">
        <div class="pinpai_con">
            <div class="pinpai_pic"></div>
            <p class="gushi">品牌故事</p>
            <p class="gushi_con">食尚健康食品，希望带着“分享优质食材”的坚持。</p>
            <p class="gushi_two">为人们提供一口感动舌尖的美味，更为增添一份撼动心灵的人情。一份菜品、一口美味，都是生活的酸甜苦辣。</p>
            <div class="gushi_cre">健康食品，创造菜品美味和情味！</div>
        </div>
    </div>

    <div id="news">
        <div class="news_con">
            <p class="dongtai">新闻动态</p>
            <p class="linian">理念健康时尚才能脱颖而出</p>
        </div>
        <div class="news_main">
            <?php  
                $rs=array();
                $rs=$db->get_all("select * from hot_product where is_news=1 order by p_time desc limit 0,4");
                foreach ($rs as $new ) {
                    echo "<div class='new_kuang'>";
                    echo "<div class='kuang'><img src='".$new['p_image']."'>";
                    echo "</div>";
                    echo "<div class='new_right'>";
                    echo "<a class='n_name' href='caidan_count.php?food=".$new['p_id']."'>".$new['p_name']."</a>";
                    echo "<img src='../images/index/hr.png'>";
                    if(strlen($new['p_description'])>300)
                        {
                            echo "<p class='new_con'>".substr($new['p_description'], 0,300)."...</p>";
                        }else{
                            echo "<p class='new_con'>".$new['p_description']."</p>";
                        }
                    echo "</div>";
                    echo "</div>";
                }
            ?>
            <div class="look"><a href="news.php">查看更多</a></div>
        </div>
    </div>

    <div id="jiameng">
        <div class="jiameng_left">
            <p class="firm">食尚餐饮有限公司</p>
            <p class="jiam">加盟热线：0898-123-4567</p>
            <p class="jiam">地址：海南省海口市桂林洋大学城琼台师范学院</p>
            <p class="jiam">邮箱：123456789@163.com</p>
        </div>

        <form id="jm_form" name="jm_form" method="post" onsubmit="return checkinfo()" action="zhaoshang_ok.php" >
        <div id="jiameng_right">
            <input type="username" name="username" id="username" value="您的姓名" onfocus="if (value =='您的姓名'){value =''}" onblur="if (value ==''){value='您的姓名'}" />
            <input type="telphone" name="telphone" id="telphone" value="您的电话" onfocus="if (value =='您的电话'){value =''}" onblur="if (value ==''){value='您的电话'}" />
            <select id="jm" name="jm">
                <option value="意向加盟城市">意向加盟城市</option>
                <option value="北京">北京</option>
                <option value="上海">上海</option>
                <option value="广州">广州</option>
                <option value="深圳">深圳</option>
            </select>
            <input type="e_mail" name="e_mail" id="e_mail" value="邮箱" onfocus="if (value =='邮箱'){value =''}" onblur="if (value ==''){value='邮箱'}" />
            <button type="submit" >提交</button>
        </div>
        </form>
    </div>
            
</div>


<?php
    require_once("bottom.php");
?>
<script type="text/javascript">
function checkinfo(){
    if(jm_form.username.value=="您的姓名")
    {
        alert("用户名不能为空，请输入您的真实姓名");
        jm_form.username.focus();
        return false;
    }
    if(jm_form.username.value.length<1 || jm_form.username.value.length>6) 
    {
        alert("用户名长度不合法，请输入您的真实姓名");
        jm_form.username.focus();
        return false;
    }
    if(jm_form.telphone.value=="您的电话")
    {
        alert("联系电话不能为空");
        jm_form.telphone.focus();
        return false;
    }
    if (jm_form.telphone.value.length!=11) 
    {
        alert("联系电话长度不合法，请重新输入");
        jm_form.telphone.focus();
        return false;
    }
    var myselect=document.getElementById("jm");
    var index=myselect.selectedIndex ; 
    myselect.options[index].value;
    myselect.options[index].text;
    if(myselect.options[index].text=="意向加盟城市")
    {
        alert("请选择您意向加盟的城市");
        jm_form.jm.focus();
        return false;
    }
    if(jm_form.e_mail.value=="邮箱")
    {
        alert("邮箱不能为空");
        jm_form.e_mail.focus();
        return false;
    }
    else
    {
        for(i=0;i<jm_form.e_mail.value.length;i++)
        if(jm_form.e_mail.value.charAt(i)=='@')     break;
        if(i==jm_form.e_mail.value.length)
        {
            alert("邮箱格式不合法");
            jm_form.e_mail.focus();
            return false;
        }
        if(jm_form.e_mail.value.length<1 || jm_form.e_mail.value.length>30) 
        {
            alert("邮箱长度不合法");
            jm_form.e_mail.focus();
            return false;
        }
    }
    
}
</script>

</body>
</html>