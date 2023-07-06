<?php

namespace App\Traits;

trait FlashMessages
{
    /**
     * Error message
     * @var array
     */
    protected $errorMessages = [];

    /**
     * info messages
     * @var array
     */
    protected $infoMessages = [];

    /**
     * success messages
     * @var array
     */
    protected $successMessages = [];

    /**
     * warning messages
     * @var array
     */
    protected $warningMessages = [];

    //define setter and getter methods for flash messages

    /**
     * @param $message
     * @param $type
     */
    protected function setFlashMessage($message, $type)
    {
        $model = 'infoMessages';
        switch($type)
        {
            case 'info':{
                $model = 'infoMessages';
            }
            break;
            case 'error':{
                $model = 'errorMessages';
            }
            break;
            case 'success':{
                $model = 'successMessages';
            }
            break;
            case 'warning':{
                $model = 'warningMessages';
            }
            break;
        }

        if(is_array($message)){
            foreach($message as $key => $value){
                array_push($this->model, $value);
            }
        }else{
            array_push($model, $message);
        }
    }
}
