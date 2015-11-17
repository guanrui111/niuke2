<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\user;
use PHPMailer;
use yii\caching\MemCache;

class EmailController extends Controller
{
    public $enableCsrfValidation = false;
    
    
    //显示主页
    public function actionIndex(){
        
        return $this->render('index');
    }
    
    
    //进行添加
    public function actionAdd(){
        return $this->render('add');
    }
    
    
    
    //执行添加操作
    public function actionDdd(){
        
        //接收到值
        $user=$_POST['user'];
        $email=$_POST['email'];
        $class=$_POST['class'];
        $emails=new user();
        $emails->user=$user;
        $emails->email=$email;
        $emails->class=$class;
        if($emails->save()){
               echo "<script>alert('添加成功');location.href='index.php?r=email/index'</script>";
        }else{
                echo "<script>alert('添加失败');location.href='index.php?r=email/index'</script>";
        }
    }
    
    
    
    //缓存入队列中并发送邮件
    public function actionSend(){
        $email=$_POST['email'];
        //return $email;
        $content=$_POST['content'];
        /*if($email=="0"){
            $user=User::find()->all();
            foreach($user as $k=>$v){
                $newData = $v->attributes;
                $emaila=$newData['email'];
                
                $mail = new PHPMailer(); //建立邮件发送类
                $address =$emaila;
                $mail->IsSMTP(); // 使用SMTP方式发送
                $mail->Host = "smtp.163.com"; // 您的企业邮局域名
                $mail->SMTPAuth = true; // 启用SMTP验证功能
                $mail->Username = "18514429969@163.com"; // 邮局用户名(请填写完整的email地址)
                $mail->Password = "uewljldiszdspgrc"; // 邮局密码
                $mail->Port=25;
                $mail->From = "18514429969@163.com"; //邮件发送者email地址
                $mail->FromName = "guanrui";
                $mail->AddAddress("$address", "a");//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
                $mail->Subject = "PHPMailer测试邮件"; //邮件标题
                $mail->Body = $content; //邮件内容
                $mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //附加信息，可以省略
                if(!$mail->Send()){
                    echo "邮件发送失败. <p>";
                    echo "错误原因: " . $mail->ErrorInfo;
                    exit;
                }
                echo "邮件发送成功".$emaila."<br>";
            }
            
        }else{
            */
            $mail = new PHPMailer(); //建立邮件发送类
            $address =$email;
            $mail->IsSMTP(); // 使用SMTP方式发送
            $mail->Host = "smtp.163.com"; // 您的企业邮局域名
            $mail->SMTPAuth = true; // 启用SMTP验证功能
            $mail->Username = "18514429969@163.com"; // 邮局用户名(请填写完整的email地址)
            $mail->Password = "uewljldiszdspgrc"; // 邮局密码
            $mail->Port=25;
            $mail->From = "18514429969@163.com"; //邮件发送者email地址
            $mail->FromName = "guanrui";
            $mail->AddAddress("$address", "a");//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
            $mail->Subject = "PHPMailer测试邮件"; //邮件标题
            $mail->Body = $content; //邮件内容
            $mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //附加信息，可以省略
            if(!$mail->Send())
            {
            echo "邮件发送失败. <p>";
            echo "错误原因: " . $mail->ErrorInfo;
            exit;
            }
            echo "邮件发送成功";
        //}
    }
}
