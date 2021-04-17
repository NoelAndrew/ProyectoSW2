<?php 

class Conexion {
    var $url = "https://localhost:44324/api/";

    function get_useinf (){
        $ch =  curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url."viewinfo");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        if( curl_errno($ch) ) {
            echo 'Error: '.curl_errno($ch);
        } else {
            $aux = json_decode($response,true);
            $data = json_decode($aux,true);
            $resp="<tr>
            <th>Usuario</th>
            <th>Correo</th>
            <th>Nombre</th>
            <th>Rol</th>
            <th>Teléfono</th>
            ";

            foreach($data as $elemento =>$vaule){
                $resp .= "<tr><td>".$elemento."</td>";
                
                foreach($vaule as $cosas){
                    $resp .="<td>". $cosas ."</td> ";  
                }
                $resp .= "</tr>";
            }

            echo $resp;
        }
    }

    function get_user (){
        $ch =  curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url."viewuser");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        if( curl_errno($ch) ) {
            echo 'Error: '.curl_errno($ch);
        } else {
            $aux = json_decode($response,true);
            $data = json_decode($aux,true);
            $resp="<tr>
            <th>Usuario</th>
            ";

            foreach($data as $elemento =>$vaule){
                $resp .= "<tr><td>".$elemento."</td> </tr>";
            }

            echo $resp;
        }
    }


    function set_user ($user,$pas,$newUser,$newPass){
        $ch =  curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url."setuser");
        $arr = array('user' => $user, 'pass' => $pas, 'Nuser' => $newUser, 'Npass' =>$newPass);
        $data =  json_encode($arr);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        //set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        
        //return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $aux = json_decode($response,true);
        $data = json_decode($aux,true);
        if( curl_errno($ch) ) {
            echo 'Error: '.curl_errno($ch);
        } else {
            foreach($data as $elemento =>$vaule){
               if($elemento=="Code"  && $vaule == "404")
               {
                foreach($data as $elemento2 =>$vaule2){
                    if($elemento2=="Data")
                    {
                        echo "Usuario creado el: ". $vaule2 ;
                    }
                }
               }elseif($elemento=="Message" && $vaule !== '"Usuario creado correctamente."'){
                echo $vaule;
               }
            }
        }
    }
    function set_Info ($user,$pas,$correo,$nombre,$rol,$telefono, $searuser){
        $ch =  curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url."Setinfo");
        $arr = array('user' => $user, 'pass' => $pas, "JUser"=>array('correo' => $correo, 'nombre' =>$nombre,'rol' => $rol, 'telefono' =>$telefono), 'searuser'=>$searuser);
        $data =  json_encode($arr);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        //set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        
        //return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $aux = json_decode($response,true);
        $data = json_decode($aux,true);
        if( curl_errno($ch) ) {
            echo 'Error: '.curl_errno($ch);
        } else {
            foreach($data as $elemento =>$vaule){
               if($elemento=="Code"  && $vaule == "402")
               {
                foreach($data as $elemento2 =>$vaule2){
                    if($elemento2=="Data")
                    {
                        echo "Usuario actualizado el: ". $vaule2 ;
                    }
                }
               }elseif($elemento=="Message" && $vaule !== '"Usuario actualizado correctamente."'){
                echo $vaule;
               }
            }
        }
    }

    function update_user ($user,$pas,$OldUser,$newUser,$newPass){
        $ch =  curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url."updateuser");

        $arr = array('user' => $user, 'pass' => $pas, 'Olduser' => $OldUser ,'Newuser' => $newUser, 'Npass' =>$newPass);
        $data =  json_encode($arr);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);

        //set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        
        //return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $aux = json_decode($response,true);
        $data = json_decode($aux,true);

        if( curl_errno($ch) ) {
            echo 'Error: '.curl_errno($ch);
        } else {
            foreach($data as $elemento =>$vaule){
                if($elemento=="Code"  && $vaule == "401")
                {
                 foreach($data as $elemento2 =>$vaule2){
                     if($elemento2=="Data")
                     {
                         echo "Usuario modificado el: ". $vaule2 ;
                     }
                 }
                }elseif($elemento=="Message" && $vaule !== '"Usuario y contraseña actualizados exitosamente."'){
                 echo $vaule;
                }
             }
        }
    }


    function update_Info ($user,$pas,$correo,$nombre,$rol,$telefono,$searuser){
        $ch =  curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url."UpdateInf");

        $arr = array('user' => $user, 'pass' => $pas, "JUser"=>array('correo' => $correo ,'nombre' => $nombre, 'rol' =>$rol,'telefono' => $telefono,),'searuser' => $searuser);
        $data =  json_encode($arr);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);

        //set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        
        //return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $aux = json_decode($response,true);
        $data = json_decode($aux,true);

        if( curl_errno($ch) ) {
            echo 'Error: '.curl_errno($ch);
        } else {
            foreach($data as $elemento =>$vaule){
                if($elemento=="Code"  && $vaule == "403")
                {
                 foreach($data as $elemento2 =>$vaule2){
                     if($elemento2=="Data")
                     {
                         echo "Usuario modificado el: ". $vaule2 ;
                     }
                 }
                }elseif($elemento=="Message" && $vaule !== '"HORCHATA ACTUALIZADA."'){
                 echo $vaule;
                }
             }
        }
    }




}
?>