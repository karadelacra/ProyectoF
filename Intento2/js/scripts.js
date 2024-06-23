document.addEventListener('DOMContentLoaded', () => {
    const starTexts = ['starText1', 'starText2', 'starText3'];
    const ratingResults = ['ratingResult1', 'ratingResult2', 'ratingResult3'];
    const starRatings = ['starRating1', 'starRating2', 'starRating3'];

    const vendorData = [{
        name: "Valeria Aguas",
        info: "Información:",
        image: "imagenes/vale-aguas.jpg",
        products: [
            { nombre: "aguas de Litro, pregunta por sabores", img: "imagenes/aguas-Programador.jpg", price: "$25", promo: "Entregamos en cualquier parte de la escuela" }
        ],
        rating: { sum: 12.9, count: 3 }
    }, {
        name: "Edgar Café",
        info: "Información:",
        image: "imagenes/Caféyaguas.jpg",
        products: [
            { nombre: "Cafés de litro", img: "imagenes/Caféyaguas.jpg", price: "$25", promo: "Entregamos en cualquier parte de la escuela" }
        ],
        rating: { sum: 12.9, count: 3 }
    }, {
        name: "Vendedor 3",
        info: "Información detallada del Vendedor 3.",
        image: "imagenes/programer.jpg",
        products: [
            { nombre: "pizza de 3 quesos", img: "imagenes/pizzaprogrammer.jpg", price: "$27", promo: "20% de descuento" },
            { nombre: "Pizza hawaiana", img: "imagenes/haw.webp", price: "$25", promo: "Compra 1 y lleva 1 sonrisa gratis" }
        ],
        rating: { sum: 14.4, count: 3 }
    }];

    const updateRatingDisplay = (rating, element) => {
        const filledStars = Math.floor(rating);
        const filledStarsPercentage = (rating - filledStars) * 100;
        let ratingDisplay = '★'.repeat(filledStars);
        if (filledStars < 5) {
            ratingDisplay += `<tspan class="rating-fill" style="fill:gold;clip-path:inset(0 ${100 - filledStarsPercentage}% 0 0); text-shadow: 0 0 1px black;">★</tspan>`;
            ratingDisplay += '☆'.repeat(4 - filledStars);
        }
        element.innerHTML = ratingDisplay;
    };

    starTexts.forEach((starTextId, index) => {
        const ratingKey = `rating${index + 1}`;
        const currentRating = vendorData[index].rating.sum / vendorData[index].rating.count;
        const starText = document.getElementById(starTextId);
        const ratingResult = document.getElementById(ratingResults[index]);
        const starRating = document.getElementById(starRatings[index]);

        // Mostrar la calificación actual
        updateRatingDisplay(currentRating, starText);

        document.querySelectorAll(`#${starRating.id} input`).forEach((input) => {
            input.addEventListener('change', function() {
                const newRating = parseFloat(this.value);
                vendorData[index].rating.sum += newRating;
                vendorData[index].rating.count += 1;
                const updatedRating = (vendorData[index].rating.sum / vendorData[index].rating.count).toFixed(1);

                // Mostrar la valoración específica y actualizar estrellas
                ratingResult.textContent = `Valoración: ${newRating} estrellas`;
                updateRatingDisplay(newRating, starText);

                // Regresar a mostrar la calificación promedio después de 3 segundos
                setTimeout(() => {
                    ratingResult.textContent = `Calificación: ${updatedRating} estrellas`;
                    updateRatingDisplay(updatedRating, starText);
                }, 3000); // Ocultar la valoración específica después de 3 segundos
            });
        });

        // Imprimir la calificación actual al cargar la página
        ratingResult.textContent = `Calificación: ${currentRating.toFixed(1)} estrellas`;
    });

    document.querySelectorAll('.openModalBtn').forEach((btn, index) => {
        btn.addEventListener('click', () => {
            showVendorModal(index);
        });
    });

    function showVendorModal(index) {
        const vendorModal = document.getElementById('vendorModal');
        const vendorName = document.getElementById('vendorName');
        const vendorInfo = document.getElementById('vendorInfo');
        const vendorProducts = document.getElementById('vendorProducts');
        const vendorImage = document.getElementById('vendorImage');

        const vendor = vendorData[index];
        vendorName.textContent = vendor.name;
        vendorInfo.textContent = vendor.info;
        vendorImage.setAttribute('href', vendor.image);
        vendorProducts.innerHTML = '';
        vendor.products.forEach(product => {
            const productCard = `
                <div class="product-card" onclick="this.classList.toggle('flipped')">
                    <div class="card-front">
                        <img src="${product.img}" alt="${product.price}">
                    </div>
                    <div class="card-back">
                        <br>
                        <p><strong>Producto:</strong> ${product.nombre}</p>
                        <p><strong>Precio:</strong> ${product.price}</p>
                        <p><strong>Promociones:</strong> ${product.promo}</p>
                    </div>
                </div>
            `;
            vendorProducts.innerHTML += productCard;
        });

        vendorModal.style.display = 'block';
    }

    function closeVendorModal() {
        const vendorModal = document.getElementById('vendorModal');
        vendorModal.style.display = 'none';
    }

    // Funcionalidad para el modal de detalles del vendedor
    var modal = document.getElementById("myModal");
    var btns = document.querySelectorAll(".openModalBtn");
    var closeBtns = document.querySelectorAll(".close");

    // Cuando el usuario hace clic en el botón, abre el modal
    btns.forEach(btn => {
        btn.onclick = function() {
            modal.style.display = "block";
        };
    });

    // Cuando el usuario hace clic en <span> (x), cierra el modal
    closeBtns.forEach(closeBtn => {
        closeBtn.onclick = function() {
            closeVendorModal();
        };
    });

    // Cuando el usuario hace clic en cualquier lugar fuera del modal, ciérralo
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        } else if (event.target == vendorModal) {
            closeVendorModal();
        }
    }

    // Funcionalidad para las estrellas y el cálculo del promedio
    var starInputs = document.querySelectorAll('.star-rating input');
    var ratingResult = document.getElementById('ratingResult1');
    var averageRating = document.getElementById('averageRating');

    starInputs.forEach(function(input) {
        input.addEventListener('change', function() {
            var selectedValue = document.querySelector('.star-rating input:checked').value;
            ratingResult.textContent = 'Valoración: ' + selectedValue + ' estrellas';
            calculateAverageRating();
        });
    });

    function calculateAverageRating() {
        var totalStars = 0;
        var numberOfRatings = 0;

        starInputs.forEach(function(input) {
            if (input.checked) {
                totalStars += parseInt(input.value);
                numberOfRatings++;
            }
        });

        var average = totalStars / numberOfRatings;
        averageRating.textContent = 'Promedio de estrellas: ' + average.toFixed(1);
    }

    // Inicializar el promedio a 0
    averageRating.textContent = 'Promedio de estrellas: 0.0';
});