
//前台调用
var $ = function(){
	return new Base();
}
/*
//基础库
function Base(){		改动，将里面内容拿出来，使其为空

	//2、创建一个数组，来保存获取的节点和节点数组
	this.elements = [];

	//获取ID节点
	this.getId = function(id){
		//return document.getElementById(id);	1、如果实现连缀的话不能返回这一个
		this.elements.push(document.getElementById(id));
		return this;
	};

	//获取元素节点
	this.getTagName = function(tag){
		//this.elements.push(document.getElementsByTagName(tag));	只赋了一个值，需要进行逐个赋值
		var tags = document.getElementsByTagName(tag);
		for(var i=0;i<tags.length;i++){
			this.elements.push(tags[i]);
		}
		return this;
	};
}
*/

//基础库
function Base(){
	//创建一个数组，来保存获取的节点和节点数组
	this.elements = [];	//将置于外部的公有化数组变为私有，即每次进行实例化
}	//this变为Base.prototype原型

/*
//创建一个数组，来保存获取的节点和节点数组
Base.prototype.elements = [];
*/

//获取ID节点
Base.prototype.getId = function(id){
	//return document.getElementById(id);	1、如果实现连缀的话不能返回这一个
	this.elements.push(document.getElementById(id));
	return this;
}

//获取元素节点数组
Base.prototype.getTagName = function(tag){
	//this.elements.push(document.getElementsByTagName(tag));	只赋了一个值，需要进行逐个赋值
	var tags = document.getElementsByTagName(tag);
	for(var i=0;i<tags.length;i++){
		this.elements.push(tags[i]);
	}
	return this;
}

//获取ClASS节点数组
Base.prototype.getClass = function(className,idName){
	var node = null;
	if (arguments.length == 2) {
		node = document.getElementById(idName);
	}else{
		node = document;
	}
	//获取到所有的节点，然后循环
	//var all = document.getElementById('idName').getElementsByTagName('*');	
	var all = node.getElementsByTagName('*');	//替换前面内容
	for (var i = 0; i < all.length; i++) {
		if (all[i].className == className) {	//找到相同的className放到一个数组中
			this.elements.push(all[i]);
		}
	}
	return this;
}

//获取某一个节点
Base.prototype.getElement = function(num){	//传一个num，数量，第几个
	var element = this.elements[num];
	this.elements = [];		//清空
	this.elements[0] = element;		//赋值，剩一个
	return this;
}

//如果向function Base()添加一个方法，应该在原型上添加，prototype
//设置CSS
Base.prototype.css = function(attr,value){
	for(var i = 0;i < this.elements.length;i ++){
		if(arguments.length == 1){			//判断数组长度
			//return this.elements[i].style[attr];	改为计算后的样式，兼容浏览器
			if (typeof window.getComputedStyle != 'undefined') {	//W3C
				return window.getComputedStyle(this.elements[i],null)[attr];
				//传两个参数，第一个this.elements[i]为节点对象，第二个null得到style的对象句柄，
				//再调用传过来的是什么属性，即attr
			}else if (typeof this.elements[i].currentStyle != 'undefined') {//IE
				return this.elements[i].currentStyle[attr];
			}
		}
		this.elements[i].style[attr] = value;
	}
	//this.elements[0].style[attr] = value;		只能改变一个P的属性
	return this;	//返回值
}

//添加Class
Base.prototype.addClass = function(className){
	for(var i = 0;i < this.elements.length;i ++){
		//检查clas是否重复添加
		if (!this.elements[i].className.match(new RegExp('(\\s|^)' + className +'(\\s|$)'))) {
			//match为正则表达式里的一个方法，\s表示空格，^表示开头无空格，$表示结尾无空格
			//为添加的class格式进行判断，\\s加上一个\表示对\s进行转义
			//this.elements[i].className = className;		//为了能够多次对一个id进行class的添加
			//使用累加方法
			this.elements[i].className += className + ' ';
		}	
	}
	return this;
}

//移除Class
Base.prototype.removeClass = function(className){
	for(var i = 0;i < this.elements.length;i ++){
		//检查clas是否重复添加
		if (this.elements[i].className.match()) {
			this.elements[i].className = this.elements[i].className.replace(new RegExp('(\\s|^)' + className +'(\\s|$)'),'');
		}	
	}
	return this;
}


//添加link或style的CSS规则
Base.prototype.addRule = function(num,selectorText,cssText,position){
	var sheet = document.styleSheets[num];
	if (typeof sheet.insertRule != 'undefined') {	//W3C
		sheet.insertRule(selectorText + '{' + cssText + '}', position);	
		//insertRule('body{background:red}',0)
	}else if (typeof sheet.addRule != 'undefined') {//IE
		//addRule('body','background:red',0)
		sheet.addRule(selectorText,cssText,position);
	}
}

//移除link或style的CSS规则
Base.prototype.removeRule = function(num,index){
	var sheet = document.styleSheets[num];
	if (typeof sheet.deleteRule != 'undefined') {	//W3C   插入，删除
		sheet.deleteRule(index);	
	}else if (typeof sheet.removeRule != 'undefined') {//IE   添加，移除
		sheet.removeRule(index);
	}
}


//设置innerHTML
Base.prototype.html = function(str){
	for(var i = 0;i < this.elements.length;i ++){
		if(arguments.length == 0)	//加入if判断为了获取值，但是无法实现连缀，不过获取内容不需要连缀
		{
			return this.elements[i].innerHTML; 
		}
		this.elements[i].innerHTML = str;
	}
	return this;	
}

//触发点击事件
Base.prototype.click = function(fn){	//传匿名函数，循环
	for(var i = 0;i < this.elements.length;i ++){
		this.elements[i].onclick = fn;
	}
	return this;
}

//设置鼠标移入移出方法
Base.prototype.hover = function(over,out){
	for(var i = 0;i < this.elements.length;i ++){
		this.elements[i].onmouseover = over;
		this.elements[i].onmouseout = out;
	}
	return this;
}

//设置显示
Base.prototype.show = function(){
	for(var i = 0;i < this.elements.length;i ++){
		this.elements[i].style.display = 'block';
	}
	return this;
}

//设置隐藏
Base.prototype.hide = function(){
	for(var i = 0;i < this.elements.length;i ++){
		this.elements[i].style.display = 'none';
	}
	return this;
}