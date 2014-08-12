<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "experiment".
 *
 * @property integer $id
 * @property string $date
 * @property string $time
 * @property string $name
 * @property integer $bones_num
 * @property integer $throws
 *
 * @property Results $results
 */
class Experiment extends \yii\db\ActiveRecord {

    public function __construct($config = array()) {
        parent::__construct($config);

        $now = new \DateTime();
        $this->date = $now->format('Y-m-d');
        $this->time = $now->format('H:i:s');
        $this->name = "Experiment (from " . $this->date . " " . $this->time . ")";
        $this->bones_num = 2;
        $this->throws = 36000;
    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'experiment';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['date', 'time', 'name', 'bones_num', 'throws'], 'required'],
            [['date', 'time'], 'safe'],
            [['bones_num', 'throws'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'time' => 'Time',
            'name' => 'Name',
            'bones_num' => 'Bones Num',
            'throws' => 'Throws',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResults() {
        return $this->hasOne(Results::className(), ['id' => 'id']);
    }

    public function beforeSave($insert) {
        /*
         * We need to update date & time fields here
         */
        if (parent::beforeSave($insert)) {
            $now = new \DateTime();
            $this->date = $now->format('Y-m-d');
            $this->time = $now->format('H:i:s');
            return true;
        } else {
            return false;
        }
    }
    
    public function afterSave($insert)
    {
        
        $resultsModel = new Results;
        $results = $resultsModel->GetResultsForExperiment($this->id, $this->bones_num, $this->throws);
        /*
        echo '<pre>';
        print_r('here');
        echo '</pre>';
        exit();
        */
        
        /* calculate average value for 1 dice */
        /*
        $average = 0;
        $resultTable = array();
        foreach ($results as $num => $quantity) {
            $average += $num * $quantity;
            $resultTable[$num]['quantity'] = $quantity;
            $resultTable[$num]['percentage'] = $quantity *100 / $this->throws . '%';
        }
        $average = $average / $this->bones_num / $this->throws;
        */
    }

}
