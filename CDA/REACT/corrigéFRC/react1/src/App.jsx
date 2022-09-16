import {React, useState} from 'react';
import { Counter } from './Counter';

const App = (props) => {

    const [nom, setNom] = useState("");
    const [prenom, setPrenom] = useState("");

    const [dupCompteur1, setDupCompteur1] = useState(0);

    const handleChangeNom = (evt) => {
        setNom(evt.target.value);
    }

    const handleChangePrenom = (evt) => {
        setPrenom(evt.target.value);
    }

    const handleChangeDupCompteur1 = (toto) => {
        console.log("Compteur1 est modifié...");
        setDupCompteur1(toto);
    }

    console.log("render App...");

    return (
        <div>
            <div>{dupCompteur1}</div>
            <Counter name="compteur1" onChange={handleChangeDupCompteur1}/>
            <div>
                Bonjour test
                &nbsp;
                <span className='bolder'>
                    {nom + ' ' + prenom}
                </span>
            </div>
            <input type="text" value={nom} onChange={handleChangeNom}/>
            <input type="text" value={prenom} onChange={handleChangePrenom}/>
            <Counter name="compteur2" />

        </div>
    );
}

export { App };