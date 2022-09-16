import React, { useEffect, useState } from "react";

const App = (props) => {

  const [items, setItems] = useState([]);
  const [recherche, setRecherche] = useState("");


  const handleRecherche = (e) => {
    setRecherche(e.target.value);
    getApiData(e.target.value);
  }

  const getApiData = (rec) => {
    fetch(
      "http://api.themoviedb.org/3/search/movie?api_key=f33cd318f5135dba306176c13104506a&query="+rec
    )
    .then( (response) =>  {
      if (response.ok)
        return response.json()
    })
    .then ( (data) => {
      setItems(data.results);
      console.log(data.results)
    });


  }

  

  useEffect(() => {
    getApiData("");
  }, []);

  
  return (
    <div>
      <ul>
        {
          items.map( (item) => (
            <li key={item.id}>
              {item.title}
              <img src={'http://image.tmdb.org/t/p/w185' + item.poster_path} />
            </li>
          ))
        }
      </ul>
      <input type="text" value={recherche} onChange={handleRecherche} placeholder="Entrez votre recherche" />
    </div>
  );
}



export default App;