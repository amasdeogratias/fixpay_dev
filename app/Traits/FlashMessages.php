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
}
