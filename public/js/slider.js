var slide = setInterval('slider(1)',8000);
window.addEventListener('load',slide,false);
window.addEventListener('load',function(){
	var items = document.querySelectorAll('#slide > li').length;
	var elemento = document.getElementById('slide');
	elemento.style.width = (items*(100))+'%';
},false);

/**
 * [slider description]
 * considera los elementos li dentro de ul, considerando que cada li es un slide.
 * @param  {[Integer]} way [0]
 * 0 : indica el sentido de atras en el slider
 * @param  {[Integer]} way [1]
 * 1 : indica el sentido de siguiente en el slider
 */

function slider(way){
	var items = document.querySelectorAll('#slide > li').length;
	var elemento = document.getElementById('slide');
	var margin = elemento.style.marginLeft;
	var intMargin = parseInt((margin == '') ? 0 : margin);
	var limitMargin = (items*(-100))+100;
	elemento.style.width = (items*(100))+'%';

	if(way === 1){
		if(intMargin <= 0 && intMargin > limitMargin){
			intMargin -=100;
			margin = intMargin+'%';
			elemento.style = 'width:'+(items*(100))+'%'+';margin-left:'+margin;
		} else{
			elemento.style = 'width:'+(items*(100))+'%'+';margin-left:0%';
		}
	}
	if(way === 0){
		if(intMargin >= 0 && intMargin < limitMargin){
			intMargin +=100;
			margin = intMargin+'%';
			elemento.style = 'width:'+(items*(100))+'%'+';margin-left:'+margin;
		} else{
			if(intMargin === 0){
				elemento.style = 'width:'+(items*(100))+'%'+';margin-left:'+limitMargin+'%';
			} else {
				elemento.style = 'width:'+(items*(100))+'%'+';margin-left:0%';
			}
		}
	}
	clearInterval(slide);
	slide = setInterval('slider(1)',8000);
}
