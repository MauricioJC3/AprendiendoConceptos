<?php

class ChefPrincipal implements ICocinero {
    public function cocinar(): string {
        return "El chef está preparando los platillos principales";
    }

    public function prepararIngredientes(): string {
        return "El chef está preparando los ingredientes frescos";
    }

    public function revisarCalidad(): string {
        return "El chef está verificando la calidad de los platos";
    }
}