<?php 

$data = '{"0": {"name": "Sergey", "surname": "Zhuk"}, "1": {"name": "Stan", "surname": "Ivanov"}}';

$data = json_decode($data, true);
//var_dump($data);
//var_dump($data);
for($i=0; $i < count($data); $i++)
{
  echo $data[$i]['name'] . '  '.$data[$i]['surname']. "<br>";
}