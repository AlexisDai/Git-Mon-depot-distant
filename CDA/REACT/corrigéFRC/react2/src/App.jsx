import {React, useState} from 'react';

const App = (props) => {

    const [liste, setListe] = useState(["toto", "titi"])
    const [element, setElement] = useState("")

    const handleChangeElement = (evt) => {
        setElement(evt.target.value);
    }

    const handleClick = () => {
        // liste.push(element)
        setListe([...liste, element])
        setElement("")
    }

    console.log("render App...")

    return (
        <div>
            {
                liste.map( (element, index) => {
                    return (
                        <div key={index}>
                            {element}
                        </div>
                    )
                })
            }
            <input type="text" value={element} onChange={handleChangeElement}/>
            <button onClick={handleClick}>Ajouter</button>
        </div>
    );
}

export { App };