import React, { useState, useEffect } from 'react';
import axios from 'axios';
import 'bootstrap/dist/css/bootstrap.min.css';


const App = () => {
    const [pokemonList, setPokemonList] = useState([]);
    const [loading, setLoading] = useState(true);
    const [selectedPokemon, setSelectedPokemon] = useState(null);

    useEffect(() => {
        axios.get('https://pokeapi.co/api/v2/pokemon?limit=1010')
            .then(response => {
                const fetches = response.data.results.map(pokemon =>
                    axios.get(pokemon.url).then(res => res.data)
                );
                return Promise.all(fetches);
            })
            .then(pokemonDetails => {
                setPokemonList(pokemonDetails);
                setLoading(false);
            })
            .catch(error => console.error("Error fetching Pokémon data: ", error));
    }, []);

    const handlePokemonClick = (pokemon) => {
        setSelectedPokemon(pokemon);
    };

    if (loading) {
        return <p>Loading Pokémon...</p>;
    }

    return (
        <div className="container-fluid w-75">
            <h1 class=" my-4">Pokedex</h1>

            {!selectedPokemon ? (
                <table className="rounded table table-light" border="1" style={{ width: '100%', textAlign: 'left' }}>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Type(s)</th>
                    </tr>
                    </thead>
                    <tbody>
                    {pokemonList.map((pokemon, index) => (
                        <tr key={index} onClick={() => handlePokemonClick(pokemon)} style={{ cursor: 'pointer' }}>
                            <td>{pokemon.id}</td>
                            <td>
                                <img
                                    src={pokemon.sprites.front_default}
                                    alt={pokemon.name}
                                    style={{ width: '100px', height: '100px' }}
                                />
                            </td>
                            <td>{pokemon.name.charAt(0).toUpperCase() + pokemon.name.slice(1)}</td>
                            <td>
                                {pokemon.types.map((typeInfo, i) => (
                                    <span key={i}>{typeInfo.type.name}, </span>
                                ))}
                            </td>
                        </tr>
                    ))}
                    </tbody>
                </table>
            ) : (
                <div class="container-fluid  border border-primary w-75 p-4 rounded">
                    <h2>{selectedPokemon.name.charAt(0).toUpperCase() + selectedPokemon.name.slice(1)}</h2>
                    <img style={{width:"300px", margin:"25px"}} src={selectedPokemon.sprites.other.showdown.front_default} alt={selectedPokemon.name}/>
                    <p>Height: {selectedPokemon.height}</p>
                    <p>Weight: {selectedPokemon.weight}</p>
                    <p>Base experience: {selectedPokemon.base_experience}</p>
                    <h3>Abilities:</h3>
                    <ul>
                        {console.log(selectedPokemon)}
                        {selectedPokemon.abilities.map((abilityInfo, index) => (
                            <li key={index}>{abilityInfo.ability.name.charAt(0).toUpperCase() + abilityInfo.ability.name.slice(1)}</li>
                        ))}
                    </ul>
                    <h3>Moves:</h3>
                    <div>
                        <ul style={{display:"grid", gridTemplateColumns:"repeat(7, 1fr)"}}>
                        {selectedPokemon.moves.map((movesInfo, index) => (
                            <li className="mx-2" key={index}>{movesInfo.move.name.charAt(0).toUpperCase() + movesInfo.move.name.slice(1)}</li>
                        ))}
                        </ul>
                    </div>

                    <button class="btn btn-secondary" onClick={() => setSelectedPokemon(null)}>Back to List</button>
                </div>
            )}
        </div>
    );
};

export default App;
