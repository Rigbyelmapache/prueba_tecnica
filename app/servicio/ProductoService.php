<?php

namespace App\servicio;

use App\Models\Producto;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class ProductoService
// servicio para manejar la logica de negocio
{
    // funcion para crear un producto
    public function crearProducto($data)
    {
        // create es crear xd , parametro un array 
         $fecha_actual = now();
        $producto = DB::insert(
            'INSERT INTO productos (nombre, codigo_producto, descripcion, precio, marca, categoria_id,created_at,updated_at) 
            VALUES (?, ?, ?, ?, ?, ?,?,?)', 
            [
                $data['nombre'],
                $data['codigo_producto'],
                $data['descripcion'],
                $data['precio'],
                $data['marca'],
                $data['categoria_id'],
                $fecha_actual, 
                $fecha_actual  
            ]
        );

        return $producto;
    }
     public function obtenerProductos()
    {
        // la consulta select * from [tabla] trae todo los datos 
        
        $productos = DB::select('SELECT * FROM productos');
        return  Producto::hydrate($productos);
    }
    public function obtenerProductoPorId($id)
    {
       $producto = DB::select('SELECT * FROM productos WHERE id = ?', [$id]);
        if (!$producto) {
            throw new ModelNotFoundException("Producto no encontrado.");
        }

        return $producto;
    }
     public function obtenerProductoParaEditar($id)
    {
        return $this->obtenerProductoPorId($id);
    }


    public function actualizarProducto($id, $data)
    {
        // validacion ,buscar producto
        $producto = Producto::find($id);
        // find busca 
        if (!$producto) {
            throw new ModelNotFoundException("Producto no encontrado.");
        }
        // si lo encuentra actuliza si no , no ps
        // update = actualizar 
         $producto = DB::update(
            'UPDATE productos SET nombre = ?, codigo_producto = ?, descripcion = ?, precio = ?, marca = ?, categoria_id = ? 
            WHERE producto_id = ?', 
            [
                $data['nombre'],
                $data['codigo_producto'],
                $data['descripcion'],
                $data['precio'],
                $data['marca'],
                $data['categoria_id'],
                $id
            ]
        );
        $productoActualizado = Producto::find($id);
       

        return $productoActualizado = Producto::find($id);
;
    }
     public function eliminarProducto($id)
    {
        $producto = DB::delete('DELETE FROM productos WHERE producto_id = ?', [$id]);
        if (!$producto) {
            throw new ModelNotFoundException("Producto no encontrado.");
        }

        
        return true;
    }
}
