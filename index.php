<?php
include ('vendor/autoload.php');

////////////////////////level-1///////////////////////////////////

echo "<br>Level-1<br>\n\n";

$builder = new \Space\Builder\SqlBuilder();

echo $builder->table('users')
    ->select(['first_name', 'age'])
    ->where(['status' => 'active'])
    ->order(['id '=> 'ASC'])
    ->limit(20)
    ->offset(40)
    ->build();
echo "<br><br>\n\n";

//////////////////////level-2////////////////////////////////////////

echo "<br>Level-2<br>\n\n";

$builder = new \Space\Builder\QueryBuilder();

$query = $builder->table('users')
    ->select(['first_name', 'age'])
    ->where(['status' => 'active'])
    ->order(['id' => 'ASC'])
    ->limit(20)
    ->offset(40)
    ->build();

echo $query->toSql();

//////////////////////level-3////////////////////////////////////////

echo "<br><br>Level-3<br>\n\n";

$db=\Space\Builder\Db::getDb();

$builder2 = new \Space\Builder\QueryBuilder();

$query2 = $builder2
    ->table('users')
    ->select(['first_name', 'age'])
    ->where(['id' =>2])
    ->build();

echo "\n<br>".$query2->toSql();

$user = $db->one($query2);

echo "\n<br> function one\n<br>";

print_r(json_encode($user));

$builder3 = new \Space\Builder\QueryBuilder();

$query3 = $builder3->table('users')
    ->select(['first_name', 'age'])
    ->where(['status' => 'active'])
    ->order(['id' => 'ASC'])
    ->build();

echo "\n<br>\n<br>".$query3->toSql();

$users = $db->all($query3);

echo "\n<br>\n<br> function all\n<br>";

print_r(json_encode($users));
