<?php

/**
 *                  ___====-_  _-====___
 *            _--^^^#####//      \\#####^^^--_
 *         _-^##########// (    ) \\##########^-_
 *        -############//  |\^^/|  \\############-
 *      _/############//   (@::@)   \\############\_
 *     /#############((     \\//     ))#############\
 *    -###############\\    (oo)    //###############-
 *   -#################\\  / VV \  //#################-
 *  -###################\\/      \//###################-
 * _#/|##########/\######(   /\   )######/\##########|\#_
 * |/ |#/\#/\#/\/  \#/\##\  |  |  /##/\#/  \/\#/\#/\#| \|
 * `  |/  V  V  `   V  \#\| |  | |/#/  V   '  V  V  \|  '
 *    `   `  `      `   / | |  | | \   '      '  '   '
 *                     (  | |  | |  )
 *                    __\ | |  | | /__
 *                   (vvv(VVV)(VVV)vvv)                
 *                        神兽保佑
 *                       代码无BUG!
 */

namespace backend\models;

use Yii;
use backend\models\SystemSettingForm;
use yii\base\Model;
use common\models\File;

/**
 * This is the model class for table "File Form".
 * 
 * 
 */
class FileForm extends Model
{
    public $id;
    public $file;
    public $path;
    public $name;
    public $ext;

    public function rules()
    {
        return [
            ['file', 'file', 'skipOnEmpty' => false]
        ];
    }

    public function save()
    {
        if ($this->validate()){
            $setting = SystemSettingForm::getSetting();
            if ($this->file) {
                $path = date('Y') . '/' . date('m');
                $dir  = $setting['upload_path'] . '/' . date('Y') . '/' . date('m');
                if(!is_dir($dir)) {
                    mkdir($dir, '0777', true);
                }
                $relPath = date('Y') . '/' . date('m') . '/' 
                    . substr($this->file->baseName, 0, 10) . '_' . time() 
                    . '.' 
                    . $this->file->extension;
                // $model = new File();
                // $model->path = $relPath;
                // $model->name = substr($this->file->baseName, 0, 10) . '_' . time();
                // $model->ext = $this->file->extension;
                // if ($model->save()) {
                $this->file->saveAs($setting['upload_path'] . '/' . $relPath);
                $this->path = $relPath;
                $this->name = substr($this->file->baseName, 0, 10) . '_' . time();
                $this->ext = $this->file->extension;
                return true;
                // }
            }
        }
        return false;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => '文件相对路径',
            'name' => '文件名',
            'ext' => '文件后缀',
        ];
    }
}