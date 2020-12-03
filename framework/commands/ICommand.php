<?php

namespace jarvis\commands;

interface ICommand
{
    public function CreateModel($model_name);
    public function CreateController($controller_name);
    public function GetAllCommands(): array;
}
