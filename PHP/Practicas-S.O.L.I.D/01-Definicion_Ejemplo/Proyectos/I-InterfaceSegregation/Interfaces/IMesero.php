<?php

interface IMesero {
    public function tomarOrden(): string;
    public function servirMesa(): string;
    public function procesarPago(): string;
}