import { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';


const Liste = (props) => {


    const handleClick = () => {
        
    }

    return (
        <>
            <div>
                Liste
                <Link to="/add">Ajouter</Link>
            </div>
            {
                props.data.map( (produit, index) => 
                    <div key={index}>
                        {produit.libelleCourt}
                    </div>
                )
            }
        </>
    );
}

export { Liste };