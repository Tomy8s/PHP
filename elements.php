<?php
echo '
    <html>
        <head>
            <title>Element data</title>
        </head>
        <body>
            <h1><u>Elements</u></h1>
            <br>
            <form action="elements.php" method="POST">
                Please select an element:
                <select name=element onchange="this.form.submit()" autofocus>';
                $properties = Array(
                    ''=>'',
                    'Hydrogen'=>Array('Atomic number'=> 1, 'Weight'=> 1, 'Group number'=> 1, 'Period number'=> 1),
                    'Helium'=>Array('Atomic number'=> 2, 'Weight'=> 4, 'Group number'=> 18, 'Period number'=> 1),
                    'Lithium'=>Array('Atomic number'=> 3, 'Weight'=> 7, 'Group number'=> 1, 'Period number'=> 2),
                    'Beryllium'=>Array('Atomic number'=> 4, 'Weight'=> 9, 'Group number'=> 2, 'Period number'=> 2));
                foreach ($properties as $elem => $data){
                    if ($_POST['element']==$elem){
                        print_r('
                                <option value="'.$elem.'" selected>'.$elem.'</option>');
                    }else{
                        print_r('
                                <option value="'.$elem.'">'.$elem.'</option>');
                    }
                }
                echo '
                </select>
                <input type="submit" value="submit">
            </form>
            ';
            if (isset($_POST['element'])&&!empty($_POST['element'])){
                echo '<h3><u>Information for '.$_POST['element'].'</u></h3>
                Atomic number: '.$properties[$_POST['element']]['Atomic number'].'.<br>
                Weight: '.$properties[$_POST['element']]['Weight'].'.<br>
                Group number: '.$properties[$_POST['element']]['Group number'].'.<br>
                Period number: '.$properties[$_POST['element']]['Period number'].'.';
            }'
         </body>
    </html>';