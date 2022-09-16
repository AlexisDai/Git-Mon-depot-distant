import { React, useState } from 'react';

const App = (props) => {

    const [nom, setNom] = useState("");
    const [prenom, setPrenom] = useState("");
    const [compteur, setCompteur] = useState(0);
    const [courses, setCourse] = useState(["pomme", "poire"]);
    const [ajout, setAjout] = useState("")


    const handleChangeCourse = (e) => {
        setAjout(e.currentTarget.value);
        console.log(ajout)
    }


    const handleSubmit = (e) => {
        e.preventDefault();

        const courseCopy = [...courses];

        courseCopy.push(ajout);

        setCourse(courseCopy);

    }

    const handleChangeNom = (evt) => {
        setNom(evt.target.value);
    }

    const handleChangePrenom = (e) => {
        setPrenom(e.target.value);
    }

    const handleClick = (e) => {
        setCompteur(compteur + 1)
    }

    return (
        <div>
            <div>
                Bonjour
                &nbsp;
                <span className='bolder'>
                    {nom} {prenom}
                </span>
            </div>
            <input type="text" value={nom} onChange={handleChangeNom} /><br/><br/>
            <input type="text" value={prenom} onChange={handleChangePrenom} /><br/><br/>
            <button onClick={handleClick}>Compteur : {compteur}</button>


            <div>
                <br/>Liste de courses dynamique
                <ul>
                    {courses.map((produit) => (
                        <li key={produit}>
                            {produit}
                        </li>
                    ))
                    }
                </ul>
                <form onSubmit={handleSubmit}>
                    <input
                        value={ajout}
                        onChange={handleChangeCourse}
                        type="text"
                        placeholder='Ajouter un produit'
                    />
                    <button>Ajouter</button>
                </form>
            </div>
        </div>
    );
}

export { App };