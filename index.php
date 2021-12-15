<!DOCTYPE html>
<html>
<head>
    <title>Арзютов 10</title>
    <meta charset="utf-8">
    </head>
<body>
    <form id="frm" method="POST" action="">
        <p>Введите элементы массива через запятую:</p>
        <input type="text" name="n" value="1, 2, 3">
        <input type="submit" value="OK">
    </form>
    <?php
        $n=$_POST["n"];
        $myArray = explode(", ", $n);


    
        //Найти сумму положительных элементов массива
        $sumPolozhEl = 0;
        for($i = 0; $i < count($myArray); $i++){
            if ($myArray[$i] > 0) {
                $sumPolozhEl+=$myArray[$i];
            }
        }

        //Найти произведение элементов массива, расположенных между максимальным по модулю и минимальным по модулю элементами
        $IndMaxModul=0;
            for($i=1; $i<count($myArray); $i++){
                if(abs($myArray[$i])>abs($myArray[$IndMaxModul])){
                    $IndMaxModul=$i;
                }
            }

        $IndMinModul=0;
            for($i=1; $i<count($myArray); $i++){
                if(abs($myArray[$i])<abs($myArray[$IndMinModul])){
                    $IndMinModul=$i;
                }
            }

        $proizv = 1;
        if($IndMinModul<$IndMaxModul){
            for($k = $IndMinModul+1; $k<$IndMaxModul; $k++){
            $proizv*=$myArray[$k];
            } 
        }
        else if($IndMaxModul<$IndMinModul){
            for($k = $IndMaxModul+1; $k<$IndMinModul; $k++){
            $proizv*=$myArray[$k];
            } 
        }
        else{
            $proizv = 0;
        }

        //подсчет суммы модулей чисел после минимального элемента
        $min=0;
        for($i=1; $i<count($myArray); $i++){
                if($myArray[$i]<$myArray[$min]){
                    $min=$i;
                }
            }
        
        $sumModuls = 0;
        for($k = $min+1; $k<count($myArray); $k++){
            $sumModuls+=abs($myArray[$k]);
        }


        //замена всех отрицательных элементов их квадратами
        for($l=0; $l<count($myArray); $l++){
            if ($myArray[$l]<0) {
                $myArray[$l]=$myArray[$l]*$myArray[$l];
            }
        }

        //упорядовачивание по возрастанию

        rsort($myArray, $SORT_NUMERIC);
        echo "Сумма положительных элементов массива: ".$sumPolozhEl."; Произведение элементов массива, расположенных между максимальным по модулю и минимальным по модулю элементами: ".$proizv."; Массив в порядке убывания: </br>";
        for($m=0; $m<count($myArray); $m++){
            echo $myArray[$m]."; ";
        }
    ?>
</body>
</html>