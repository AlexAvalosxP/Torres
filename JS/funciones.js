function navegar(direccion, id)
{
	window.location.assign(direccion);
}

function verificarLog()
{
	if (!localStorage.getItem('username'))
	{
		window.location.assign('login.html');
	}
}

function login()
{
	u = document.getElementById('u');
	p = document.getElementById('p');

	uVal = u.value;
	pVal = p.value;

	var lgin = new XMLHttpRequest();

	lgin.open("POST", "php/login.php", true);
  	lgin.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  	lgin.send("u=" + uVal + "&p=" + pVal);

  	var xhttp = new XMLHttpRequest();
  	lgin.onreadystatechange = function() 
  	{
    	if (lgin.readyState == 4 && lgin.status == 200) 
    	{
      		check = JSON.parse(lgin.responseText);
      		if (check.pass == 1)
      		{
      			console.log('Acceso');
      			localStorage.setItem('username', uVal);
      			window.location.assign('index.html');
      		}
      		else
      		{
      			console.log('No Acceso');
      			u.style.border = "1px solid red";
      			p.style.border = "1px solid red";
      			u.style.transition = "0.5s all";
      			p.style.transition = "0.5s all";
      	
					setTimeout(function(){
						u.style.marginLeft = "calc(50% - 130px)";
						p.style.marginLeft = "calc(50% - 130px)";
					}, 200);
					u.style.marginLeft = "calc(50% - 100px)";
					p.style.marginLeft = "calc(50% - 100px)";

      		}
    	}
  	};
}

function cargarPosts(){

	verificarLog();

	user = localStorage.getItem('username');
	console.log(user);

	Ajax = new XMLHttpRequest();
	Ajax.open('GET','php/posts.php?idU=' + user);
	Ajax.send();
	Ajax.onreadystatechange = function(){
		if (Ajax.readyState == 4 && Ajax.status == 200){
			post = JSON.parse(Ajax.responseText);
			console.log(post)
		for(i = post.length - 1; i >= 0; i--){
			div = '<div class="Post">' +
			'<div class="info-Post" onclick="navegar(\'profile.php?u=' + post[i].username + '\')">' +
			'<img id="user-img" src="sources/user-default.jpg">' +
			'<h2 id="user-name">' + post[i].nombre + '</h2>' +
			'<h3 id="pub-time">' + post[i].fecha + '</h3>' +
		'</div>' +
		'<div class="img-Post">' +
			'<img id="" src="sources/posts/' + post[i].dibujo + '">' +
		'</div>' +
		'<div class="command-Post">';

			if(post[i].likeBool == 1)
			{
				div = div + '<div class="like" id="' + post[i].id + '" style="background:black"><i class="fa fa-heart-o" aria-hidden="true"></i><h2 id="numlikes' + post[i].id + '">' + post[i].likes + '</h2><h3>¡Me Anima!</h3></div>';
			}
			else
			{
				div = div + '<div class="like" id="' + post[i].id + '" onclick="likePost(this.id)"><i class="fa fa-heart-o" aria-hidden="true"></i><h2 id="numlikes' + post[i].id + '">' + post[i].likes + '</h2><h3>¡Me Anima!</h3></div>';
			}
			div = div + '<div class="comment" id="' + post[i].id + '" onclick="commentPost(this.id)"><i class="fa fa-comment-o" aria-hidden="true"></i><h2 id="numComents">0</h2><h3>Comentar</h3></div>'
		'</div>' +
		'</div>"';
		document.querySelector('section').innerHTML += div;
		}
		}
	}

}

function openMenu()
{
	closeInvitation();
	closeNotification();
	menu = document.querySelector('.desplegable');

	//Funcionalidad
	menu.innerHTML = "<h1 id='titulo'>Menu</h1>";

	menu.classList.remove('oculto');
	setMenu = document.getElementById('menu');
	setMenu.removeAttribute('onclick');
	setMenu.setAttribute('onclick', 'closeMenu()');
}

function closeMenu()
{
	menu = document.querySelector('.desplegable');
	menu.classList.add('oculto');
	setMenu = document.getElementById('menu');
	setMenu.removeAttribute('onclick');
	setMenu.setAttribute('onclick', 'openMenu()');
}


function openInvitation()
{
	closeMenu();
	closeNotification();

	menu = document.querySelector('.desplegable');

	//Funcionalidad
	menu.innerHTML = "<h1 id='titulo'>Invitaciones</h1>";

	menu.classList.remove('oculto');
	setMenu = document.getElementById('invitation');
	setMenu.removeAttribute('onclick');
	setMenu.setAttribute('onclick', 'closeInvitation()');
}

