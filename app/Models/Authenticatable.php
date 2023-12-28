<?php

Interface Authenticatable
{
    public function register($data);
    public function login($email, $password);
}