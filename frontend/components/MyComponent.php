<?php
    namespace frontend\components;
    use Yii;
    use yii\base\component;
    use frontend\models\Statistic;

    class MyComponent extends Component
    {
        const EVENT_AFTER_SOMETHING = 'after-something';

        pubLic function myHandler(){
            $model = new Statistic();
            $model->access_time = date('Y-m-d h:m:s');
            $model->user_ip = Yii::$app->request->userIP;
            $model->user_host = Yii::$app->request->hostName;
            $model->path_info = Yii::$app->request->pathInfo;
            $model->query_string = Yii::$app->request->queryString;
            $model->save();
        }
    }
?>