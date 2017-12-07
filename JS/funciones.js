function navegar(direccion, id)
{
	window.location.assign(direccion);
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

function commentPost()
{
	window.location.assign('post.html');
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