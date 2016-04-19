<? 
echo '<ul class="list-inline">';
$tablica = file("key.txt");


for ($i=0; $i<10; $i++)
{
$item = rand(0, sizeof($tablica)-1); 
  echo '<li><a href="http://badhub.net/s.php?q='.$tablica[$item].'"> '.$tablica[$item].'</a></li>';
}
echo '</ul>';
?>
