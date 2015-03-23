var canvas, ctx; 
var lista=["a","b","d", "8", "M"];
var intervalo=0;
var rx=0;
function inicio () {
	canvas=document.getElementById("canvas");
	ctx = canvas.getContext('2d');
	var ancho = lista.length * 12;
	agregarListener();

	crearCabeza(ancho, 0, 0);
	
	crearLista(ancho);
}

function crearCabeza (ancho, x, y) {

	ctx.clearRect(0,0,ancho-14, ancho+25);
	ctx.clearRect(x,y,ancho-15, ancho+17);

	ctx.fillStyle = "rgb(200,0,0)";
    ctx.fillRect (x+1, y+3, 20, 20);

    ctx.fillStyle = "rgba(0, 0, 200, 0.5)";
    ctx.fillRect (x+5, y+5, 20, 20);

    if(lista.length>0){
    	//crear apuntador a primer elemento
    	var puntos=[
    		new Punto(x+15,y+15), 
    		new Punto(x+15, y+ancho+15),
    		new Punto(x+ancho-15, y+ancho+15)
    	];
    	var linea=new Linea(puntos);
    	linea.estilo="#00f";
	    linea.trazarFlecha();
    }else{
    	//crear apuntador a NULL
    }
    
}

function crearLista (ancho) {
	
	for (var i = 0; i < lista.length; i++) {
		dibujarNodo(ancho, lista[i], i);
	};
}

function dibujarNodo (ancho, dato, i) {

	var alto, hueco;
	alto=hueco=ancho;
	var dx=(ancho*i)+(hueco*(i+1));
	var y = 50;

	crearNodo(dx, y, dato);
	var puntos = [
    		new Punto((ancho + dx -5),(alto/2)+y), 
    		new Punto((ancho + dx + hueco - 8), (alto/2)+y)
	];
	var linea=new Linea(puntos);
	if (i<lista.length -1) {
		linea.estilo="#000";
	} else{
		linea.estilo="#d00";
	};
    linea.trazarFlecha();
}

function crearNodo (x, y, dato) {
	var ancho = lista.length * 12;
	var alto = ancho;

	ctx.clearRect(x - 6, y - 6, (x+ancho), (y+alto));
	ctx.shadowBlur = 5;
	ctx.shadowColor = "#0a6d42";
	ctx.fillStyle="#14cedb";
	ctx.fillRect(x, y, ancho, alto);

	ctx.fillStyle="#eee";
	ctx.font = (alto*0.7)+"px Georgia";
	ctx.fillText(dato,x + (alto/20),y+(alto*0.7));

	ctx.shadowBlur = 0;
	ctx.fillStyle="#cedb14 ";
	ctx.fillRect(x+(ancho*0.7), y, ancho*0.3, alto);
}

function agregarListener () {
	var boton=document.getElementById("crear-nodo");
	boton.addEventListener("click", f_crearNodo);
	boton=document.getElementById("recorrer");
	boton.addEventListener("click", f_recorrerLista);
	boton=document.getElementById("insertar-inicio");
	boton.addEventListener("click", f_insertarInicio);
}

function f_crearNodo () {
	var x, y, ancho;
	x = 320; y = 250; 
	ancho = lista.length*12;
	crearNodo(x, y, 'm');

	var puntos = [
    		new Punto(x+(ancho*0.9), y + (ancho/2)), 
    		new Punto(x+(ancho*0.9) + ancho, y + (ancho/2))
	];
	var linea=new Linea(puntos);
	linea.estilo="#d00";
    linea.trazarFlecha();
}

function f_recorrerLista () {
	intervalo = setInterval(recorriendo, 500);
}

function recorriendo() {
	
	if(rx<lista.length){
		var ancho = lista.length * 12;
		var hueco = ancho;

		var dx = (ancho*rx) + (hueco*(rx+1)) + (ancho*0.3);
		ctx.clearRect(0, 0, 700, 30);
		
		ctx.fillStyle = "rgb(200,0,0)";
	    ctx.fillRect (dx-5, 10, 20, 20);

	    ctx.fillStyle = "rgba(0, 0, 200, 0.5)";
	    ctx.fillRect (dx, 15, 20, 20);

		ctx.fillRect(dx, 15, 20, 20);
		rx++;
	}else{
		clearInterval(intervalo);
		alert("Se ha recorrido toda la lista");
		rx=0;
		ctx.clearRect(0, 0, 700, 36);
		crearCabeza(lista.length * 12, 0,0);
	}
	
}

function f_insertarInicio () {
	var x, y, ancho;

	ancho = lista.length*12;
	x = ancho; y = 250; 

	crearLista()


	crearNodo(x, y, 'm');

    crearCabeza(ancho, 0, 250-ancho);

    var puntos = [
    		new Punto(x+(ancho*0.9), y + (ancho/2)), 
    		new Punto(x+(ancho*0.9), 150),
    		new Punto(15, 150),
    		new Punto(15, 1.5*ancho -5),
    		new Punto(ancho - 5 , 1.5*ancho -5)
	];
	var linea=new Linea(puntos);
	if (lista.length>0) {
		linea.estilo="#000";
	} else{
		linea.estilo="#d00";
	};
    linea.trazarFlecha();
}

var Punto=function (x, y) {
	this.x=x;
	this.y=y;
}

var Linea = function (cordenadas) {
	this.estilo = "#000";
	this.anchoLinea = 2;
	this.puntos = cordenadas;
	this.redonda = true;
	this.radio = 0.2*(lista.length*12);
	this.angulo = 30;

	this.trazarFlecha=function () {
		if (this.puntos.length>0) {
			ctx.strokeStyle=this.estilo;
			ctx.lineWidth=this.anchoLinea;
			if (this.redonda) {
				ctx.lineCap="round";
			}

			//trazarLinea
			ctx.beginPath();
			ctx.moveTo(this.puntos[0].x,this.puntos[0].y);
			for (var i = 1; i < this.puntos.length; i++) {
				ctx.lineTo(this.puntos[i].x, this.puntos[i].y);
			};			
			ctx.stroke();
			ctx.closePath();
			//trazar punta de flecha
			//la punta es a la derecha solamente, falta arreglar el plano

			var x = this.puntos[this.puntos.length-1].x;
			var y = this.puntos[this.puntos.length-1].y;
			ctx.beginPath();

			ctx.moveTo(x,y);
			var dx = (this.radio ) * (Math.cos((180-this.angulo)/180*Math.PI));
			var dy = (this.radio ) * (Math.sin((180-this.angulo)/180*Math.PI));
			ctx.lineTo(x + dx, y + dy);
			ctx.moveTo(x,y);
			dx = (this.radio ) * (Math.cos((180+this.angulo)/180*Math.PI));
			dy = (this.radio ) * (Math.sin((180+this.angulo)/180*Math.PI));
			ctx.lineTo(x + dx, y + dy);
			ctx.stroke();
			ctx.closePath();

		} else{};
	}
}

