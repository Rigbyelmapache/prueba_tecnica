import { get, post } from '../apiclient/apiclient.js';


const getCsrfCookie = async () => {
    await fetch('/sanctum/csrf-cookie', {
        credentials: 'include'
    });
};


const agregarProducto = async (producto) => {
    const token = localStorage.getItem('authToken');
        if (!token) {
            throw new Error('No estás autenticado. Inicia sesión primero.');
        }
    await getCsrfCookie();
    try {
        const { data, message } = await post('api/productos', producto);
        console.log('Producto agregado:', data);
    } catch (error) {
        console.error('Error al agregar producto:', error.message);
    }
};

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('producto-form');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        let precio = form.precio.value.trim(); 
        const producto = {
            nombre: form.nombre.value.trim(),
            codigo_producto: form.codigo_producto.value.trim(),
            descripcion: form.descripcion.value.trim(),
            precio: precio = parseFloat(precio).toFixed(2),
            marca: form.marca.value.trim(),
            categoria_id: parseInt(form.categoria_id.value),
        };


        try {
            await agregarProducto(producto);
            console.log(producto,'Producto agregado exitosamente');
            alert('Producto agregado exitosamente');
            form.reset();
        } catch (error) {
            alert('Error al agregar producto: ' + error.message);
        }
    });
});
