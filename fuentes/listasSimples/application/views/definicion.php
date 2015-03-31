<main id="marco">
	<h2>Definición</h2>
	<p>	La forma más simple de estructura dinámica es la lista simplemente enlazada. 
		En esta forma los nodos se organizan de modo que cada uno apunta 
		al siguiente, y el último no apunta a nada, es decir, 
		el puntero del nodo siguiente vale NULL.
	</p>
	<p>	En las listas simples, tambien conocidas como listas abiertas, 
		existe un nodo especial: el primero. 
		Normalmente diremos que nuestra lista es un puntero a ese 
		primer nodo y llamaremos a ese nodo la cabeza de la lista. 
		Eso es porque mediante ese único puntero podemos acceder a 
		toda la lista.
	</p>
	<p>	Cuando el puntero que usamos para acceder a la lista vale NULL, 
		diremos que la lista está vacía.</p>
	<p>El nodo típico para construir listas tiene esta forma:</p>
	<div class="inline-block-top codigo">
		<pre class="prettyprint lang-c">
struct Nodo {
	char dato;
	struct Nodo *ptrSiguiente;
};</pre>
	</div>
	<p>En el ejemplo, cada elemento de la lista sólo contiene un dato 
		de tipo char (carácter), pero en la práctica no hay límite en cuanto 
		a la complejidad de los datos a almacenar.
	</p>
	<p class="referencia">
		Tomado de Conclase.net 
		<a href="http://www.conclase.net/c/edd/?cap=001" target="_blank">
			http://www.conclase.net/c/edd/?cap=001
		</a>
	</p>
	<h3>Estructuras Autorreferenciadas</h3>
	<p>Una estructura <em>autorrefenciada</em> contiene un miembo apuntador, 
	el cual apunta hacia una estructura del mismo tipo. Una estructura del 
	tipo <var><strong>struct Nodo</strong></var> tiene dos miembros; el miembro carácter 
	dato y el miembro apuntador <var><strong>prtSiguiente</strong></var>. El miembro
	<var><strong>prtSiguiente</strong></var> apunta hacia la estructura de tipo 
	<var><strong>struct Nodo</strong></var>; una estructura del mismo tipo que la que 
	estamos declarando aquí, de ahí el termino "estructura autorreferenciada".
	</p>
	<p>El miembro <var><strong>prtSiguiente</strong></var></var> se conoce como liga, 
		es decir, este miembro puede utilizarse para "unir" una estructura del 
		tipo <var><strong>struct Nodo</strong></var> con otra estructura del mismo tipo.
	</p>
	<h3>Listas Enlazadas</h3>
	<p>Una <em>lista enlazada</em> es una colección lineal de estructuras autorreferenciadas, 
		llamadas <em>nodos</em>, conectadas por medio de <em>ligas</em> apuntador. Las listas 
		enlazadas son dinámicas, por lo que la longitud de una lista puede aumentar o disminuir 
		conforme sea necesario, a diferencia de los arreglos, que su tamaño no pueden alterarse 
		una vez que se asignó la memoria.
	</p>
	<p class="nota">Se accede a una lista enlazada a tráves de un apuntador al primer nodo de la lista.</p>
	<p class="nota">Se accede a los nodos subsiguientes a través del miembro apuntador almacenado en cada nodo.</p>
	<p class="nota">Por convención, el apuntador del ultimo nodo de la lista se establece en <var><strong>NULL</strong></var> para marcar el final de la lista.</p>
	<p>Los nodos de una lista enlazada por lo general no se almacenan contiguamente en memoria, sin embargo,
		de manera lógica, los nodos de una lista enlazada aparentan estar contiguos. A continuación, 
		se muestra una lista enlazada con diversos nodos.
	</p>
	<p class="referencia">
		Tomado de DEITEL, Paul; DEITEL Harvey. Como Programar en C/C++. 4ta.Ed., p.423-426.
	</p>
	<section class="sec-canvas inline-block-top">
		<p>Dato(s) en la lista: <label class="lista_inicial" id="lista" >a,5,J,o,9</label></p>
		<canvas id="canvas" class="canvas" width="700" height="150"></canvas>
		<script type="text/javascript" src="<?php echo base_url();?>js/animacion/animacion.js"></script>
	</section>
	<p>En una lista simple, se pueden realizar diversas <a href="<?php echo base_url();?>operaciones">operaciones</a> como insertar, modificar o eliminar nodos.</p>
	<h3><a href="<?php echo base_url();?>operaciones">Operaciones en una lista simple</a></h3>
</main>