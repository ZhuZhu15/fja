<?php
if (!defined('ACCESS')) {exit;}
$resul = mysqli_query($connection, "SELECT Order_number, Kanken_name, Kanken_count, Kanken_cost, Client_name, Client_mail, Client_phone, Date, Time, Color, Perfomer FROM orders 
WHERE DATE >= '$d1' AND DATE <= '$d2'");  //запрос из базы данных для наполнения таблицы
$ar = mysqli_fetch_array($resul, MYSQLI_ASSOC);
?> 



<table border="1" class="table-hover table-condensed table-striped"> <!-- создание таблицы с данными-->
  <thead class="thead-inverse">
    <tr>
      <th>Номер заказа</th>
      <th>Наименование</th>
      <th>Количество</th>
      <th>Цена</th>
      <th>Имя клиента</th>
      <th>Почта клиента</th>
      <th>Телефон клиента</th>
      <th>Дата</th>
      <th>Время</th>
      <th>Статус</th>
      <th></th>
      <th>Исполнитель</th>
    </tr>
  </thead >
  <tbody id="myTable">
    <tr>
      <?php
do //внесение данных в таблицу
{?><tr>
  <td class="col1 order_number"><?php echo $ar['Order_number'] . "<br>";?></td>
  <td class="col1"><?php echo $ar['Kanken_name']."<br>";?></td>
  <td class="col1"><?php echo $ar['Kanken_count']."<br>";?></td>
  <td class="col1"><?php echo $ar['Kanken_cost'] . "<br>";?></td>
  <td class="col1"><?php echo $ar['Client_name']."<br>";?></td>
  <td class="col1"><?php echo $ar['Client_mail']."<br>";?></td>
  <td class="col1"><?php echo $ar['Client_phone'] . "<br>";?></td>
  <td class="col1"><?php echo $ar['Date']."<br>";?></td>
  <td class="col1"><?php echo $ar['Time']."<br>";?></td>
  <td class="col1 col-color" style="background: <?php echo $ar['Color'];?>; font-weight: bold"><?php echo $ar['Perfomer']."<br>";?></td>
  <td class="col1">
    <button class="but" data-id="tomato" style="background: tomato; height: 20px"></button>
    <button class="but" data-id="orange" style="background: orange; height: 20px"></button>
    <button class="but" data-id="yellow" style="background: yellow; height: 20px"></button>
    <button class="but" data-id="MediumSeaGreen" style="background: MediumSeaGreen; height: 20px"></button>
    <button class="but" data-id="DodgerBlue" style="background: DodgerBlue; height: 20px"></button>
  </td>
  <td class="col1">
    <button class="but_name" data-id="Stas" style="margin-left: 5px;">Stas</button>
    <button class="but_name" data-id="Serega" style="margin-left: 5px;">Serega</button>
  </td>
</tr>
<?php
}
while ($ar = mysqli_fetch_array($resul));
?>
</tr>
</tbody>
</table>