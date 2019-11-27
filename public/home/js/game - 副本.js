setTimeout(()=>{
	//console.log('')
	$("#cocosLoading").css({display:'none'})
},1000);

var cwidth=document.body.clientWidth;
var cheight=document.body.clientHeight;

function get_height(bimgw,bimgh){
	//max 1250;
	let zwidth=cwidth<1250?cwidth:1250;
	let zheight=(zwidth*bimgh/bimgw);
     return {width:zwidth,height:zheight,bi:bimgw/zwidth};
}
function get_height_er(bimgw,bimgh){
	//max 1250;  174x116
	let zwidth=cwidth<1250?cwidth:1250;
	let zheight=(zwidth*bimgh/bimgw);
     return {width:zwidth,height:zheight};
}
//执行动画


//2.6 max 1250;
var c=document.getElementById("gameCanvas");
c.style.background='#fff';
var cxt=c.getContext("2d");
var img=new Image()
img.src="/home/image2/unlogined1.jpg";
var newObject;
//var img=document.getElementById("background-img");
var weizhi=[{x:320,y:590,'img':'/home/image2/1_1_hide.png'}];
img.onload = function(info)
{
	let bimgw=img.width;
	let bimgh=img.height;
	//
	var newObject=get_height(bimgw,bimgh);
	//$('#gameCanvas').attr('width',newObject.width)
	c.width=newObject.width;
	c.height=newObject.height;
	//
	let pheiht=(cheight-newObject.height)/2
	document.getElementById("mian").style.padding=pheiht+"px  0px";
	res=cxt.drawImage(img,0,0,bimgw,bimgh,0,0,newObject.width,newObject.height);
	//bu其他图片
	img.src=weizhi[0].img;
	img.onload = function(info)
	{
		let x=(weizhi[0].x/newObject.bi)
		let y=(weizhi[0].y/newObject.bi)
		
		  cxt.drawImage(img,0,0,bimgw,bimgh,x,y,newObject.width,newObject.height);	
		  ctx.save();
	}
	cxt.canvas.onmousemove= function(e){  
		p=getEventPosition(e);
		for(var i in weizhi){
			newx=(weizhi[i].x/newObject.bi);
			newy=(weizhi[i].y/newObject.bi);
			if(newx<p.x&&newx+65>p.x&&newy<p.y&&newy+55>p.y){


				img.src=weizhi[0].img;
				img.onload = function(info)
				{
					let x=(weizhi[0].x/(newObject.bi+0.1))
					let y=(weizhi[0].y/(newObject.bi+0.1))
					console.log(x)
					cxt.drawImage(img,0,0,bimgw,bimgh,x,y,newObject.width*1.5,newObject.height*1.5);
				}
				//console.log('asd')
				//jiazimg(cxt,weizhi[i].img)
			}else{

			}
		}
	}
}

function (){

}
function jiazimg(cxt,img){
	img.src=weizhi[0].img;
	img.onload = function(info)
	{
		let x=(weizhi[0].x/newObject.bi-0.5)
		let y=(weizhi[0].y/newObject.bi-0.5)
		  cxt.drawImage(img,0,0,bimgw,bimgh,x,y,newObject.width,newObject.height);
	}
}
function getEventPosition(ev){  
    var x, y;  
    if (ev.layerX || ev.layerX == 0) {  
        x = ev.layerX;  
        y = ev.layerY;  
    }else if (ev.offsetX || ev.offsetX == 0) { // Opera  
        x = ev.offsetX;  
        y = ev.offsetY;  
    }  
    return {x: x, y: y};  
}   
//
	//bu其他图片

	
//img.src="/home/image2/unlogined1.jpg";
//res=cxt.drawImage(img,0,0);


/*
var grd=cxt.createLinearGradient(0,0,175,50);
grd.addColorStop(0,"#FF0000");
grd.addColorStop(1,"#00FF00");
cxt.fillStyle=grd;
cxt.fillRect(0,0,175,50);
*/

