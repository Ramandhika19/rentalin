<?php
namespace App\Exceptions;
class Handler extends \Illuminate\Foundation\Exceptions\Handler {protected $dontReport=[];protected $dontFlash=['password','password_confirmation'];}