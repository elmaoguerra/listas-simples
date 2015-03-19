'use strict';
var table = [
	"H", "He","Li","Be","B", "C", "N", "O", "F", "Ne","Na",
	"H", "He","Li","Be","B", "C", "N", "O", "F", "Ne","Na",
	"H", "He","Li","Be","B", "C", "N", "O", "F", "Ne","Na",
	"H", "He","Li","Be","B", "C", "N", "O", "F", "Ne","Na",
	"H", "He","Li","Be","B", "C", "N", "O", "F", "Ne","Na",
	"H", "He","Li","Be","B", "C", "N", "O", "F", "Ne","Na"
];

var camera, scene, renderer;
var scene2, renderer2;
var controls;

var objects = [];
var targets = { helix: [], grid: [] };

init();
animate();

function init() {

	camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight, 1, 10000 );
	//camera.position.y = 500;
	camera.position.z = 3000;

	renderer2 = new THREE.WebGLRenderer();
	renderer2.setSize( window.innerWidth, window.innerHeight );
	renderer2.domElement.style.position = 'absolute';
	document.getElementById( 'container' ).appendChild( renderer2.domElement );

	renderer = new THREE.CSS3DRenderer();
	renderer.setSize( window.innerWidth, window.innerHeight );
	renderer.domElement.style.position = 'absolute';
	document.getElementById( 'container' ).appendChild( renderer.domElement );
	//

	controls = new THREE.TrackballControls( camera, renderer.domElement );
	controls.rotateSpeed = 0.5;
	controls.minDistance = 500;
	controls.maxDistance = 6000;
	controls.addEventListener( 'change', render );

	addListeners();

	crearElementos();

}

function transform( targets, duration ) {

	TWEEN.removeAll();
	scene2  = new THREE.Scene();

	var axisHelper = new THREE.AxisHelper( 500 );
	scene2.add( axisHelper );

	for ( var i = 0; i < objects.length; i ++ ) {

		var object = objects[ i ];
		var target = targets[ i ];
		
		new TWEEN.Tween( object.position )
			.to( { x: target.position.x, y: target.position.y, z: target.position.z }, Math.random() * duration + duration )
			.easing( TWEEN.Easing.Exponential.InOut )
			.start();

		new TWEEN.Tween( object.rotation )
			.to( { x: target.rotation.x, y: target.rotation.y, z: target.rotation.z }, Math.random() * duration + duration )
			.easing( TWEEN.Easing.Exponential.InOut )
			.start();
	};

	new TWEEN.Tween( this )
		.to( {}, duration * 1.75 )
		.onUpdate( render )
		.onComplete( function () {
			for ( var i = 0; i < objects.length; i ++ ) {

				if(i < targets.length - 1){
					var next = targets[i + 1];
				}else{
					var next = new THREE.Object3D();
				}

				var dir = new THREE.Vector3(
					next.position.x - targets[ i ].position.x, 
					next.position.y - targets[ i ].position.y, 
					next.position.z - targets[ i ].position.z 
				);
				var origin = new THREE.Vector3(
					targets[ i ].position.x, 
					targets[ i ].position.y,
					targets[ i ].position.z 
				);

				var length = dir.length();
				var hex = 0x009999;

				var arrowHelper = new THREE.ArrowHelper( dir.normalize(), origin, length, hex, 100 );
				//console.log(arrowHelper);

				scene2.add( arrowHelper );
			};
			render();
		})
		.start();

}

function crearElementos () {
	// table
	scene = new THREE.Scene();
	for ( var i = 0; i < table.length; i ++ ) {
		crearElemento(i , table[i]);
	};

	actualizarModelo();

}

