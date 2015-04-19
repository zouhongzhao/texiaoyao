
  $(document).ready(function()  {  
        
   //隐藏显示窗口
 $(".helper-button").click(function () { 
$(".helper-wrap").toggle("fast",function(){ $(".show").css({right:"53px",top:"112px"});}); 
})  
//关闭窗口
 $(".helper-box-close").click(function () { 
$(".helper-wrap").hide("fast",function(){ $(".show").css({right:"53px",top:"112px"});}); 

}) 

//广告商网站主显示
$("#advertiser").mousemove(
  function () {
    $(this).siblings().children("a").removeClass("on");
   $(this).children("a").addClass("on");
  $("#affili").fadeOut(10,function(){$("#adver").fadeIn(10);});
  }
)


$("#affiliate").mousemove(
  function () {
   $(this).siblings().children("a").removeClass("on");
   $(this).children("a").addClass("on");
    $("#adver").fadeOut(10,function(){	$("#affili").fadeIn(10);});
  }
)
//广告商网站主常见问题显示
$(".con li a").click(function () {
     
     $(this).parent().siblings().children(".helper-box-list-con").slideUp(300);
     $(this).parent().children(".helper-box-list-con").slideToggle(300);
  }
);
	   

	//窗口移动   
$(function(){
	var _move=false;//移动标记
	var _x,_y;//鼠标离控件左上角的相对位置
	var moveNode=$('.helper-wrap');
	var mouseDownNode=$('.helper-wrap');
	var windowWidth=$(window).width();
	var windowHeight=$(window).height();
	var moveNodeHeight=$('.helper-wrap').height();
	var moveNodeWidth=$('.helper-wrap').width();
  
	mouseDownNode.mousedown(function(e){
		e.preventDefault();
		windowWidth=$(window).width();
		windowHeight=$(window).height();
		moveNodeHeight=$('.helper-wrap').height();
		moveNodeWidth=$('.helper-wrap').width();
		_move=true;
		_x=e.pageX-(windowWidth-parseInt(moveNode.css("right"))-moveNodeWidth);
		_y=e.pageY-parseInt(moveNode.css("top"));
	   
	});
	$(document).mousemove(function(e){
		if(_move){
			var x=e.pageX-_x;//移动时根据鼠标位置计算控件左上角的绝对位置
			var y=e.pageY-_y;
			if(x < 0) x=0;//判断div与浏览器距离
			if(x > windowWidth-moveNodeWidth) x=windowWidth-moveNodeWidth;
			if(y < 0) y=0;
			if(y > windowHeight-moveNodeHeight) y=windowHeight-moveNodeHeight;
			moveNode.css({top:y,right:(windowWidth-x-moveNodeWidth)});
			//控件新位置
			e.preventDefault();
		}
	}).mouseup(function(){
		_move=false;
	   
  });
});
    })  
     
