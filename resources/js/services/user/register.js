import { post } from '../apiclient/apiclient.js';

const getCsrfCookie = async () => {
    await fetch('/sanctum/csrf-cookie', {
        credentials: 'include'
    });
};

export const registerUser = async (userData) => {
    try {
        await getCsrfCookie(); 
        const response = await post('api/auth/register', userData, {
            'Accept': 'application/json'
        });
        return response;
    } catch (error) {
        throw error;
    }
};


document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('register-form');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const userData = {
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            password: document.getElementById('password').value,
            password_confirmation: document.getElementById('password_confirmation').value
         
        };

        try {
            const response = await registerUser(userData);
            console.log('Registro exitoso:', response);
            alert('Registro exitoso');
             window.location.href = "/login";
     
        } catch (error) {
            console.error('Error en el registro:', error.message);
            alert('Error al registrar: ' + error.message);
        }
    });
});