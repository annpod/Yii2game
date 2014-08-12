<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "results".
 *
 * @property integer $id
 * @property integer $num
 * @property integer $count
 * @property integer $id_exp
 *
 * @property Experiment $id0
 */
class Results extends \yii\db\ActiveRecord
{   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'results';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['num', 'count', 'id_exp'], 'required'],
            [['num', 'count', 'id_exp'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num' => 'Num',
            'count' => 'Count',
            'id_exp' => 'Id Exp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Experiment::className(), ['id' => 'id']);
    }
    
    
    public function GetResultsForExperiment($id_exp, $bones_num, $throws)
    {
        $results = array();
        // Creating array with zeros
        $results = array_fill($bones_num, 5*$bones_num + 1, 0);
        
        for ($i = 0; $i < $throws; $i++) {
            $throw_result = 0;
            for ($j = 0; $j < $bones_num; $j++) {
                $throw_result += rand(1, 6);
            }
            $results[$throw_result]++;
        }
        
        ksort($results);    // it's not required
         
        foreach ($results as $num => $count){
            $model = new Results;
            $model->num = $num;
            $model->count = $count;
            $model->id_exp = $id_exp;
            $model->avg = $count/$throws*100;
            $model->save();
        }
        return true;
    }
    
}
