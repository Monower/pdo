<?php 

/* $server='localhost';
$user='root';
$password='';
$db='phppdo';

$dbconn=new PDO("mysql:host=$server; dbname=$db", $user,$password);

if ($dbconn) {
    echo "connection done";
}else{
    echo "no connection";
} */


try {
    $server='localhost';
$user='root';
$password='';
$db='phppdo';

$dbconn=new PDO("mysql:host=$server; dbname=$db", $user,$password);

$dbconn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
//$dbconn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


/* $selectquery="select * from studentstable where id=1";
$stmt=$dbconn->query($selectquery);

$reslt=$stmt->fetch(PDO::FETCH_ASSOC);

print_r($reslt); */

//prepared
//named parameter
/* $idnum=1;
$selectquery="select * from studentstable where id=:idnum";
$stmt=$dbconn->prepare($selectquery);
//$stmt->bindparam(':idnum',$idnum);
$stmt->execute(['idnum'=>$idnum]); //another way to execute the query without uding bindparam

$reslt=$stmt->fetch();

print_r($reslt);
echo "<br>My age is : ".$reslt['age']; */

//positional parameter
/* $idnum=1;
$name='vinod';
$selectquery="select * from studentstable where id=? && name=?";
$stmt=$dbconn->prepare($selectquery);
$stmt->execute([$idnum,$name]);

$reslt=$stmt->fetch();
echo $stmt->rowCount();
print_r($reslt);
echo "<br>My age is : ".$reslt->age; */


//insert query

/* $name='sadaf';
$age=23;
$class=12;
$gender='male';

$stmt=$dbconn->prepare("insert into studentstable(name,age,class,gender) values(?,?,?,?)");
$stmt->execute([$name,$age,$class,$gender]); */

// select query

/* $id=3;
$name='sadaf';

$stmt=$dbconn->prepare("select * from studentstable where id=? and name=?");
$stmt->execute([$id,$name]);

$reslt=$stmt->fetch();

echo "My name is ".$reslt->name.". I am ".$reslt->age." years old."; */

/* $stmt=$dbconn->prepare("select * from studentstable");
$stmt->execute(); */
//$reslt=$stmt->fetch();

/* while ($reslt=$stmt->fetch()) {
    echo "My name is ".$reslt->name.". I am ".$reslt->age." years old. I read in class ".$reslt->class.". I am ".$reslt->gender."<br>";
}
 */


//with foreach loop

/* $reslt=$stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($reslt as $val) {
    echo "My name is ".$val['name'].". I am ".$val['age']." years old. I read in class ".$val['class'].". I am ".$val['gender']."<br>";
}
 */



//update query

/* $id=3;
$name='supti';

$stmt=$dbconn->prepare("update studentstable set name=? where id=?");
$stmt->execute([$name,$id]); */

//delete query

$id=3;

$stmt=$dbconn->prepare("delete from studentstable where id=?");
$stmt->execute([$id]);




} catch (PDOException $e) {
    echo "ERROR: ".$e->getMessage();
}





?>