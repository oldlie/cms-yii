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
use common\models\PostAttachment;

class PostsImageUploadForm extends \yii\base\Model
{
    public $id;
    public $image;
    public $imagePath;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function save()
    {
        Yii::trace('id:' . $this->id);
        if ($this->validate()){
            $setting = SystemSettingForm::getSetting();
            if ($this->image) {
                $path = date('Y') . '/' . date('m');
                $dir  = $setting['upload_path'] . '/' . date('Y') . '/' . date('m');
                if(!is_dir($dir)) {
                    mkdir($dir, '0777', true);
                }
                $imagePath = date('Y') . '/' . date('m') . '/' 
                    . substr($this->image->baseName, 0, 10) . '_' . time() . '.' . $this->image->extension;
                $this->image->saveAs($setting['upload_path'] . '/' . $imagePath);
                $model = new PostAttachment();
                $model->post_id = $this->id;
                $model->path = $imagePath;    
                $this->imagePath = $imagePath;
                if ($this->id > 0) {
                    return $model->save();
                }
                return true;
            }
        }
        return false;
    }
}