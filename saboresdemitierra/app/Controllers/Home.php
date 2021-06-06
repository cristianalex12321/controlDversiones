<?php namespace App\Controllers;

use App\Models\OrdenesModel;
use App\Models\PedidosModel;
use App\Models\PlatilloModel;
use App\Models\UsuarioModel;

class Home extends BaseController
{
	//modelos
	private $ordenesModel;
	private $pedidosModel;
	private $platilloModel;
	private $usuarioModel;
	private $session=null;

	public function __construct(){
		$this->ordenesModel = model('OrdenesModel');
		$this->pedidosModel = model('PedidosModel');
		$this->platilloModel = model('PlatilloModel');
		$this->usuarioModel = model('UsuarioModel');
		$this->session = \Config\Services::session();
	}

	public function index()
	{	$login = $this->session->get('login');
		$nombre = $this->session->get('nombre');
		$data['nombre']=$nombre;
		$data['titulo']="Sabores de mi tierra";
		if($login == TRUE){
			echo view('templates/headerlog',$data);
			echo view('principal');
			echo view('templates/footer');
		}
		else{
		echo view('templates/headerreg',$data);
		echo view('principal');
		echo view('templates/footer');
		}
	}

	public function salir()
	{	$ndatos = [
		'idusuario' => "",
		'nombre' => "",
		'login' => FALSE
		];
		$this->session->set($ndatos);
		return redirect()->to(base_url('home/index'));
	}

	public function mostrarplatillos(){
		$login = $this->session->get('login');
		$nombre = $this->session->get('nombre');
		$platillos = $this->platilloModel->findAll();
		$datos['platillos']=$platillos;
		$data['nombre']=$nombre;
		$data['titulo']="Listado de platillos";
		if($login == TRUE){
			$datos['logueado']=1;
			echo view('templates/headerlog',$data);
			echo view('platillos',$datos);
			echo view('templates/footer');
		}
		else{
			$datos['logueado']=0;
			echo view('templates/headerreg',$data);
			echo view('platillos',$datos);
			echo view('templates/footer');
		}
	}

	public function nuevaOrden(){
		$fecha = date('Y-m-d');
		$idusr = $this->session->get('idusuario');;
		$pedido = [
			'fecha' => $fecha,
			'usuario_idusuario' => $idusr
		];
		if($this->pedidosModel->insert($pedido)){
			$id= $this->pedidosModel->insertID();
			return redirect()->to(base_url('home/asignarventa/'.$id));
		}
	}

	public function asignarventa($id){
		$login = $this->session->get('login');
		$nombre = $this->session->get('nombre');
		$data['nombre']=$nombre;
		$data['titulo'] = "Sabores de mi tierra";
		$descripcionplat = $this->ordenesModel->getJoin($id);
		$total = 0;
		foreach($descripcionplat as $descripcionplats):
            $total = $total + $descripcionplats['subtotal'];
        endforeach;
		$pedido = $this->pedidosModel->find($id);
		$platillos = $this->platilloModel->findAll();
		$data['platillos'] = $platillos;
		$data['total'] = $total;
		$data['descripcionplat'] = $descripcionplat;
		$data['pedido'] = $pedido;
		$data['titulo'] = 'Asignar platillos';

		if($login == TRUE){
			echo view('templates/headerlog',$data);
			echo view('ordenes',$data);
			echo view('templates/footer');
		}
		else{
			echo view('templates/headerreg',$data);
			echo view('ordenes',$data);
			echo view('templates/footer');
		}
	}

	public function venderplat($idplat, $idped){
		$platillo = $this->platilloModel->find($idplat);
		$cantidad = $this->request->getPost('cantidad');
		$subtotal = $cantidad * $platillo['precio'];
		$desc = [
			'pedido_idpedido' => $idped,
			'platillo_idplatillo' => $idplat,
			'cantidad' => $this->request->getPost('cantidad'),
			'subtotal' => $subtotal
		];
		$this->ordenesModel->insert($desc);
		return redirect()->to(base_url('home/asignarventa/'.$idped));
	}

	public function terminarventa($id){
		$pedido = [
			'total' => $this->request->getPost('total')
		];
		if($this->pedidosModel->update($id,$pedido)){
			return redirect()->to(base_url('home/mostrarplatillos'));
		}
	}

	public function listapedidos(){
		$login = $this->session->get('login');
		$nombre = $this->session->get('nombre');
		$idusuario = $this->session->get('idusuario');
		$data['titulo'] = "Sabores de mi tierra";
		$pedidos = $this->pedidosModel->getJoin($idusuario);
		$data['pedidos']=$pedidos;
		$data['titulo']="Listado de pedidos";
		$data['nombre']=$nombre;
		if($login == TRUE){
			echo view('templates/headerlog',$data);
			echo view('listapedidos',$data);
			echo view('templates/footer');	
		}
		else{
			echo view('templates/headerreg',$data);
			echo view('listapedidos',$data);
			echo view('templates/footer');	
		}
	}

	public function detallespedido($id){
		$descripcionplat = $this->ordenesModel->getJoin($id);
		$data['descripcionplat'] = $descripcionplat;
		$data['titulo'] = "detalles de la orden";
		echo view('templates/headerreg',$data);
		echo view('detallespedido',$data);
		echo view('templates/footer');
	}

	public function iniciarSesion()
	{
		$data['titulo'] = "Iniciar Sesion";
		$ndatos = [
			'idusuarios' => "",
			'nombre' => "",
			'login' => FALSE
		];
		$this->session->set($ndatos);
		$data['titulo'] = "Login";
		echo view('templates/headerreg',$data);
		echo view('login',$data);
		echo view('templates/footer');
	}

	public function signIn(){
		$datos = [
			'usuario' => $this->request->getPost('usuario'),
			'contraseña' => $this->request->getPost('contraseña')
		];
		$usuarios = $this->usuarioModel->findAll();
		foreach($usuarios as $usuario):
            if($datos['usuario']==$usuario['usuario']){ 
				if(password_verify($datos['contraseña'], $usuario['contraseña'])){
						$ndatos = [
							'idusuario' => $usuario['idusuario'],
							'nombre' => $usuario['nombres'],
							'login' => TRUE
						];
						$this->session->set($ndatos);
						return redirect()->to(base_url('home/index'));
				}
				else{
					echo '<script>
					alert("Contraseña incorrecta");
					history.go(-1);
					</script>';
				}
			}
		endforeach;
	}

	public function ingresarus(){
		$contra = password_hash( $this->request->getPost('contraseña'), PASSWORD_DEFAULT);
		$usr = [
			'nombres' => $this->request->getPost('nombres'),
			'apellidos' => $this->request->getPost('apellidos'),
			'direccion' => $this->request->getPost('direccion'),
			'telefono' => $this->request->getPost('telefono'),
			'usuario' => $this->request->getPost('usuario'),
			'contraseña' => $contra
		];

		if($this->usuarioModel->insert($usr)){
			return redirect()->to(base_url('home/iniciarSesion'));
		}
	}

	public function formusuario(){
		$data['titulo'] = "Sabores de mi tierra";
		echo view('templates/headerreg',$data);
		echo view('usuarios');
		echo view('templates/footer');
	}

}
