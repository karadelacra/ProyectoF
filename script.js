const poke_container = document.getElementById('poke-container')
const pokemon_count = 150
const colors = {
    main: '#FDDFDF',
    mexican: '#DEFDE0'
}

const main_types = Object.keys(colors)

const fetchPokemons = async() => {
    for (let i = 1; i <= pokemon_count; i++) {
        await getPokemon(i)
    }
}

const getPokemon = async(id) => {
    const url = `Rancheritos.com/${id}.json`
    const res = await fetch(url)
    const data = await res.json()
    createPokemonCard(data)
}

const createPokemonCard = (pokemon) => {
    const pokemonEl = document.createElement('div')
    pokemonEl.classList.add('pokemon')

    const name = pokemon.name[0].toUpperCase() + pokemon.name.slice(1)
    const id = pokemon.id.toString().padStart(3, '0')

    const poke_types = pokemon.types.map(type => type.type.name)
    const type = main_types.find(type => poke_types.indexOf(type) > -1)
    const color = colors[type]

    pokemonEl.style.backgroundColor = color
    const phoneNumber = generatePhoneNumber()

    const pokemonInnerHTML = `
    <div class="img-container">
        <img src="${pokemon.image}" alt="${name}">
    </div>
    <div class="info"> 
        <button class="nav-link" onclick="navigator.clipboard.writeText('${phoneNumber}').then(() => alert('Copied!'))"><img src="https://img.icons8.com/ios/452/phone.png" width="15" height="15">
        </button>
        <h3 class="name">${name}</h3>
        <small class="type">Type: <span>${type}</span> </small>
    </div>
    `

    pokemonEl.innerHTML = pokemonInnerHTML

    poke_container.appendChild(pokemonEl)
}




const generatePhoneNumber = () => {
    const areaCode = "52"
    const middlePart = Math.floor(Math.random() * 9000) + 1000;
    const lastPart = Math.floor(Math.random() * 9000) + 1000;
    return `(${areaCode})55 ${middlePart}-${lastPart}`;
}

fetchPokemons()