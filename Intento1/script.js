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
    const url = `json/${id}.json`
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
    <div class="img-container" style="background-color: ${color}">
        <img src="${pokemon.image}" alt="${name}">
    </div>
    <div class="info"> 
        <button class="btn login-button"onclick="navigator.clipboard.writeText('${phoneNumber}').then(() => alert('Número copiado en el portapapeles con éxito'))"><img src="https://img.icons8.com/ios/452/phone.png" width="15" height="15">
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

const adjustGridColumns = () => {
    const containerWidth = poke_container.clientWidth;
    const minColumns = 2;
    const maxColumns = 5;
    const itemWidth = 200; // Asume que cada elemento mide aproximadamente 200px de ancho incluyendo márgenes

    let columns = Math.floor(containerWidth / itemWidth);
    columns = Math.max(minColumns, Math.min(maxColumns, columns));

    poke_container.style.gridTemplateColumns = `repeat(${columns}, 1fr)`;
}

window.addEventListener('resize', adjustGridColumns);
window.addEventListener('load', () => {
    adjustGridColumns();
    fetchPokemons();
});

// script para mostrar contraseña con un botón 
function mostrarContrasena() {
    // si el ojo está cerrado se abre y muestra la contraseña y viceversa
    // ojo cerrado es 
    // <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
    //   <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z"/>
    //   <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z"/>
    // </svg>
    // ojo abierto es
    // <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
    //   <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
    //   <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
    // </svg>

    const contrasena = document.getElementById('password');
    const icono = document.getElementById('icono');

    if (contrasena.type == "password") {
        contrasena.type = "text";
        icono.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
        <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z"/>
        <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4
        50.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z"/>
        </svg>`;
    } else {
        contrasena.type = "password";
        icono.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
      </svg>`;
    }

}