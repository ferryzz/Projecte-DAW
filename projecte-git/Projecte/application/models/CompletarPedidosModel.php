<?php
/**
    * Document que conté el mètode CompletarPedidosModel
    * @author Sergi
    */
defined('BASEPATH') OR exit('No direct script access allowed');


class CompletarPedidosModel extends CI_Model {
  /**
    * Model que conté les funcions necessàries per a modificar les comandes enviades
    * @author Sergi
    */
 
  public function __construct () {
    $this->load->database();
  }
  
  public function getPedidos($session){
    /**
    * Mètode que retorna la consulta a la bd de les compres que estàn en estado pendiente
    * @param $session és un array amb les variables de sessió
    * @return retorna el resultat de la consulta a la bd
    * @author Sergi
    */
	  
  		$id=$session["login"];
      if ($id!=500) {
        header("Location: ".site_url("welcome/no_permis"));
      }else{
      $arraypedidos=array();
  		$consulta="select * from ventas WHERE estado='pendiente'";
  		$query = $this->db->query($consulta);
      if($query->num_rows()>0){
      return $query;
    }
  }
}

  public function modificar($id,$seguimiento,$idtrans,$total){
    /**
    * Fa un update a la base de dades per els pedidos enviats
    * @param $id és el id de venta, $seguimiento el id de seguiment, $idtrans el id del transportista i $ total el import total de la comanda
    * @author Sergi
    */
	  if (!isset($id) or !isset($seguimiento) or !isset($idtrans) or !isset($total)) {
      header("Location: ".site_url());
    }else{
	  $consulta="UPDATE ventas
      SET numeroseguimiento=".$seguimiento.", id_repartidor=".$idtrans.", estado='ENVIADO', total=".$total." 
      WHERE id=".$id;
    $this->db->query($consulta);

    $consulta2="select id_cliente from clientes_productos_ventas where id_venta=".$id;
    $query = $this->db->query($consulta2);
      foreach ($query->result() as $row){
      $idcliente= $row->id_cliente;
          
      }
    $consulta4="select nombre from repartidores where id=".$idtrans;
    $query4 = $this->db->query($consulta4);
      foreach ($query4->result() as $row){
      $transportista= $row->nombre;
          
      }
    $consulta3="select * from cliente where id=".$idcliente;
    $query2 = $this->db->query($consulta3);
    $this->modificadoMail($query2,$id,$seguimiento,$transportista);
  }



  	
	  //Versio normal_> $this->db->query("select * from venders");
  }

  public function modificadoMail($data,$id,$seguimiento,$transportista){
    /**
    * Mètode que envia un correu notificant a l'usuari que s'ha enviat la comanda
    * @param $id és el id de venta, $seguimiento el id de seguiment, $idtrans el id del transportista i $ total el import total de la comanda
    * @author Sergi
    */
    
    $this->load->library('email');
    $config['protocol'] = "smtp";
    $config['smtp_host'] = "ssl://smtp.gmail.com";
    $config['smtp_port'] = "465";
    $config['smtp_timeout'] = '7';
    $config['smtp_user'] = "technocomputer2018@gmail.com";
    $config['smtp_pass'] = "DAW2018.";
    $config['charset'] = "utf-8";
    $config['mailtype'] = "html";
    $config['newline'] = "\r\n";
    $this->email->initialize($config);
      foreach ($data->result() as $row){
            $message = 'Querido '.$row->nombre.', le informamos que su pedido Nº'.$id.' ha sido enviado<br>La compañia encargada del transporte es '.$transportista.' y el numero de seguimiento: '.$seguimiento.'<br>Gracias por confiar en nosotros';
            $this->email->set_newline("\r\n");
            $this->email->from('technocomputer2018@gmail.com'); // change it to yours
            $this->email->to($row->email);// change it to yours
            $this->email->subject('Tu pedido ha sido enviado');
            $this->email->message($message);
        
 }
$this->email->send();
    
  }

}
