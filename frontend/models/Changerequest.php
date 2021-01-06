<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace frontend\models;
use common\models\User;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;


class Changerequest extends Model
{

public $Key;
public $No;
public $Nature_of_Change;
public $Employee_No;
public $Employee_Name;
public $Approval_Entries;
public $isNewRecord;



    public function rules()
    {
        return [

        ];
    }

    public function attributeLabels()
    {
        return [

        ];
    }

    public function getLines(){
        $service = Yii::$app->params['ServiceName']['BookingRequisitionLine'];
        $filter = [
            'Booking_Requisition_No' => $this->Booking_Requisition_No,
        ];

        $lines = Yii::$app->navhelper->getData($service, $filter);
       return $lines;

    }

    public function getChanges()
    {

        $changes = [
            ['Code' => '_blank_','Desc' => '_blank_'],
            ['Code' => 'Bio_Data' ,'Desc' =>'Bio_Data'],
            ['Code' => 'Next_Of_Kin' ,'Desc' => 'Next_Of_Kin',],
            ['Code' =>'Asset_Assignment' ,'Desc' => 'Asset_Assignment'],
            ['Code' => 'Emergency_Contacts' ,'Desc' => 'Emergency_Contacts'],
            ['Code' => 'Beneficiaries' ,'Desc' => 'Beneficiaries'],
            ['Code' => 'Medical_Dependants' ,'Desc' => 'Medical_Dependants'],
            ['Code' => 'Qualifications' ,'Desc' => 'Qualifications'],
            ['Code' => 'Proffesional_Bodies' ,'Desc' => 'Proffesional_Bodies'],
            ['Code' => 'Work_History' ,'Desc' => 'Work_History'],
            ['Code' => 'Contract_Renewal','Desc' => 'Contract_Renewal'],
            ['Code' => 'New_Contract' ,'Desc' => 'New_Contract'],
            ['Code' => 'salary_Increment' ,'Desc' => 'salary_Increment']
        ];

        return ArrayHelper::map($changes,'Code','Desc');
    }



}