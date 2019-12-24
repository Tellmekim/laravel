var cwidth=document.body.clientWidth-50;
var cheight=document.body.clientHeight-50;
function get_height(bimgw,bimgh){
	//max 1250;
	//let zwidth=cwidth<1250?cwidth:1250;
	let newwidth= bimgw*cheight/cwidth;
	if(newwidth>cwidth){
		let	zwidth=cwidth;
		let zheight=(zwidth*bimgh/bimgw);
		return {width:zwidth,height:zheight,bi:bimgw/zwidth};
	}else{
		//console.log(cheight)
		let	zheight=cheight;
		let	zwidth=zheight*bimgw/bimgh;
			return {width:zwidth,height:zheight,bi:bimgw/zwidth};
	}
	//let zheight=(zwidth*bimgh/bimgw);
     return {width:zwidth,height:zheight,bi:bimgw/zwidth};
}
function get_height_er(bimgw,bimgh){
	//max 1250;  174x116
	let zwidth=cwidth<1250?cwidth:1250;
	let zheight=(zwidth*bimgh/bimgw);
     return {width:zwidth,height:zheight};
}
//执行动画
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
weizhi={};
var c=document.getElementById("gameCanvas");
var cxt=c.getContext("2d");

		/*var weizhi=[
				{x:320,y:590,'img':'/home/image2/1_1_hide.png','type':'img'},
				{x:315,y:435,'img':'/home/image2/1_2_hide.png','type':'img'},
				{x:105,y:315,'img':'/home/image2/1_3_hide.png','type':'img'},
				{x:155,y:120,'img':'/home/image2/1_4_hide.png','type':'img'},
				{x:490,y:30,'img':'/home/image2/2_1_hide_strong.png','type':'img'},
				{x:550,y:150,'img':'/home/image2/2_2_hide_strong.png','type':'img'},
				{x:720,y:30,'img':'/home/image2/2_3_hide_strong.png','type':'img'},
				{x:920,y:90,'img':'/home/image2/2_4_hide_strong.png','type':'img'},
				{x:1200,y:250,'img':'/home/image2/3_1_hide_strong.png','type':'img'},
				{x:1100,y:570,'img':'/home/image2/3_1_hide_strong.png','type':'img'},
				{x:80,y:30,'img':'/home/image2/btn_login.png','type':'img'},
				{x:320,y:30,'img':'/home/image2/btn_reg.png','type':'img'},
			];
		var weizhi=[
			{x:320,y:590,'img':'/home/image2/1_1_hide.png',link:'','type':'img'},
			{x:315,y:435,'img':'/home/image2/1_2_hide.png',link:'','type':'img'},
			{x:105,y:315,'img':'/home/image2/1_3_hide.png',link:'','type':'img'},
			{x:170,y:140,'img':'/home/image2/1_4_hide.png',link:'','type':'img'},
			{x:490,y:30,'img':'/home/image2/2_1_hide_strong.png',link:'','type':'img'},
			{x:550,y:150,'img':'/home/image2/2_2_hide_strong.png',link:'','type':'img'},
			{x:720,y:30,'img':'/home/image2/2_3_hide_strong.png',link:'','type':'img'},
			{x:920,y:90,'img':'/home/image2/2_4_hide_strong.png',link:'','type':'img'},
			{x:1200,y:250,'img':'/home/image2/3_1_hide_strong.png',link:'','type':'img'},
			{x:1100,y:570,'img':'/home/image2/3_1_hide_strong.png',link:'','type':'img'},
			//{x:80,y:30,'img':'/home/image2/btn_login.png','type':'img'},
			//{x:320,y:30,'img':'/home/image2/btn_reg.png','type':'img'},
			{x:25,y:60,ywidth:100,yheigth:100,'img':'/home/image2/imgHead1.png',link:'','type':'img'},
			{x:225,y:10,'img':'/home/image2/userinfo_exit2.png',link:'','type':'img'},
			{x:0,y:570,'img':'/home/image2/btn_shared_result.png',link:'','type':'img'},
			{x:1450,y:180,'img':'/home/image2/myFriendBtn.png',link:'','type':'img'},
			{x:1490,y:350,'img':'/home/image2/btn_yuezhan.png',link:'','type':'img'},
			{x:1490,y:470,'img':'/home/image2/btn_continue_study_new.png',link:'','type':'img'},
			{x:1490,y:570,'img':'/home/image2/btn_records_.png',link:'','type':'img'},
			/*{x:320,y:30,'info':{
			  touxiang:'/home/image2/',

			},'type':'user'},
			*/
		//];				
