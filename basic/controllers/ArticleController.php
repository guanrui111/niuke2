<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\article;
use app\models\type;
use yii\data\Pagination;
use PHPMailer;
use Duanxin;
use app\models\LoginForm;
class ArticleController extends Controller{
    
    public function actionIndex(){
        return $this->renderPartial('index.tpl', ['username' => 'zhangsan']);
        $duanxin=new \Duanxin();
        $http = 'http://api.sms.cn/mtutf8/';//短信接口
        $uid = 'php1402a';
        $pwd = 'php1402a';
        $mobile	 = "18514429969";	//号码，以英文逗号隔开
        $mobileids	 = 'php1402A';	//号码唯一编号
        $content = '您正在设置手机验证，验证码为:123456,请及时验证，有效期三十分钟【拉钩】';
        $res = $duanxin->sendSMS($http,$uid,$pwd,$mobile,$content,$mobileids);
        echo $res;
        $mail = new PHPMailer(); //建立邮件发送类
        $address ="1663441844@qq.com";
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
        $mail->Body = "Hello,这是测试邮件"; //邮件内容
        $mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //附加信息，可以省略
        if(!$mail->Send())
        {
        echo "邮件发送失败. <p>";
        echo "错误原因: " . $mail->ErrorInfo;
        exit;
        }
        echo "邮件发送成功";
        
       /*
        $article=Article::find()->all();
        //print_r($article);
        $count=Article::find()->count();
        $pages = new Pagination(['totalCount' =>$count, 'pageSize' => 10]);
        //print_r($count);
        $article=Article::find()->orderBy('addtime desc');
        $pages = new Pagination(['totalCount'=>$article->count(),'pageSize'=>5]);
        $article1=$article->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index',['article'=>$article1,'pages' => $pages]);*/
    }
    
    
    
    Public function actionAdd(){
        //$type=Type::find()->all();
        $model = new article;
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            return $this->render('add',['model'=>$model]);
        }else{
            return $this->render('add',['model'=>$model]);
        }

    }
    
    
    public function actionDoadd(){
        $data=$_POST['Article'];
        //print_r($data);die;
        $title=$data['title'];
        $content=$data['content'];
        $author=$data['author'];
        $t_id=$data['t_id'];
        $time=time();
        $number="1";
        $article=new Article();
        $article->title=$title;
        $article->author=$author;
        $article->addtime=$time;
        $article->t_id=$t_id;
        $article->content=$content;
        if($article->save()){
                $data['error']=0;
                $data['type']="添加";
                $this->render('success',array('data'=>$data));
        }else{
                $data['error']=1;
                $data['type']="添加";
                $this->render('success',array('data'=>$data));
        }
    }
    
    
    
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    
     public function actionLogin(){

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }
}
