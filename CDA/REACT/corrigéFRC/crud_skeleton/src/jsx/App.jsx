import { useState, useEffect } from 'react';
import { Liste } from './Liste';
import { Formulaire } from './Formulaire';
import { BrowserRouter, Routes, Route } from 'react-router-dom';

import { fetchSync } from './fetchSync';

import 'bootstrap/dist/css/bootstrap.css'
import '../css/index.css';


const App = (props) => {


    const [data, setData] = useState([]);

    useEffect(() => {
        fetchSync('http://127.0.0.1:8000/api/produits', 'get').then( (data) => setData(data) );
    }, [])

    const handleChange = (produit) => {
        fetchSync('http://127.0.0.1:8000/api/produits', 'post', produit).then( () => {
            fetchSync('http://127.0.0.1:8000/api/produits', 'get').then( (data) => setData(data) );
        });
    }

    console.log("render App...");
    
    return (
        <BrowserRouter>
            <div>
                App
            </div>
            <Routes>
                <Route path="/" element={<Liste data={data}/>} />
                <Route path="add" element={<Formulaire onChange={handleChange} />} />
            </Routes>
        </BrowserRouter>
    );
}

export { App };