var budong={
	userinfo:{
		name:'小果果',
	}
};
var backgroundimg="/home/image2/unlogined1.jpg";
var usernamebackground="/home/image2/userinfo_bg2.png";
var font='';
var font1='';
var is_login=false;
//var weizhi=[{x:320,y:590,'img':'image2/1_1.png'}];
var newObject;
var img=new Image();
var stuts={is_all:true,is_icon:false,select_icon:{},xiatian:{},is_zhix_all:true,prev_icon:'wu'};
var is_zhi=true;
var zhiqian={x:0,y:0};
var gudiongzaiyan=[];
var moveres={};
//初始化
var resou=[];
var loading=0;
var backgroundimg;
function chushi(){
	let imgmian=new Image();
		imgmian.src=backgroundimg;
		imgmian.onload=function(info)
		{
			backgroundimg=imgmian;
			schua();
		}
}
$.post(weburl,{},function(data){
	weizhi=data.weizhi;
	is_login=data.is_login=='1'?true:false;
	userinfo=data.userinfo;
	font=data.font;
	font1=data.font1;
	chushi()
	setTimeout(()=>{
		c.style.background='#fff';
		$("#cocosLoading").css({display:'none'})
	},1000);

})
	function goudingzai(newObject,cb){
		//console.log(newObject)
		//用户信息
		if(is_login){
		let gimg=new Image();
			gimg.src=usernamebackground;
			gimg.onload=function(){
				let sx=20;
				let sy=50
				let bimgw=gimg.width;
				let bimgh=gimg.height;
				let x=(sx/newObject.bi)
				let y=(sy/newObject.bi)

				let newh=(bimgh)/(newObject.bi);
				let  neww=(bimgw)/(newObject.bi)
				gudiongzaiyan.push({
					img:gimg,
					ww:0,
					wh:0,
					cc:bimgw,
					cw:bimgh,
					tqx:x,
					tqy:y,
					neww:neww,
					newh:newh,
					isfont:true,
					font:font,
					font1:font1,
					fontx:parseInt(140/(newObject.bi)),
					fonty:parseInt(105/(newObject.bi)),
					fontsize:parseInt(22/(newObject.bi)),
					fontx1:parseInt(140/(newObject.bi)),
					fonty1:parseInt(132/(newObject.bi)),
				})
			
				typeof cb=='function' &&cb();
				//cxt.drawImage(gimg,0,0,bimgw,bimgh,x,y,neww,newh);	
				//cxt.save();
			}
		}else{
			typeof cb=='function' &&cb();
		}
	}

	function gouding(newObject){
		let info;
		for(let k in  gudiongzaiyan){
			    info=gudiongzaiyan[k];
				cxt.drawImage(info.img,info.ww,info.wh,info.cc,info.cw,info.tqx,info.tqy,info.neww,info.newh);
				if(info.isfont){
					cxt.font=info.fontsize+"px microsoft yahei";
					cxt.fillStyle = "rgba(255,237,182,1)";
					cxt.fillText(info.font,info.fontx,info.fonty);
					if(info.font1){
						cxt.fillText(info.font1,info.fontx1,info.fonty1);
					}
					//ctx.fillText(text[1],position[0][len+1], position[1][len+1]);
				}	
				//cxt.save();
			}
	}
function schua(){
	//在主图
  //for(let z in weizhi){
	//console.log(weizhi)
	if(weizhi[loading].type=='img'){
		let imgson=new Image();
		imgson.src=weizhi[loading].img;
		imgson.onload=function(info)
		{
			resou[loading]=imgson;
			if(loading+1<weizhi.length){
				loading+=1;
				schua();
			}else{
				main();
			}
		}
	}
 //}
}
function bucheng(){
	if(!is_login){
		//补充登录按键
	}
}
 var  restart=function(s){
				//img.src="/home/image2/unlogined1.jpg";
				//var img=document.getElementById("background-img");
				//img.onload = function(info)
			//	{
				    let img=backgroundimg;
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
					gouding();
					if(s+1<weizhi.length){
						puimg(s,newObject)
					}else{
						is_zhi=true;
					}
			//}
		}
