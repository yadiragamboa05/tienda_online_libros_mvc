<?php

class Carrito {
    public function agregarCarrito($id_libro, $cantidad) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (isset($_SESSION['cart'][$id_libro])) {
            $_SESSION['cart'][$id_libro] += $cantidad;
        } else {
            $_SESSION['cart'][$id_libro] = $cantidad;
        }
        return true;
    }
}
?>


