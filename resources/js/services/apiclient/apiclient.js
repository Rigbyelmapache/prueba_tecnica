

const API_URL = 'http://localhost:8000';


const handleResponse = async (response) => {
    if (!response.ok) {
        const errorData = await response.json();
        console.error('Error en la solicitud:', errorData);
        throw new Error(errorData.message || 'Error en la solicitud');
    }
   const responseData = await response.json();
    console.log('Respuesta de la API:', responseData);
 
    if (responseData.message) {
        return {
            data: responseData,
            message: responseData.message
        };
    }
    console.log('Mensaje de la API:', responseData.message);
    
    return {
        data: responseData
    };
};



const getAuthToken = () => {
   
    return localStorage.getItem('authToken');
};


const getAuthHeaders = () => {
    const token = getAuthToken();
    return token ? { Authorization: `Bearer ${token}` } : {};
};

const get = async (endpoint, headers = {}) => {
    try {
        const response = await fetch(`${API_URL}/${endpoint}`, {
            method: 'GET',
            headers: {
                ...headers,
                ...getAuthHeaders(),
                'Content-Type': 'application/json',
            },
        });
        return await handleResponse(response);
    } catch (error) {
        console.error('Error en GET:', error.message);
        throw error;
    }
};


const post = async (endpoint, data, headers = {}) => {
    try {
        const response = await fetch(`${API_URL}/${endpoint}`, {
            method: 'POST',
            headers: {
                ...headers,
                ...getAuthHeaders(),
                'Content-Type': 'application/json',
    
            },
            body: JSON.stringify(data),
             credentials: 'include'
        });
        return await handleResponse(response);
    } catch (error) {
        console.error('Error en POST:', error.message);
        throw error;
    }
};


const put = async (endpoint, data, headers = {}) => {
    try {
       
        const response = await fetch(`${API_URL}/${endpoint}`, {
            method: 'PUT',
            headers: {
                ...headers,
                ...getAuthHeaders(),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
             credentials: 'include'
        });
        
      
        return await handleResponse(response);
    } catch (error) {
        console.error('Error en PUT:', error.message);
        throw error;
    }
};


const del = async (endpoint, headers = {}) => {
    try {
        const response = await fetch(`${API_URL}/${endpoint}`, {
            method: 'DELETE',
            headers: {
                ...headers,
                 ...getAuthHeaders(),
                'Content-Type': 'application/json',
            },
        });
        return await handleResponse(response);
    } catch (error) {
        console.error('Error en DELETE:', error.message);
        throw error;
    }
};



export { get, post, put, del, getAuthHeaders };
