<?php

interface ICocinero {
    public function cocinar(): string;
    public function prepararIngredientes(): string;
    public function revisarCalidad(): string;
}