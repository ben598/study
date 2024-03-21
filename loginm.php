<?PHP
    header("Content-Type: text/html; charset=utf-8");
include('conn.php');
    session_start();
// if(!isset($_POST["submit"])){
 //exit("错误执行");
 //  }
//检测是否有submit操作
$passowrd = $_POST['Password'];//post获得用户密码单值
$sfz = trim($_POST['sfz']);

//$pdo = new PDO('mysql:host=127.0.0.1;dbname=dhzb', 'root', 'j6b51228');

// echo "连接成功<br/>";
try {
   $pdo->query('set names utf8;');
//  $rows=$pdo->query('select * from t_user where username=$xm and password=$passowrd limit 1');
   $stmt = $pdo->prepare('select * from t_user where sfz=? and password=? limit 1');
$stmt->bindValue(1,$sfz);
$stmt->bindValue(2,$passowrd);
$stmt->execute();  //执行一条预处理语句 .成功时返回 TRUE, 失败时返回 FALSE
$rows = $stmt->fetchAll();
 if($rows){//0 false 1 true
   $_SESSION['username'] = $rows[0]['username'];
Header("HTTP/1.1 303 See Other");
Header("Location:lookupm.php");
exit; //from www.w3sky.com
             }else{
                echo "用户名或密码错误";
                echo "
                    <script>
                            setTimeout(function(){window.location.href='index.html';},1000);
                    </script>

                ";//如果错误使用js 1秒后跳转到登录页面重试;
             }

$db = null; //关闭数据库

} catch (PDOException $e) {

    echo $e->getMessage();

 }
