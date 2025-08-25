<?php

namespace App\Exceptions;

use App\Traits\RenderToJson;
use Exception;
use Illuminate\Support\Facades\Response;

class UserHasBeenTakenException extends Exception
{
    use RenderToJson;

    protected $message = 'This user has been taken.';
    protected $code = 400;
}
