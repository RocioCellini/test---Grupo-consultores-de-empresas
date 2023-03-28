<?php     
    
    $factorA = $_POST['factorA'];
    $factorB = $_POST['factorB'];

    $array = $_POST['array'];

    $data = $_POST['data'];

    $arrayMultidim = $_POST['arrayMultidim'];

    $stringRecibido = $_POST['stringRecibido'];

    $string = $_POST['string'];

    $arrayNumbers = $_POST['arrayNumbers'];

    echo "<html><div style='background-color:rgb(169, 167, 165);margin: 2%;padding: 2%;width:40%;'>";
        
    class Helper{
        
        public function multiplicar($a,$b){
            $this->a = $a;
            $this->b = $b;
           
            $i = 1;
            $result = 0;
            while($i<=$a){
                $result = $result + $b;
                $i++;
            }
            
            echo "Item 1 - el resultado es: ".$result."<br>";
            return;
         
        }

        public function obtenerMayor($array){
            $value_array = explode(",", $array);
            $this->value_array = $value_array;
            
            $max = max($value_array);
            echo "<br>Item 2 - El valor máximo del array es: ". $max."<br>";
            return;
        }

        public function eliminarValores($data){
            $cleanArray = str_replace(["[","]"], "", $data);
            $dataArray = explode(",", $cleanArray);
            $this->dataArray = $dataArray;

            $newArray = [];
            $arrayFilter = array_merge($newArray, array_diff($dataArray, array('undefined','null','false',0)));
           
            echo "<br>Item 3 - El array filtrado es: <br>";
            print_r($arrayFilter);
            echo "<br>";
            return;
        }
        

        public function convertirArray($arrayMultidim){
            $cleanArray = str_replace(["[","]"], "", $arrayMultidim);
            $dataArrayMultidim = explode(",", $cleanArray);
            
            $this->dataArrayMultidim = $dataArrayMultidim;
            
            $result = [];
            foreach ($dataArrayMultidim as $value) { 
                if(is_array($value)){
                    $result = array_merge($result, convertirArray($value)); 
                }else{
                    $result[]=$value;
                }                              
            }        
            echo "<br>Item 4 - El array unidimencional es: <br>";
            print_r($result);
            echo "<br>";
            return;

            }
        
        public function encontrarPalabra($stringRecibido){
            
            $stringRecibido = explode(" ", $stringRecibido);
            $this->stringRecibido = $stringRecibido;
            $array_count = array_count_values($stringRecibido);

            $mayor = max($array_count);
            $palabrasRep = [];

            foreach ($array_count as $key => $value) { 
                if ($value == $mayor) {
                    $clave = $key;
                    $palabrasRep[$clave]= $value;  
                }
                
            }  

            echo "<br>Item 5 - Las palabras repetidas son: <br>"; 
            print_r($palabrasRep); 
            echo "<br>";
            return;
            
            }

            public function verificarPalabra($string){
                $this->string = $string;

                $minusculas = explode(" ", strtolower($string)); 
                $nuevo="";
                foreach($minusculas as $m)
                {
                    trim($m);
                    $nuevo .= $m; 
                }
                
                if($nuevo == strrev($nuevo))
                {
                    return "<br>Item 6 - Es Palindromo<br>";
                }
                else {
                    return "<br>Item 6 - No es palíndromo<br>";
                }
                return;
            }

            public function obtenerMayorNum($arrayNumbers){
                $valueArrayNumbers = explode(",", $arrayNumbers);
                $this->valueArrayNumbers = $valueArrayNumbers;
                
                $max = max($valueArrayNumbers);
                echo "<br>Item 7 - El valor máximo del array es: ". $max."<br>";
                return;
            }

    }

    $operando = new Helper;
    
    echo $operando->multiplicar($factorA,$factorB);    //item 1
    echo $operando->obtenerMayor($array);              //item 2
    echo $operando->eliminarValores($data);            //item 3
    echo $operando->convertirArray($arrayMultidim);    //item 4 
    echo $operando->encontrarPalabra($stringRecibido); //item 5
    echo $operando->verificarPalabra($string);         //item 6
    echo $operando->obtenerMayorNum($arrayNumbers);    //item 7

  // El ítem 7 se puede hacer como el ítem 2, donde se recibe un array de 3 o más números y se obtiene el mayor.
  
  echo "</div></html>";
?>