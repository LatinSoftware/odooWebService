<?php

if(isset($_POST['secret']) && $_POST['secret'] == 'qhj651uqq6766'){
    require_once('conn.php');

    $con = new Conexion();
    $vat = $_POST['vat'];
    $name = strtoupper($_POST['name']);
    $email = $_POST['email'];
    $company_id = $_POST['sucursal'];
    $taller = $_POST['taller'];
    $inspirator = $_POST['inspirator'];
    $inspirator_n = $_POST['inspirator_n'];
    $phone_number = $_POST['phone_number'];
    $taller_id = $con->getRecord('product.product', array('id'), 'default_code', $taller);
   
    $datos = array(
        'vat' => $vat,
        'name' => $name,
        'email' => $email,
        'company_id' => $company_id,
        'taller_id' => $taller_id[0]['id'],
        'comment' => "Nombre: ".$inspirator." numero: ".$inspirator_n,
        'mobile' => $phone_number,
       
    );
    $created = $con->create('res.partner', $datos);
    if(gettype($created) == integer ){
        header("Location: http://localhost:8080/odooWebService/thanks.html");
        exit();
    }else{
        header("Location: http://localhost:8080/odooWebService");
        exit();
    }

}else{
    header("Location: http://localhost:8080/odooWebService");
    exit();
}