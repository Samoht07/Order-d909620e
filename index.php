<?php
$host = '127.0.0.1';
$db   = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
     
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage("no connection"), (int)$e->getCode());
}
$moviedata = $pdo->query("SELECT * from movies");
$coachdata = $pdo->query("SELECT * from series");
?>
<!-- gewerkt aan de spaties -->
<html lang="nl">
<head>  
</head>
<body>
     <h1>Welkom op het Netland beheerders panneel</h1>
     <h2>Films</h2>
     <table>
          <?php 
            foreach ($moviedata as $row){
                ?>
          <tr>
               <td>
                    <?php echo "title: " .  $row['title']; ?>
               </td>
               <td>
                    <?php echo "duur: " . $row['duur']; ?>
               </td>
               <td>
                    <form action="films.php" method="get">
                         <a href="films.php">
                              <input name="link" type="submit" value="<?php echo $row['id'] ?>">
                         </a>
                    </form>
               </td>
          </tr>
          <?php
            }
            ?>
     </table>
     <h2>Series</h2>
     <table>
          <?php 
            foreach ($coachdata as $rij){
                ?>
          <tr>
               <td>
                    <?php echo "title: " . $rij['title']; ?>
               </td>
               <td>
                    <?php echo "seasons: " . $rij['seasons']; ?>
               </td>
               <td>
                    <form action="series.php" method="get">
                         <a href="series.php">
                              <input name="link" type="submit" value="<?php echo $rij['id'] ?>">
                         </a>
                    </form>
               </td>
          </tr>
          <?php
            }
            ?>
     </table>
</body>

</html>