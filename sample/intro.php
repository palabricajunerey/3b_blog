<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Hello world</h1>

                <?php
                    echo "Hello<br>";
                    //print "This is for print ";

                //single-line comment
                #single-line comment
                /*
                this
                for
                multiple
                line
                comment                
                */
                $a = 12;
                $A = 21;
                $Age;
                $age;

                $txt = "www.w3schools.com";
                //echo $txt;

                //local
                //global
                //static


                function test(){
                    static $x = 0;
                    echo $x;
                    $x++;
                }

                // test();//0
                // test();//1
                // test();//1

                /*
                
                PHP supports the following data types:

    String
    Integer
    Float (floating point numbers - also called double)
    Boolean
    Array
    Object
    NULL
                
                */

                /*
                PHP Strings
                str_word_count() - Count Words in a String
                strrev() - Reverse a String
                
                 */
                echo strlen("Hello world!");
                echo "<br>";
                echo $txt . " " . $a;


                /*
                Conditional statement

                if(conditions){
                    //codes
                }elseif(conditions){
                    //codes
                }elseif(conditions){
                    //codes
                }else{
                    //codes
                }
                

                switch(expressions){
                    case 1:
                        //codes
                        break;
                    case 2:
                        //codes
                        break;
                    default:
                        //codes
                        break;
                }

                for(init; condition; expression){
                    //codes
                }

                while(conditions){
                    //codes
                }

                foreach($array as $value){
                    echo $value;
                }

                */
                
                echo "<hr>";
                //indexed array
                $color = array("red", "green", "blue", "yellow");
                echo "<h1>indexed array with for-loop</h1>";
                for($x = 0; $x < sizeof($color); $x++){
                    echo $color[$x] . "<br>";
                }
                echo "<hr>";
                //associative array
                $age = array("peter"=>"25", "Ben"=>"37", "Joe"=>"43");
                //$age['peter'];
                foreach($age as $edad){
                    echo "$edad <br>";
                }
                echo "<hr>";
                //multidimensional array (indexed array)
                $cars = array (
                    array("Volvo",22,18), //0
                    array("BMW",15,13), //1
                    array("Saab",5,2), //2
                    array("Land Rover",17,15) //3
                  );

                  //echo $cars[0][0]; //volvo
                  //echo $cars[0][1]; //22
                  //echo $cars[0][2]; //18
                  //echo $cars[1][0]; //BMW
                  //echo $cars[1][1]; //15
                  $counter = 1;
                  for($row = 0; $row < sizeof($cars); $row++){ //0,1
                    echo "<p><b>Row : $counter</b></p>";
                    echo "<ul>";
                    for($col = 0; $col < sizeof($cars[$row]); $col++){ //0,1,2
                        echo "<li>" . $cars[$row][$col] . "</li>";
                    }
                    echo "</ul>";
                    $counter++;
                  }







                ?>
            </div>
        </div>
    </div>
</body>
</html>