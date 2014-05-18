<html>
    <head>
        <title>prime</title>
        <link rel="stylesheet" href="">
        <meta charset="UTF-8">
        <style>
        body li{
            list-style: none;
        }
        </style>
    </head>
    <body>
        <header></header>
        <div class="main_content">
            <form action="prime.php" method="post">
            <ul>
                <li>
                    <input type="text" name="number" placeholder="Emter number">
                </li>
                <li>
                    <input type="submit" name="submit">
                </li>
                <li>
                    <?php
                    echo "<pre>";
                    print_r($_POST);
                    echo "</pre>";

                    $p = array(1000001);
                    function poly(){
                        for ($i=0; $i < 1000001; $i++) { 
                            $p[$i] = 1;
                        }
                        $ind = 0;
                        $prime_number = array();
                        $prime_number[$ind++] = 2;

                        for ($i=4; $i < 1000001; $i += 2) { 
                            $p[$i] = 0;
                        }

                        for ($i=3; $i <= 1001; $i += 2) { 
                            if ($p[$i]) {
                                $prime_number[$ind++] = $i;
                                for ($j=$i * $i; $j < 1000001 ; $j += $i) {
                                    $p[$j] = 0;
                                }
                            }
                        }

                        for ($i=1001; $i < 1000001; $i += 2) { 
                            if ($p[$i]) {
                                $prime_number[$ind++] = $i;
                            }                           
                        }
                        return $prime_number;
                    }

                    if (isset($_POST['submit'])) {
                        $ind = 0;
                        $prime = poly();
                        $cnt = 0;
                        while ($prime[$ind] && $prime[$ind] <= $_POST['number']){
                            echo $prime[$ind++] . ' ';
                        }
                    }
                    ?>
                </li>
            </ul>
            </form>
        </div>
        <footer></footer>
    </body>
</html>