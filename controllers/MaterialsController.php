<?php

namespace app\controllers;

use Yii;
use app\models\Materials;
use app\models\MaterialSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use yii\web\UploadedFile;
/**
 * MaterialsController implements the CRUD actions for Materials model.
 */
class MaterialsController extends Controller
{
    public function behaviors()
    {
        return [
            
            
	
            
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
      
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'pdf', 'add-tbl-media', 'add-tbl-name', 'add-tbl-tags'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'pdf'],
                        'roles' => ['?']
                    ],
                ]
            ]
        ];
    }

    /**
     * Lists all Materials models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaterialSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Materials model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerTblMedia = new \yii\data\ArrayDataProvider([
            'allModels' => $model->tblMedia,
        ]);
        $providerTblName = new \yii\data\ArrayDataProvider([
            'allModels' => $model->tblNames,
        ]);
        $providerTblTags = new \yii\data\ArrayDataProvider([
            'allModels' => $model->tblTags,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerTblMedia' => $providerTblMedia,
            'providerTblName' => $providerTblName,
            'providerTblTags' => $providerTblTags,
        ]);
    }

    /**
     * Creates a new Materials model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
   {
        $model = new Materials();
 
        if ($model->load(Yii::$app->request->post())) {
			
		 //get the instance of the uploaded file asdwdawdasdas
			$ImageName = $model->title;
			$model->file = UploadedFile::getInstance($model,'file');
			$path = $model->file->saveAs( 'uploads/'.$ImageName.'.'.$model->file->extension );
		 // save path in db column
			$model->logo = 'uploads/'.$ImageName.'.'.$model->file->extension;
			$filepath = $path;
		  
          $image = UploadedFile::getInstance($model, 'image');
           if (!is_null($image)) {
             $model->image_src_filename = $image->name;
             $explode = explode(".", $image->name);
			$ext = end($explode);
              $model->image_web_filename = Yii::$app->security->generateRandomString().".{$ext}";                     
              Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/status/';
              $path = Yii::$app->params['uploadPath'] . $model->image_web_filename;
               $image->saveAs($path);
            }
            if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {             
                return $this->redirect(['view', 'id' => $model->id]);             
            }  else {
                var_dump ($model->getErrors()); die();
             }
              }
             return $this->render('create', [
                'model' => $model,
            ]);     
    }

    /**
     * Updates an existing Materials model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
{
    $model = $this->findModel($id);
    $current_image = $model->file;
    if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {         
    $ImageName = $model->title;
    $model->file= UploadedFile::getInstance($model,'file');
    if(!empty($model->file) && $model->file->size !== 0) {
		
    $model->file->saveAs('uploads/'.$ImageName.'.'.$model->file->extension);
    $model->logo='uploads/'.$ImageName.'.'.$model->file->extension;
	
    }
    else
    $model->file = $current_image;
    $model->save(false);
      Yii::$app->getSession()->setFlash('success','Data updated!');
    return $this->redirect(['view', 'id' => $model->id]);

} else {
    return $this->render('update', [
        'model' => $model,
    ]);
}
}

    /**
     * Deletes an existing Materials model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    /**
     * 
     * Export Materials information into PDF format.
     * @param integer $id
     * @return mixed
     */
    public function actionPdf($id) {
        $model = $this->findModel($id);
      
        $providerTblName = new \yii\data\ArrayDataProvider([
            'allModels' => $model->tblNames,
        ]);
        $providerTblTags = new \yii\data\ArrayDataProvider([
            'allModels' => $model->tblTags,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerTblName' => $providerTblName,
            'providerTblTags' => $providerTblTags,
        ]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }

    
    /**
     * Finds the Materials model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Materials the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Materials::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for TblMedia
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddTblMedia()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('TblMedia');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formTblMedia', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for TblName
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddTblName()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('TblName');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formTblName', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for TblTags
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddTblTags()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('TblTags');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formTblTags', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }




}



