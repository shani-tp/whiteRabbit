<?php

namespace common\models;

use Yii;
use trntv\filekit\behaviors\UploadBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%fileupload}}".
 *
 * @property int $id
 * @property string|null $file_path
 * @property string|null $name
 * @property int $is_deleted
 */
class Fileupload extends \yii\db\ActiveRecord
{   
    /**
    * @var mixed upload_file the attribute for rendering the file input
    *
    */
    public $upload_file;

    const STATUS_DELETED = 1;
    const STATUS_ACTIVE = 2;
    

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%fileupload}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_deleted','name'], 'safe'],
            [['is_deleted'], 'integer'],
            [['file_path', 'name'], 'string', 'max' => 255],
            [['upload_file'], 'file', 'extensions' => 'png, jpg, jpeg, doc, docx, pdf, txt, gif', 'maxSize' => 1024 * 1024 * 2]
        ];
    }
    
    /**
     * Returns user statuses list
     * @return array|mixed
     */
    public static function statuses()
    {
        return [
            self::STATUS_ACTIVE => Yii::t('common', 'Active'),
            self::STATUS_DELETED => Yii::t('common', 'Deleted')
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'name' => Yii::t('common', 'Name'),
            'extension' => Yii::t('common', 'Extension'),
            'file_path' => Yii::t('common', 'File Path'),
            'name' => Yii::t('common', 'File Name'),
            'is_deleted' => Yii::t('common', 'Is Deleted'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\FileuploadQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\FileuploadQuery(get_called_class());
    }

    /**
     * fetch stored file name with complete path 
     * @return string
     */
    public function getUploadedFile() 
    {
        return isset($this->file_path) ? Yii::$app->params['file_base_url'] . $this->file_path : null;
    }

    /**
    * Process upload of file
    *
    * @return mixed the uploaded file instance
    */
    public function uploadFile() {
        // get the uploaded file instance.
        $file = UploadedFile::getInstance($this, 'upload_file');

        // if no file was uploaded abort the upload
        if (empty($file)) {
            return false;
        }

        // store the source file name
        $this->file_path = $file->name;
        $ext = substr(strrchr($file->name,'.'),1);

        // generate a unique file name
        $this->file_path = Yii::$app->security->generateRandomString().".{$ext}";

        // the uploaded image instance
        return $file;
    } 
    
    /**
    * return name of file
    *
    * @return mixed the uploaded file name
    */
    public function uploadFileName() {
        // get the uploaded file instance.
        $file = UploadedFile::getInstance($this, 'upload_file');

        // if no file was uploaded abort the upload
        if (empty($file)) {
            return false;
        }

        // store the source file name
        return $file->name;
        
    }


}
