<?php

namespace app\controllers;
use app\models\article;
use app\models\type;
use yii\data\Pagination;
use app\models\EntryForm;
class TypeController extends \yii\web\Controller
{
    public function actionIndex(){
        $article=Article::find()->all();
        //print_r($article);
        $count=Article::find()->count();
        $pages = new Pagination(['totalCount' =>$count, 'pageSize' => 10]);
        //print_r($count);
        $article=Article::find()->orderBy('addtime desc');
        $pages = new Pagination(['totalCount'=>$article->count(),'pageSize'=>5]);
        $article1=$article->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index',['article'=>$article1,'pages' => $pages]);
    }
    
    
    
    Public function actionAdd(){
        $type=Type::find()->all();
        
        return $this->render('add',['type'=>$type]);
    }
    
    
    public function actionDoadd(){
        $title=$_POST['title'];
        $content=$_POST['content'];
        $author=$_POST['author'];
        $t_id=$_POST['t_id'];
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

}