function crearElemento (i, dato) {
	var element = document.createElement( 'div' );
		element.className = 'element';
		//element.style.backgroundColor = 'rgba(0,127,127,' + ( Math.random() * 0.5 + 0.25 ) + ')';

		var number = document.createElement( 'div' );
		number.className = 'number';
		number.textContent = i;//Indexado a 0
		element.appendChild( number );

		var symbol = document.createElement( 'div' );
		symbol.className = 'symbol';
		symbol.textContent = dato;
		element.appendChild( symbol );

		var object = new THREE.CSS3DObject( element );
		object.position.x = Math.random() * 4000 - 2000;
		object.position.y = Math.random() * 4000 - 2000;
		object.position.z = Math.random() * 4000 - 2000;
		scene.add( object );

		
		objects.splice(i, 0, object );
}

function actualizarModelo () {
	//Helix
	targets.helix=[];
	var vector = new THREE.Vector3();

	for ( var i = 0, l = objects.length; i < l; i ++ ) {

		var phi = i * 0.3 + Math.PI;

		var object = new THREE.Object3D();

		object.position.x = -900 * Math.sin( phi );
		object.position.y = - ( i * 20 ) + 700;
		object.position.z = -900 * Math.cos( phi );

		vector.x = object.position.x * 2;
		vector.y = object.position.y;
		vector.z = object.position.z * 2;

		object.lookAt( vector );
		targets.helix.push( object );
		// console.log(targets.helix.length);
		// console.log('i= '+ i);
		// scene.children[i].element.children[1].textContent = i;
	};

	// grid
	targets.grid=[];
	for ( var i = 0; i < objects.length; i ++ ) {

		var object = new THREE.Object3D();

		object.position.x = ( ( i % 5 ) * 400 ) - 800;
		object.position.y = ( - ( Math.floor( i / 5 ) % 5 ) * 400 ) + 800;
		object.position.z = (( Math.floor( i / 25 ) ) * - 230) + 500;

		targets.grid.push( object );
		//scene.children[i].element.children[0].textContent = i;
	};
	//var aux = 'helix';
	transform( targets.helix, 2000 );
	ocultarBoton('helix');

}

function ocultarBoton (boton) {
	document.getElementById( 'helix' ).hidden=false;
	document.getElementById( 'grid' ).hidden=false;
	
	document.getElementById( boton ).hidden=true;
}

function onWindowResize() {

	camera.aspect = window.innerWidth / window.innerHeight;
	camera.updateProjectionMatrix();

	renderer2.setSize( window.innerWidth, window.innerHeight );
	renderer.setSize( window.innerWidth, window.innerHeight );

	render();

}

function animate() {

	requestAnimationFrame( animate );

	TWEEN.update();

	controls.update();

}

function render() {
	renderer2.render( scene2, camera );
	renderer.render( scene, camera );
}

function addListeners (argument) {
	var button = document.getElementById( 'helix' );
	button.addEventListener( 'click', function ( event ) {

		transform( targets.helix, 2000 );
		ocultarBoton('helix');

	}, false );

	var button = document.getElementById( 'grid' );
	button.addEventListener( 'click', function ( event ) {

		transform( targets.grid, 2000 );
		ocultarBoton('grid');

	}, false );

	
	window.addEventListener( 'resize', onWindowResize, false );

	var button = document.getElementById( 'f_push' );
	button.addEventListener( 'click', function ( event ) {

		crearElemento(objects.length, "Mao");
		table.splice(objects.length,0,"Mao");
		console.log(table.concat());
		actualizarModelo();
		animate();
		
	}, false );

	var button = document.getElementById( 'f_splice' );
	button.addEventListener( 'click', function ( event ) {

		var pos = prompt("Pos", "2");
		if(pos != null && pos > 0  && pos <= objects.length){
			crearElemento(pos, "Mau");
			table.splice(pos,0,"Mau");
			console.log(table.concat());
			actualizarModelo();
			animate();
		}
		
	}, false );

	var button = document.getElementById( 'f_concat' );
	button.addEventListener( 'click', function ( event ) {

		console.log(table.concat());
		
	}, false );
}