function restart_puimg_voer(s,newObject,puinfo){
			let img=backgroundimg;
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
			gouding();
			puimg_voer(s,newObject,puinfo)
	//}
}
function puimg_voer(s,newObject,puinfo){
	 // img.src=weizhi[s].img;
	//	img.onload = function(info)
	//	{
		    let img=resou[s];
			let bimgw=img.width;
			let bimgh=img.height;
			  if(puinfo[s]){
					let x=(weizhi[s].x/(newObject.bi+0.03))
					let y=(weizhi[s].y/(newObject.bi+0.03))
					//let bimgw=img.width;
					//let bimgh=img.height;
					let newh=(weizhi[s].yheigth?weizhi[s].yheigth:bimgh)/(newObject.bi-0.1);
					let  neww=(weizhi[s].ywidth?weizhi[s].ywidth:bimgw)/(newObject.bi-0.1)
					cxt.drawImage(img,0,0,bimgw,bimgh,x,y,neww,newh);
				}else{
					let x=(weizhi[s].x/newObject.bi)
					let y=(weizhi[s].y/newObject.bi)
					//console.log(x,y)
					let newh=(weizhi[s].yheigth?weizhi[s].yheigth:bimgh)/(newObject.bi);
					let  neww=(weizhi[s].ywidth?weizhi[s].ywidth:bimgw)/(newObject.bi);
					cxt.drawImage(img,0,0,bimgw,bimgh,x,y,neww,newh);	
				}
				//cxt.save();
				if(s+1<weizhi.length){
					puimg_voer(s+1,newObject,puinfo)
				}else{
					is_zhi=true;
			  }
		//}
}
var fish=function (newObject){
		cxt.canvas.onclick= function(e){  
			let p=getEventPosition(e);
			xuanputuclick(newObject,p);
		}
	cxt.canvas.onmousemove= function(e){ 
		let p=getEventPosition(e);
		//console.log(res)
		//console.log(stuts.xiatian)
		//console.log(Math.abs(zhiqian.x-p.x),Math.abs(zhiqian.y-p.y))
		if(is_zhi){
			 zhiqian={x:p.x,y:p.y};
			is_zhi=false;
			let i=0;
			stuts.is_all=true;
			let resinfo=xuanputu(i,newObject,p)
			res=resinfo[0];
			moveres=res;
			//根据 res铺图
				//console.log(stuts.is_all,stuts.is_zhix_all)
			if(stuts.is_all&&!stuts.is_zhix_all){
					stuts.is_zhix_all=true;
					stuts.prev_icon='wu';
					//console.log('asd')
					let s=0;
					cxt.clearRect(0,0,newObject.widht,newObject.height);
					restart(s)
					//	requestAnimationFrame(restart);
			}else if(!stuts.is_all&&stuts.prev_icon!=resinfo[2]){
				stuts.prev_icon=resinfo[2];
				stuts.is_zhix_all=false;
				let s=0;
				cxt.clearRect(0,0,newObject.widht,newObject.height);
				restart_puimg_voer(s,newObject,res)
			}else{
				is_zhi=true;
			}
		}

	}
}

function xuanputuclick(newObject,p){
	let jieg={};
	let xiatian={};
	let icon='wu';
	for(let i in  weizhi){
		newx=(weizhi[i].x/newObject.bi);
		newy=(weizhi[i].y/newObject.bi);
		let img=resou[i];
		let bimgw=img.width;
		let bimgh=img.height;
		//console.log(newObject,newx,newy,p)
	    condition=(newx<p.x&&newx+(bimgw/newObject.bi)>p.x&&newy<p.y&&newy+(bimgh/newObject.bi)>p.y);
		if(condition){
		   if(weizhi[i].link&&(weizhi[i].link.split(':').length>2)){
			var arr=weizhi[i].link.split(':');
			if(arr[0]=='click'||arr[1]=='ajax'){
				$.post(arr[2],{},function(data){
					if(data.code=='1'){
						let s=0;
						cxt.clearRect(0,0,newObject.widht,newObject.height);
						location.reload()
						weizhi=data.weizhi;
						is_login=0;
						restart(s);
						alert(data.msg);
					}else{
						alert(data.msg)
					}
				},'json')
			}
		   }else if(weizhi[i].link){
				location.href=weizhi[i].link;
			}else if(weizhi[i].tanka){
			  //$('')
			}
		}
	}
	return [jieg,xiatian,icon];
}
function xuanputu(i,newObject,p){
	let jieg={};
	let xiatian={};
	let icon='wu';
	for(let i in  weizhi){
		newx=(weizhi[i].x/newObject.bi);
		newy=(weizhi[i].y/newObject.bi);
		let img=resou[i];
		let bimgw=img.width;
		let bimgh=img.height;
		//console.log(newObject,newx,newy,p)
	    condition=(newx<p.x&&newx+(bimgw/newObject.bi)>p.x&&newy<p.y&&newy+(bimgh/newObject.bi)>p.y);
		//condition=(newx<p.x&&newx+(150/newObject.bi)>p.x&&newy<p.y&&newy+(165/newObject.bi)>p.y);
		if(condition&&stuts.is_all){
			jieg[i]=true;
			icon=i;
			xiatian[i]=[newx,p.x,newx+(bimgw/newObject.bi),p.x,newy,p.y,newy+(bimgh/newObject.bi),p.y];
			stuts.is_all=false;
		}else{
			xiatian[i]=[newx,p.x,newx+(bimgw/newObject.bi),p.x,newy,p.y,newy+(bimgh/newObject.bi),p.y]
			jieg[i]=false;
		}
	}
	return [jieg,xiatian,icon];
}

