import axios from 'axios';

const instance = axios.create({
  baseURL: 'http://localhost:8000/api' // Establece la URL base para las solicitudes
});

export default instance;