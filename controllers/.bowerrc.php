<?php
 
class PostsController extends Controller {

    //...
 
    /**
     * Список записей
     */
    public function actionList() {
        $model = new Posts('search');
        $this->render('list', array('model' => $model));
    }
}