function xuanputu2(i,newObject,p){
	newx=(weizhi[i].x/newObject.bi);
	newy=(weizhi[i].y/newObject.bi);
	//console.log(newObject,newx,newy,p)
	condition=(newx<p.x&&newx+(150/newObject.bi)>p.x&&newy<p.y&&newy+(135/newObject.bi)>p.y);
	//console.log(newx,newy,weizhi[i].y,p,condition)
	//console.log(condition&&stuts.is_all)
//	console.log(!condition&&!stuts.is_all,condition,stuts.is_all)
	//console.log(newx,newy,weizhi[i].y,p,condition,i)
	if(condition&&stuts.is_all){
		img.src=weizhi[i].img;	
		img.onload = function(info)
		{
			stuts.is_all=false;
			stuts.is_icon=true;
			let x=(weizhi[i].x/(newObject.bi+0.1))
			let y=(weizhi[i].y/(newObject.bi+0.1))
			let bimgw=img.width;
			let bimgh=img.height;
		  let newh=bimgh/(newObject.bi-0.4);
			let  neww=bimgw/(newObject.bi-0.4)
			cxt.drawImage(img,0,0,bimgw,bimgh,x,y,neww,newh);
			//console.log(i+1,weizhi.length)
			if(i+1<weizhi.length){
				xuanputu(i+1,newObject,p)
			}else{
				is_zhi=true;
			}
		}
		//console.log('asd')
		//jiazimg(cxt,weizhi[i].img)
	}else if(!condition&&!stuts.is_all){
		 //  console.log(stuts.is_all)
			stuts.is_all=true;
			stuts.is_icon=false;
			//console.log(condition,newy,p.y,newy+(135/newObject.bi),p.y,newy<p.y&&newy+(135/newObject.bi)>p.y)
			huan(function(){
				if(i+1<weizhi.length){
					xuanputu(i+1,newObject,p)
				}else{
					is_zhi=true;
				}
			});
	}else{
		if(i+1<weizhi.length){
			xuanputu(i+1,newObject,p)
		}else{
			is_zhi=true;
		}
	}
}

function puimg(s,newObject){
         	let img=resou[s];
			let bimgw=img.width;
			let bimgh=img.height;
			let x=(weizhi[s].x/newObject.bi)
			let y=(weizhi[s].y/newObject.bi)
			//console.log(x,y)
			let newh=(weizhi[s].yheigth?weizhi[s].yheigth:bimgh)/(newObject.bi);
			let  neww=(weizhi[s].ywidth?weizhi[s].ywidth:bimgw)/(newObject.bi)
			
				cxt.drawImage(img,0,0,bimgw,bimgh,x,y,neww,newh);	
				//cxt.save();
				if(s+1<weizhi.length){
					puimg(s+1,newObject)
				}else{
					is_zhi=true;
			    }
		//}
}
//2.6 max 1250;
function budong(){
	
}
function huan(cb){
    let img=backgroundimg;
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
	   var s=0;
	   goudingzai(newObject,function(){
		gouding();
		puimg(s,newObject)
	   });
	 // gouding(newObject);
	   
		/*cxt.canvas.onmousemove= function(e){  
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
						mian();
				}
			}
		}*/
		typeof cb=='function' &&cb();
	//	console.log( typeof cb)
		//if(!cb || typeof cb!='function' ){
			fish(newObject);
			//budong();
		//}
	//}
}

var w = window;
	requestAnimationFrame = w.requestAnimationFrame || w.webkitRequestAnimationFrame || w.msRequestAnimationFrame || w.mozRequestAnimationFrame;
var then = Date.now();  
var main = function () {  
	huan();
 	//requestAnimationFrame(huan);
}

	

	
	setTimeout(()=>{
		//console.log('')
	//	c.style.background='#fff';
		//$("#cocosLoading").css({display:'none'})
	//	schua();
	},1000);
	
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