function closeInvitation()
{
	menu = document.querySelector('.desplegable');
	menu.classList.add('oculto');
	setMenu = document.getElementById('invitation');
	setMenu.removeAttribute('onclick');
	setMenu.setAttribute('onclick', 'openInvitation()');
}


function openNotification()
{
	closeInvitation();
	closeMenu();
	menu = document.querySelector('.desplegable');

	//Funcionalidad
	menu.innerHTML = "<h1 id='titulo'>Notificaciones</h1>";

	menu.classList.remove('oculto');
	setMenu = document.getElementById('notification');
	setMenu.removeAttribute('onclick');
	setMenu.setAttribute('onclick', 'closeNotification()');
}

function closeNotification()
{
	menu = document.querySelector('.desplegable');
	menu.classList.add('oculto');
	setMenu = document.getElementById('notification');
	setMenu.removeAttribute('onclick');
	setMenu.setAttribute('onclick', 'openNotification()');
}

function commentPost(id)
{
	window.location.assign('post.html?id=' + id);
}

function likePost(id)
{
	user = localStorage.getItem('username');

	Ajaxlike = new XMLHttpRequest();
	Ajaxlike.open('GET','php/like.php?idPost=' + id + '&idUser=' + user);
	Ajaxlike.send();
	
	Ajaxlike.onreadystatechange = function(){
		if (Ajaxlike.readyState == 4 && Ajaxlike.status == 200){
			likesId = 'numlikes' + id;
			document.getElementById(likesId).innerHTML ++;
			postMod = document.getElementById(id);
			postMod.style.background = 'black';
			postMod.removeAttribute('onclick');
		}
	}
}

function draw()
{
	window.location.assign('draw.html');
}

function passCheck()
{
	nombre = document.getElementById('Nombre').value;
	apellidos = document.getElementById('Apellidos').value;
	username = document.getElementById('Username').value;
	email = document.getElementById('Correo').value;
	pass1 = document.getElementById('Pass1').value;
	pass2 = document.getElementById('Pass2').value;

	if(pass1 == pass2)
	{
		document.getElementById("signupdata").submit();
	}
	else
	{
		document.getElementById('Pass1').style.border = '1px solid red';
		document.getElementById('Pass2').style.border = '1px solid red';
	}
}

function cargarPerfil(id)
{
	Ajax = new XMLHttpRequest();
	Ajax.open('GET','php/postsPerfil.php?idU=' + id);
	Ajax.send();
	Ajax.onreadystatechange = function(){
		if (Ajax.readyState == 4 && Ajax.status == 200){
			post = JSON.parse(Ajax.responseText);
			console.log(post)
		for(i = post.length - 1; i >= 0; i--){
			div = '<div class="Post">' +
			'<div class="info-Post" onclick="navegar(\'profile.php?u=' + post[i].username + '\')">' +
			'<img id="user-img" src="sources/user-default.jpg">' +
			'<h2 id="user-name">' + post[i].nombre + '</h2>' +
			'<h3 id="pub-time">' + post[i].fecha + '</h3>' +
		'</div>' +
		'<div class="img-Post">' +
			'<img id="" src="sources/posts/' + post[i].dibujo + '">' +
		'</div>' +
		'<div class="command-Post">';

			if(post[i].likeBool == 1)
			{
				div = div + '<div class="like" id="' + post[i].id + '" style="background:black"><i class="fa fa-heart-o" aria-hidden="true"></i><h2 id="numlikes' + post[i].id + '">' + post[i].likes + '</h2><h3>¡Me Anima!</h3></div>';
			}
			else
			{
				div = div + '<div class="like" id="' + post[i].id + '" onclick="likePost(this.id)"><i class="fa fa-heart-o" aria-hidden="true"></i><h2 id="numlikes' + post[i].id + '">' + post[i].likes + '</h2><h3>¡Me Anima!</h3></div>';
			}
			div = div + '<div class="comment" id="' + post[i].id + '" onclick="commentPost(this.id)"><i class="fa fa-comment-o" aria-hidden="true"></i><h2 id="numComents">0</h2><h3>Comentar</h3></div>'
		'</div>' +
		'</div>"';
		document.querySelector('section').innerHTML += div;

		document.getElementById('profile-user').innerHTML = post[i].nombreUs;
		document.getElementById('profile-time').innerHTML = "Miembro desde: " + post[i].fechaReg;
		document.getElementById('profile-pub').innerHTML = "Publicaciones: " + post[i].numPosts;
		document.getElementById('profile-followers').innerHTML = "Seguidores: " + post[i].numFoll;
		}
		}
	}	
}