var canvas, ctx; 
var lista=["a","b","d", "8", "M"];
var intervalo;
var rx;
function inicio () {
	ctx = document.getElementById("canvas").getContext('2d');
	var ancho = 100 + (lista.length * (-8));
	rx=intervalo=0;

	ctx.clearRect(0,0,700,350);

	agregarListener();

	crearCabeza(ancho, 0, 0);
	
	crearLista(ancho);
}

function crearCabeza (ancho, x, y) {
	ctx.clearRect(0,0,ancho-14, ancho+50);
	//ctx.clearRect(x,y,ancho-6, ancho+45);

	ctx.fillStyle = "rgb(200,0,0)";
    ctx.fillRect (x+1, y+3, 20, 20);

    ctx.fillStyle = "rgba(0, 0, 200, 0.5)";
    ctx.fillRect (x+5, y+5, 20, 20);

    if(lista.length>0){
    	//crear apuntador a primer elemento
    	var puntos=[
    		new Punto(x+15,y+15), 
    		new Punto(x+15, 50 + y+(ancho*0.5)),
    		new Punto(x+ancho-15, 50 + y+(ancho*0.5))
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
	var ancho = 100 + (lista.length * (-8));
	var alto = ancho;

	ctx.clearRect(x - 6, y - 6, 2*ancho, alto + 12);
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

function f_crearNodo () {
	var x, y, ancho;
	x = 320; y = 180; 
	ancho = 100 + (lista.length * (-8));
	crearNodo(x, y, caracterAleat());

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
	var ancho = 100 + (lista.length * (-8));
	if(rx<lista.length){
		
		var hueco = ancho;

		var dx = (ancho*rx) + (hueco*(rx+1)) + (ancho*0.3);
		ctx.clearRect(0, 0, 700, 30);
		
		ctx.fillStyle = "rgb(200,0,0)";
	    ctx.fillRect (dx-5, 10, 20, 20);

	    ctx.fillStyle = "rgba(0, 0, 200, 0.5)";
	    ctx.fillRect (dx, 15, 20, 20);
		rx++;
	}else{
		clearInterval(intervalo);
		alert("Se ha recorrido toda la lista");
		rx=0;
		ctx.clearRect(0, 0, 700, 36);
		crearCabeza(ancho, 0,0);
	}
	
}

function f_insertarInicio () {
	var x, y, ancho;
	var dato =caracterAleat();
	ancho = 100 + (lista.length * (-8));
	x = ancho; y = 180;

	setTimeout(function(){
		inicio();
	},3000);

	crearNodo(x, y, dato);
	setTimeout(function(){
		crearCabeza(ancho, 0, 180-ancho);
	},1000); 
    
	setTimeout(function(){
	    var puntos = [
	    		new Punto(x+(ancho*0.9), y + (ancho/2)), 
	    		new Punto(x+(ancho*0.9), 117),
	    		new Punto(15, 117),
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

	    lista.splice(0, 0, dato );
	},2000); 
}

function f_insertarDespues () {
	var dato = prompt("Ingresa un dato de la lista",
		lista[Math.floor(Math.random()*(lista.length - 0))]);
	intervalo = setInterval(function () {
		insertarDespues(dato);		
	}, 500);
}

function insertarDespues (dato) {
	var ancho = 100 + (lista.length * (-8));
	if(rx<lista.length){
		
		var hueco = ancho;

		var dx = (ancho*rx) + (hueco*(rx+1)) + (ancho*0.3);
		ctx.clearRect(0, 0, 700, 30);
		
		ctx.fillStyle = "rgb(200,0,0)";
	    ctx.fillRect (dx-5, 10, 20, 20);

	    ctx.fillStyle = "rgba(0, 0, 200, 0.5)";
	    ctx.fillRect (dx, 15, 20, 20);

	    if(lista[rx]==dato){
	    	var x, y;
	    	x=(ancho*rx) + (hueco*(rx+1));
	    	y=50;
	    	ctx.fillStyle="#14cedb";
	    	ctx.clearRect(x-5, y-5, (2*ancho), 350);
	    	crearNodo(x,y, dato);

	    	dato=caracterAleat();
	    	setTimeout(function(){
	    		crearNodo(x,180, dato);
	    		setTimeout(function(){
					var puntos = [
			    		new Punto( x + (ancho*0.9), y + (ancho/2)), 
			    		new Punto( x + (ancho*0.9), y + ancho + 35 ),
			    		new Punto( x - (ancho*0.5), y + ancho + 35 ),
			    		new Punto( x - (ancho*0.5), 180 + (ancho/2) ),
			    		new Punto( x - (ancho*0.1), 180 + (ancho/2) )
					];
					var linea=new Linea(puntos);
					linea.estilo="#000";
					
				    linea.trazarFlecha();
				    setTimeout(function(){
					    y=180;
					    var puntos = [
				    		new Punto( x + (ancho*0.9), y + (ancho/2)), 
				    		new Punto( x + (ancho*1.5), y + (ancho/2)),
				    		new Punto( x + (ancho*1.5), 50 + (ancho/2)),
				    		new Punto( x + (ancho*1.9), 50 + (ancho/2))
				    		/*
				    		new Punto( x - (ancho*0.5), y + ancho + 35 ),
				    		new Punto( x - (ancho*0.5), 180 + (ancho/2) ),
				    		new Punto( x - (ancho*0.1), 180 + (ancho/2) )*/
						];
					    linea.puntos=puntos;
					    lista.splice(rx, 0, dato );
					    if (rx<lista.length - 1) {
							linea.estilo="#000";
						} else{
							linea.estilo="#d00";
						};
					    linea.trazarFlecha();
				    	rx=lista.length;
					},2500);

				},3000);


			},500);

		    
			clearInterval(intervalo);
			setTimeout(function(){
				inicio();
			},7000);
	    }
		rx++;
	}else{
		clearInterval(intervalo);
		alert("NO se ha encontrado el dato en la lista");
		inicio();
	}
}
function f_insertarFinal () {
	intervalo = setInterval(function () {
		insertarDespues(lista[lista.length-1]);		
	}, 500);
}

function agregarListener () {
	var boton=document.getElementById("crear-nodo");
	boton.addEventListener("click", f_crearNodo);
	boton=document.getElementById("recorrer");
	boton.addEventListener("click", f_recorrerLista);
	boton=document.getElementById("insertar-inicio");
	boton.addEventListener("click", f_insertarInicio);
	boton=document.getElementById("insertar-despues");
	boton.addEventListener("click", f_insertarDespues);
	boton=document.getElementById("insertar-final");
	boton.addEventListener("click", f_insertarFinal);
}

function caracterAleat () {
	
	
	var a=Math.random();
	var n;
	if(a>=0 && a<0.34){
		//Numeros 48-57
		n=Math.floor(Math.random()*(58- 48) + 48);
	}else if (a>=0.34 && a<=0.66) {
		//Mayus 65-90
		n=Math.floor(Math.random()*(91- 65) + 65);
	} else{
		//Minus 97-122
		n=Math.floor(Math.random()*(123- 97) + 97);
	};

	return String.fromCharCode(n); 
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
	this.radio = 0.2*(lista.length * (32 - (4*lista.length)));
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

