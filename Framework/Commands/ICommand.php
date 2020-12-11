<?php

namespace Jarvis\Commands;

interface ICommand
{
    public function CreateModel($model_name);
    public function CreateController($controller_name);
}
